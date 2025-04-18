
<?php
session_start();

    //gestion csrf
if(!isset($_SESSION['csrf'])){
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

    $title = 'Utilisateur'; 
    $racine_path = '../';
  $html_racine_path = './';

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    require_once($racine_path.'model/User.php');
    use bd\User;
    //procedure pour déterminer si l'utilisateur est connécté
    if(isset($_SESSION['logged'])){
      $tab_unser = unserialize($_SESSION['logged']);
      $userDB = new User();

      $user = $userDB->getUser($tab_unser[0]['id']);

      if($user != null){
        if($user->password == $tab_unser[0]['password']){
          $session_user = $user;
        }
      }
    }

    if(!isset($session_user)){ // sinon on redirige vers connexion car il faut être connécté pour accéder a cette page
      header('Location: connexion.php');
    }

    //si le champ de modif de l'utilisateur est enclenché
    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['mdp_valid'])){ 
      if($_POST['csrf'] == $_SESSION['csrf']){
        $userDB = new User();

        //test si le compte est valide -------------------------------------------------

        $user = new classe\User();
        $can_modify = TRUE;
        
        if(!$userDB->getUserId($_POST['pseudo']) >= 0){ // si le pseudo est utilisé
          $session_user->pseudo = $_POST['pseudo'];
        }

        $session_user->email = $_POST['email'];

        if(strlen($_POST['mdp']) > 0){
          if($_POST['mdp'] != $_POST['mdp_valid']){// les mot de passe ne correspondent pas
            $error_message = "Mot de passe non correspondant";
            $can_modify = FALSE;
          }else{
            $user->password = $_POST['mdp'];
            if(strlen($user->password) < 8){ // taille du mdp trop petite
              $can_modify = FALSE;
              $error_message = "Mot de passe inférieur à 8 caractères";
            }else{
              $session_user->password = password_hash($user->password, PASSWORD_BCRYPT);
            }
          }
        }
      
        if($can_modify){ // modification du compte
          $userDB->updateUser($session_user);
          $success_message = "Changement(s) réussi";
        }
      }else{
        $error_message = "Token csrf invalide";
      }
    }


/*template*/  include($racine_path.'templates/front/cookie.php');
    /*template*/  include($racine_path.'templates/front/header.php');

    // valeur pour exemple
    $titre="Utilisateur";


    include($racine_path.'templates/front/utilisateur_template.php');

    /*template*/  include($racine_path.'templates/front/footer.php');
?>
