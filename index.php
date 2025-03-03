<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = "Accueil";
$racine_path = "./";

/*template*/  include($racine_path.'templates/front/header.php');

echo '<div class="container text-white">';
echo '<div class="row">';
  echo '<div class="col">'; // colonne match


/*template*/  include($racine_path.'templates/front/match_template.php');

// traitement pour récupérer la liste des matchs disponnibles 
//

// les valeurs sont des exemples 
$team1 ="Spirit";
$team2 ="Navi";
$match_format="Bo3";
$match_time="10:30";
$match_tournament="Cologne";
$team1_cote="1.32";
$team2_cote="2.52";

$date = "Un jour";

$match_bet_link = $racine_path.'control/match.php?match_id=0';

include($racine_path.'templates/front/daily_match.php');
include($racine_path.'templates/front/match_line.php');
include($racine_path.'templates/front/match_line.php');
include($racine_path.'templates/front/match_line.php');
include($racine_path.'templates/front/match_line.php');
include($racine_path.'templates/front/match_line.php');

echo'</div>';
include($racine_path.'templates/front/daily_match.php');
include($racine_path.'templates/front/match_line.php');
include($racine_path.'templates/front/match_line.php');
include($racine_path.'templates/front/match_line.php');
include($racine_path.'templates/front/match_line.php');
include($racine_path.'templates/front/match_line.php');

echo'</div>';
include($racine_path.'templates/front/daily_match.php');
include($racine_path.'templates/front/match_line.php');  
include($racine_path.'templates/front/match_line.php');

echo '</div></div></div>'; //fermeture de match template

echo '</div>'; //fermeture de la colonne match
echo '<div class="col">'; // colonne team/tounois
  echo '<div class="row>'; // ligne team

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
echo '</div>'; // fermeture de team template

echo '</div>'; // fermeture de la ligne team
echo '<div class="row>'; // ligne tournois

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
echo '</div>'; //fermeture de tournament template

echo '</div>'; //fermeture de la ligne tournois

echo '</div>'; // fermeture de la row de index

echo '</div>'; // fermeture du container de index

?>
		
<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
