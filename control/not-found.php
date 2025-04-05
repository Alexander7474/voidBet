<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = '404'; 
$racine_path = '../';
  $html_racine_path = './';

require_once($racine_path.'model/User.php');
use bd\User;

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

/*template*/  include($racine_path.'templates/front/cookie.php');
/*template*/  include($racine_path.'templates/front/header.php');

echo '
<div class="error-page d-flex align-items-center justify-content-center text-white">
    <div class="error-container text-center p-4">
        <h1 class="error-code mb-0">404</h1>
        <h2 class="display-6 error-message mb-3">Page Not Found</h2>
        <div class="d-flex justify-content-center gap-3">
            <a href="'.$html_racine_path.'" class="btn btn-glass px-4 py-2">Accueil</a>
        </div>
    </div>
</div>
';

/*template*/  include($racine_path.'templates/front/footer.php');

?>
