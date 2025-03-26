<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = 'Matchs'; 
if(!isset($in_index)){
  $racine_path = '../';
  /*template*/  include($racine_path.'templates/front/header.php');
}

require_once($racine_path."model/Match.php");
use bd\Matchs;

require_once($racine_path."model/Equipe.php");
use bd\Equipe;

require_once($racine_path."model/Tournoi.php");
use bd\Tournoi;

require_once($racine_path."model/BetOnScore.php");
use bd\BetOnScore;

require_once($racine_path."model/BetOnResult.php");
use bd\BetOnResult;

require_once($racine_path."class/BetOnScore.php");

require_once($racine_path."class/BetOnResult.php");

require_once($racine_path."model/Bet.php");
use bd\Bet;

require_once($racine_path."class/Bet.php");

$equipeDB = new Equipe();
$matchsDB = new Matchs();
$tournoiDB = new Tournoi();

/*template*/  include($racine_path.'templates/front/match_template.php');

if(isset($_GET['match_id'])){

  $m = $matchsDB->getMatch($_GET['match_id']);

  $date = $m->date_match;
  //récups equipes

  $t1 = $equipeDB->getEquipe($m->id_equipe1);
  $t2 = $equipeDB->getEquipe($m->id_equipe2);

  // les valeurs sont des exemples 
  $team1 = $t1->nom_equipe;
  $team2 = $t2->nom_equipe;
  $formated_name = str_replace(" ", "-", strtolower($t1->nom_equipe));
  $team1_logo = "https://raw.githubusercontent.com/lootmarket/esport-team-logos/refs/heads/master/csgo/".$formated_name."/".$formated_name."-logo.png";
  $formated_name = str_replace(" ", "-", strtolower($t2->nom_equipe));
  $team2_logo = "https://raw.githubusercontent.com/lootmarket/esport-team-logos/refs/heads/master/csgo/".$formated_name."/".$formated_name."-logo.png";
  $match_format="Bo".$m->format;
  $match_time=$m->heure_match;
  $match_tournament=$tournoiDB->getTournoi($m->id_tournoi)->nom_tournoi;
  $team1_cote=$m->cote1;
  $team2_cote=$m->cote2;

  $match_bet_link = $racine_path.'control/match.php?match_id='.$m->id_match;
  $match_id = $m->id_match;

  include($racine_path.'templates/front/daily_match.php');
  include($racine_path.'templates/front/match_line.php');

  echo '</div>';

  include($racine_path.'templates/front/match_bet.php');

   
  if(isset($_GET['bet_value']) && isset($_GET['result']) && isset($_GET['selected_team']) && isset($_GET['score1']) && isset($_GET['score2'])){ // on enregistre le paris 

    $betDB = new Bet();

    $bet = new classe\Bet();
    $bet->id_match = $_GET['match_id'];
    $bet->date_paris = date('Y-m-d');
    $bet->valeur = $_GET['bet_value'];

    //rajouter des test sur les fonds avec la session

    $bet->id_user = 1; // a gérer avec la session a l'avenir

    if(isset($_GET['on_score'])){ //paris sur le score-------------------------------
      $betScoreDB = new BetOnScore();

      if($_GET['score1'] > $_GET['score2']){
        $bet->cote = $team1_cote;
      }else{
        $bet->cote = $team2_cote;
      }

      $id_paris = $betDB->saveBet($bet); // save du paris

      $betScore = new classe\BetOnScore();

      $betScore->id_paris = $id_paris;
      $betScore->score1 = $_GET['score1'];
      $betScore->score2 = $_GET['score2'];

      $betScoreDB->saveBetOnScore($betScore);
      echo $bet;
    }else{ //paris sur le résultat --------------------------------------------------
      $betResultDB = new BetOnResult();

      if($_GET['selected_team'] == $t1->nom_equipe){
        $bet->cote = $team1_cote;
      }else{
        $bet->cote = $team2_cote;
      }

      $id_paris = $betDB->saveBet($bet); // save du paris

      $betResult = new classe\BetOnResult();

      $betResult->id_paris = $id_paris;
      $betResult->result = $_GET['result'];
      if($_GET['selected_team'] == $t1->nom_equipe){
        $betResult->id_equipe = $t1->id_equipe;
      }else{
        $betResult->id_equipe = $t2->id_equipe;
      }

      $betResultDB->saveBetOnResult($betResult);
      echo "bet saved";

    }// -----------------------------------------------------------------------------
  }

  echo '</div></div>';

}else{
  $equipeDB = new Equipe();
  $matchsDB = new Matchs();
  $tournoiDB = new Tournoi();

  $date = "";
  //rangement des tournois par date 
  //
  foreach ($matchsDB->listeMatchs() as $m) {
    if($date == ""){
      $date = $m->date_match;
      include($racine_path.'templates/front/daily_match.php');
    }

    if($date != $m->date_match){
      echo '</div>';
      $date = $m->date_match;
      include($racine_path.'templates/front/daily_match.php');
    }

    //récups equipes

    $t1 = $equipeDB->getEquipe($m->id_equipe1);
    $t2 = $equipeDB->getEquipe($m->id_equipe2);

    // les valeurs sont des exemples 
    $team1 = $t1->nom_equipe;
    $team2 = $t2->nom_equipe;
    $formated_name = str_replace(" ", "-", strtolower($t1->nom_equipe));
    $team1_logo = "https://raw.githubusercontent.com/lootmarket/esport-team-logos/refs/heads/master/csgo/".$formated_name."/".$formated_name."-logo.png";
    $formated_name = str_replace(" ", "-", strtolower($t2->nom_equipe));
    $team2_logo = "https://raw.githubusercontent.com/lootmarket/esport-team-logos/refs/heads/master/csgo/".$formated_name."/".$formated_name."-logo.png";
    $match_format="Bo".$m->format;
    $match_time=$m->heure_match;
    $match_tournament=$tournoiDB->getTournoi($m->id_tournoi)->nom_tournoi;
    $team1_cote=$m->cote1;
    $team2_cote=$m->cote2;

    $match_bet_link = $racine_path.'control/match.php?match_id='.$m->id_match;
    $match_id = $m->id_match;

    include($racine_path.'templates/front/match_line.php');
  }
  echo '</div></div></div>';
}


if(!isset($in_index)){
  /*template*/  include($racine_path.'templates/front/footer.php');
}
?>
