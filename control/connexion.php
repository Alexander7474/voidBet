<?php 
session_start();

    $title = "connexion";
    $racine_path = '../';
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    require($racine_path.'model/User.php');
    use bd\User;

    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['mdp']) && isset($_POST['mdp_2'])){ //ajout d'un compte

      $userDB = new User();

      //test si le compte est valide -------------------------------------------------

      $user = new classe\User();
      $can_create = TRUE;
      
      if($userDB->getUserId($_POST['pseudo']) >= 0){ // si le pseudo est utilisé
        $can_create = FALSE;
        $error_message = "Pseudo déjà utilisé";
      }else{
        $user->pseudo = $_POST['pseudo'];
      }


      if($_POST['age'] < 18){ // si n'est pas majeur
        $can_create = FALSE;
        $error_message = "Âge inférieur à 18 ans";
      }else{
        $user->age = $_POST['age'];
      }

      if($_POST['mdp'] != $_POST['mdp_2']){// les mot de passe ne correspondent pas
        $error_message = "Mot de passe non correspondant";
        $can_create = FALSE;
      }else{
        $user->password = $_POST['mdp'];
        if(strlen($user->password) < 8){ // taille du mdp trop petite
          $can_create = FALSE;
          $error_message = "Mot de passe inférieur à 8 caractères";
        }else{
          $user->password = password_hash($user->password, PASSWORD_BCRYPT);
        }
      }
      
      //------------------------------------------------------------------------------

      if($can_create){ // creation du compte
        $user->void_coin = 100;
        $userDB->saveUser($user);
      }

    }else if(isset($_POST['pseudo']) && isset($_POST['mdp'])) { // connexion 
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
          header('Location: utilisateur.php');
        }else{
          $error_message = "Impossible  de se connecter";
        }
      }else{
        $error_message = "Impossible  de se connecter";
      }
    }else if(isset($_COOKIE['logged'])){// connexion grace au cookie
      $userDB = new User();

      $tab_unser = unserialize($_COOKIE['logged']);
      $user = $userDB->getUser($tab_unser[0]['id']);

      if($user != null){
        if($tab_unser[0]['password'] == $user->password){
          $_SESSION['logged'] = $_COOKIE['logged']; // si tous est valide la session vaut le cookie de session
          header('Location: utilisateur.php');
        }else{
          $error_message = "Cookie invalide";
        }
      }else{
        $error_message = "Cookie invalide";
      }
    }

/*template*/  include($racine_path.'templates/front/cookie.php');
    include($racine_path.'templates/front/header.php');

    if(!isset($_GET['create'])){
      include($racine_path.'templates/front/connexion_template.php');
    }else{
      include($racine_path.'templates/front/creation_template.php');
    }
    include($racine_path.'templates/front/footer.php');
?>
