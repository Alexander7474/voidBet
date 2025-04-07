<?php 
session_start();

if(!isset($_SESSION['csrf'])){
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

    $title = "connexion";
    $racine_path = '../';
    $html_racine_path = './';
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    require($racine_path.'model/User.php');
    use bd\User;

    
    if(isset($_POST['pseudo']) && isset($_POST['mdp'])) { // connexion 
      if($_POST['csrf'] == $_SESSION['csrf']){
        $userDB = new User();
        $id = $userDB->getUserId($_POST['pseudo']);

        if($id >= 0){
          $user = $userDB->getUser($id);
          if(password_verify($_POST['mdp'], $user->password)){
            $tab[] = ['id'=>$user->id_user, 'password'=>$user->password];
            $tabser = serialize($tab);
            if(isset($_COOKIE['cookies_accepted']) && $_COOKIE['cookies_accepted'] == "true"){
              setcookie('logged', $tabser, time()+60*60*24*30, "/"); // si l'utilisateur a accepté les cookie
            }
            $_SESSION['logged'] = $tabser; 
            header('Location: utilisateurs');
          }else{
            $error_message = "Impossible  de se connecter";
          }
        }else{
          $error_message = "Impossible  de se connecter";
        }
      }else{
        $error_message = "Token csrf invalide";
      }
    }else if(isset($_COOKIE['logged'])){// connexion grace au cookie
      $userDB = new User();

      $tab_unser = unserialize($_COOKIE['logged']);
      $user = $userDB->getUser($tab_unser[0]['id']);

      if($user != null){
        if($tab_unser[0]['password'] == $user->password){
          $_SESSION['logged'] = $_COOKIE['logged']; // si tous est valide la session vaut le cookie de session
          header('Location: utilisateurs');
        }else{
          $error_message = "Cookie invalide";
        }
      }else{
        $error_message = "Cookie invalide";
      }
    }

/*template*/  include($racine_path.'templates/back/cookie.php');
?>
