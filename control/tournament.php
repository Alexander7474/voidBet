<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');



$title = 'Tournois'; 
$racine_path = '../';

/*template*/  include($racine_path.'templates/front/header.php');

/*template*/  include($racine_path.'templates/front/tournament_template.php');

// les valeurs sont des exemples 
//
$tournament_name ="Katowice";
$tournament_cashprize="9999$";
$tournament = $tournament_name. ' / ' . $tournament_cashprize;
$tournament_date="sometime";
$tournament_tier="S tier";
$tournament_teams="x | y | z";

$month = "Mois";

include($racine_path.'templates/front/tournament_struct.php');
include($racine_path.'templates/front/tournament_line.php');
include($racine_path.'templates/front/tournament_line.php');
include($racine_path.'templates/front/tournament_line.php');
echo '</div>';

include($racine_path.'templates/front/tournament_struct.php');
include($racine_path.'templates/front/tournament_line.php');
include($racine_path.'templates/front/tournament_line.php');
include($racine_path.'templates/front/tournament_line.php');
echo '</div>';

echo '</div>';
echo '</div>';

?>
		
<?php ?>

<?php 
?>

<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
