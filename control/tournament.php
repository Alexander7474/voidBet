<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = 'Tournois'; 
if(!isset($in_index)){
  $racine_path = '../';
  /*template*/  include($racine_path.'templates/front/header.php');
}

/*template*/  include($racine_path.'templates/front/tournament_template.php');

require_once($racine_path."model/Equipe.php");
use bd\Equipe;

require_once($racine_path."model/Tournoi.php");
use bd\Tournoi;

$equipeDB = new Equipe();
$tournoiDB = new Tournoi();

$month = "";
//rangement des tournois par date 
//
foreach ($tournoiDB->listeTournois() as $tournoi) {

  $tournoi_month = $monthName = date('F', mktime(0, 0, 0, date("m", strtotime($tournoi->date_debut)), 10));

  if($month == ""){
    $month = $tournoi_month;
    include($racine_path.'templates/front/tournament_struct.php');
  }

  if($month != $tournoi_month){
    echo '</div>';
    $month = $tournoi_month;
    include($racine_path.'templates/front/tournament_struct.php');
  }

  //récups joueurs
  $equipes = "| ";
  foreach ($tournoiDB->getIdEquipesTournoi($tournoi->id_tournoi) as $id) {
    $equipes = $equipes.$equipeDB->getEquipe($id)->nom_equipe." |";
  }

  $tournament_name =$tournoi->nom_tournoi;
  $tournament_cashprize=$tournoi->cash_prize;
  $tournament = $tournament_name. ' / ' . $tournament_cashprize."$";
  $tournament_date=$tournoi->date_debut;
  $tournament_tier="S tier";
  $tournament_teams=$equipes;

  include($racine_path.'templates/front/tournament_line.php');
}

echo '</div>';
echo '</div>';
echo '</div>';

if(!isset($in_index)){
  /*template*/  include($racine_path.'templates/front/footer.php');
}
?>
