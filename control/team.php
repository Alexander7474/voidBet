<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = 'Équipes'; 
if(!isset($in_index)){
  $racine_path = '../';
  /*template*/  include($racine_path.'templates/front/header.php');
}

/*template*/  include($racine_path.'templates/front/team_template.php');

require_once($racine_path."model/Equipe.php");
use bd\Equipe;

require_once($racine_path."model/Joueur.php");
use bd\Joueur;

$equipeBD = new Equipe();
$joueurDB = new Joueur();

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
