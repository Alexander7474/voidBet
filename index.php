<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$in_index=true;
$title = "Accueil";
$racine_path = "./";
$session_user = 1;

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
