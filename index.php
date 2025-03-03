<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = 'Accueil'; 
$racine_path = './';

// les valeurs sont des exemples 
$team1 ="Spirit";
$team2 ="Navi";
$match_format="Bo3";
$match_time="10:30";
$match_tournament="Cologne";
$team1_cote="1.32";
$team2_cote="2.52";

$matches_top = '

';

$matches_line = '
  <div class="row first-plan-h mt-3">
    <div class="col">'.$match_time.'</div>
    <div class="col">
      <span class="bg-warning rounded p-1">'.$team1_cote.'</span>
       <b>'.$team1.'</b> 
      <span class="second-plan rounded p-1">'.$match_format.'</span>
      <b>'.$team2.'</b> 
      <span class="bg-warning rounded p-1">'.$team2_cote.'</span>
    </div>
    <div class="col">'.$match_tournament.'</div>
  </div>
';

$daily_matches_struct = '
  <div class="mt-2 mb-2 p-2 d-flex flex-column align-items-center second-plan rounded">

    <h3 class="mt-1 mb-1 border-bottom w-100">Date</h3>    

    <div class="p-2 text-white w-100 text-center align-items-center rounded first-plan">
      <div class="row">
        <div class="col">Heure</div>
        <div class="col">Match</div>
        <div class="col">Tournois</div>
      </div>
    '.$matches_line.$matches_line.$matches_line.'
    </div>
  </div>
'; // stock les divs des matches à afficher

$matches = $daily_matches_struct.$daily_matches_struct.$daily_matches_struct;

// les valeurs sont des exemples 
$team_name ="Navi";
$team_cashprize="9999$";
$players = ["p1", "p2", "p3", "p2", "p3"];
$player_cashprize="9999$";
$kd = "0.95";

$teams_line = '
<h3 class="mt-3 mb-1 border-bottom w-100">Nom équipe</h3>    
<div class="mb-3 p-2 text-white w-100 text-center align-items-center rounded first-plan">
  <div class="row mt-1 mb-1">
    <div class="col"><b>Coach</b></div>
    <div class="col"></div>
';

foreach ($players as $p => $name) {
  $teams_line = $teams_line. '
    <div class="col"><b>'.$name.'</b></div>
  ';
}

$teams_line = $teams_line.'
  </div>
</div>
';

$teams_struct = '
  <div class="mt-2 mb-2 p-2 d-flex flex-column align-items-center second-plan rounded">
    '.$teams_line.$teams_line.$teams_line.'
  </div>
'; // stock les divs des teams à afficher

$teams = $teams_struct;

// les valeurs sont des exemples 
$tournament_name ="Navi";
$tournament_cashprize="9999$";
$player_cashprize="9999$";
$kd = "0.95";

$tournaments_line = '
  <div class="row">
    <div class="col-5 d-flex justify-content-start"><b>Cologne / 400 000 $</b></div>
    <div class="col-1">S tier</div>
    <div class="col-3">25/10/2025 - 26/10/2025</div>
    <div class="col-3 d-flex justify-content-start">xyz</div>
  </div>
';

$tournaments_struct = '
  <div class="mt-2 mb-2 p-2 d-flex flex-column align-items-center second-plan rounded">
    <h3 class="mt-3 mb-2 border-bottom w-100">Mois</h3>    
    <div class="mb-3 p-2 text-white w-100 text-center align-items-center rounded first-plan">
     <div class="row mt-1 mb-1">
      <div class="col-5 d-flex justify-content-start">Tournois/Prix</div>
      <div class="col-1">Niveau</div>
      <div class="col-3">Date</div>
      <div class="col-3 d-flex justify-content-start">Participants</div>
     </div>
     '.$tournaments_line.$tournaments_line.$tournaments_line.'
    </div>
  </div>
'; // stock les divs des tournaments à afficher

$tournaments = $tournaments_struct.$tournaments_struct;

?>
		
<?php /*template*/  include($racine_path.'templates/front/header.php');?>

<?php 
/*template*/  include($racine_path.'templates/front/main.php');
?>

<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
