<?php
$title = 'Matchs'; 
$racine_path = '../';

error_reporting(E_ALL);
ini_set('display_errors', '1');



/*template*/  include($racine_path.'templates/front/header.php');
/*template*/  include($racine_path.'templates/front/match_template.php');

if(isset($_GET['match_id'])){
  // traitement pour récupérer le match concerné  
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

  echo '</div>';

  include($racine_path.'templates/front/match_bet.php');

  echo '</div></div>';


}else{

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
  
  echo '</div></div></div>';
}

?>
		

<?php 
?>

<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
