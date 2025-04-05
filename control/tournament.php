<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = 'Tournois'; 
if(!isset($in_index)){
  $racine_path = '../';
}

require_once($racine_path."model/Equipe.php");
use bd\Equipe;

require_once($racine_path."model/Tournoi.php");
use bd\Tournoi;

require_once($racine_path.'model/User.php');
use bd\User;

$equipeDB = new Equipe();
$tournoiDB = new Tournoi();

// si pas dans index alors procedure pour afficher le tab avec l'utilisateur
if(!isset($in_index)){
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
}

/*template*/  include($racine_path.'templates/front/tournament_template.php');

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
