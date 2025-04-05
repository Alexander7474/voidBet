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

echo "<h1>404</h1>";

/*template*/  include($racine_path.'templates/front/footer.php');

?>
