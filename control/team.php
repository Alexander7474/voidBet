<?php
$title = 'Équipes'; 
$racine_path = '../';

/*template*/  include($racine_path.'templates/front/header.php');

/*template*/  include($racine_path.'templates/front/team_template.php');

// les valeurs sont des exemples 
$team_name ="Navi";
$coach = "babineaux";
$team_cashprize="9999$";
$players = ["p1", "p2", "p3", "p2", "p3"];
$player_cashprize="9999$";
$kd = "0.95";


include($racine_path.'templates/front/team_line.php');
include($racine_path.'templates/front/team_line.php');
include($racine_path.'templates/front/team_line.php');
include($racine_path.'templates/front/team_line.php');
include($racine_path.'templates/front/team_line.php');

echo '</div>';
echo '</div>';

?>
		

<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
