<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = 'Équipes'; 
if(!isset($in_index)){
  session_start();
  $racine_path = '../';
}

require_once($racine_path."model/Equipe.php");
use bd\Equipe;

require_once($racine_path."model/Joueur.php");
use bd\Joueur;

require_once($racine_path.'model/User.php');
use bd\User;

$equipeBD = new Equipe();
$joueurDB = new Joueur();

// si pas dans index alors procedure pour afficher le tab avec l'utilisateur
if(!isset($in_index)){
  if(isset($_SESSION['logged'])){
    $tab_unser = unserialize($_SESSION['logged']);
    $userDB = new User();

    $user = $userDB->getUser($tab_unser[0]['id']);

    if($user != null){
      if($user->password == $tab_unser[0]['password']){
        $session_user = $user;
      }
    }
  }
/*template*/  include($racine_path.'templates/front/cookie.php');
  /*template*/  include($racine_path.'templates/front/header.php');
}

/*template*/  include($racine_path.'templates/front/team_template.php');

foreach ($equipeBD->listeEquipes() as $equipe) {
  $formated_name = str_replace(" ", "-", strtolower($equipe->nom_equipe));
  $team_logo = "https://raw.githubusercontent.com/lootmarket/esport-team-logos/refs/heads/master/csgo/".$formated_name."/".$formated_name."-logo.png";
  $team_name =$equipe->nom_equipe;
  $team_cashprize="9999$";

  //récup coach 
  $coach = $joueurDB->getJoueur($equipe->id_coach)->pseudo;

  //récups joueurs
  $players = ["p1", "p2", "p3", "p2", "p3"];
  $cpt = 0;
  foreach ($equipeBD->getIdJoueursEquipe($equipe->id_equipe) as $id) {
    $players[$cpt] = $joueurDB->getJoueur($id)->pseudo;
    $cpt+=1;
  }

  include($racine_path.'templates/front/team_line.php');
}


echo '</div>';
echo '</div>';

if(!isset($in_index)){
  /*template*/  include($racine_path.'templates/front/footer.php');
}
?>
