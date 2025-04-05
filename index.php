<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$in_index=true;
$title = "Accueil";
$racine_path = "./";

require_once($racine_path.'model/User.php');
use bd\User;
//procedure pour déterminer si l'utilisateur est connécté
if(isset($_COOKIE['logged'])){
  $tab_unser = unserialize($_COOKIE['logged']);
  $userDB = new User();

  $user = $userDB->getUser($tab_unser[0]['id']);

  if($user != null){
    if($user->password == $tab_unser[0]['password']){
      $cookie_user = $user;
    }
  }
}
/*template*/  include($racine_path.'templates/front/header.php');

echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col'>";
include $racine_path."control/match.php";  
echo "</div>";
echo "<div class='col'>";
include $racine_path."control/team.php";  
echo "</div>";
echo "</div>";
echo "<div class='row'>";
include $racine_path."control/tournament.php";  
echo "</div>";
echo "</div>";

?>
		
<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
