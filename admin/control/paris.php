<?php
/**
 * Fichier de gestion des paris (affichage, ajout, suppression, modification).
 * 
 * - Affiche la liste des paris avec les informations associées.
 * - Permet l'ajout d'un nouveau pari via formulaire.
 * - Permet la modification ou la suppression d'un pari existant.
 * 
 * Ce fichier suppose l'existence des classes :
 * - classe\Bet (représentation d'un pari)
 * - bd\Bet (accès base de données)
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = "Paris";

// Inclusion du menu de navigation si le fichier n'est pas inclus depuis index
if (!isset($in_index)) {
    $racine_path = '../';
    include($racine_path . 'templates/back/menu_nav.php');
}

// Inclusion du modèle d'accès aux paris
require_once($racine_path . "model/Bet.php");
use bd\Bet;

$parisBD = new Bet();

// -----------------------------------------------------------------------------
// Annulation (rechargement simple de la page)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["annuler"])) {
    header("Location: utilisateurs.php");
    exit;
}

// -----------------------------------------------------------------------------
// Ajout d’un nouveau pari via formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ajouter"])) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["match"]) &&
        !empty($_POST["date_paris"]) &&
        !empty($_POST["equipe1"]) &&
        !empty($_POST["equipe2"]) &&
        !empty($_POST["cote"])
    ) {
        $nouveau = new classe\Bet();
        $nouveau->id_match = $_POST["nom"];
        $nouveau->date_paris = $_POST["date_paris"];
        $nouveau->match = $_POST["match"];
        $nouveau->equipe1 = $_POST["equipe1"];
        $nouveau->equipe2 = $_POST["equipe2"];
        $nouveau->cote = $_POST["cote"];

        // Sauvegarde en base de données
        $parisBD->saveBet($nouveau);
    }

    // Redirection après ajout
    header("Location: paris.php");
    exit;
}

// -----------------------------------------------------------------------------
// Suppression d’un pari
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["supprimer"]) && isset($_POST["id_paris"])) {
    $id_paris = intval($_POST["id_paris"]);
    $parisBD->deleteBet($id_paris);
    header("Location: paris.php");
    exit;
}

// -----------------------------------------------------------------------------
// Modification d’un pari existant
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifier"]) && isset($_POST["id_paris"])) {
    $nouveau = new classe\Bet();
    $nouveau->id_paris = intval($_POST["id_paris"]);
    $nouveau->date_paris = $_POST["date_paris"];
    $nouveau->nom_tournoi = $_POST["nom_tournoi"];
    $nouveau->match = $_POST["match"];
    $nouveau->equipe1 = $_POST["equipe1"];
    $equipe2 = $_POST["equipe2"]; 
    $nouveau->cote = floatval($_POST["cote"]);

    $parisBD->updateBet($nouveau);
    header("Location: paris.php");
    exit;
}

// -----------------------------------------------------------------------------
// Affichage de la structure HTML
include($racine_path . 'templates/back/paris_struct.php');

// Affichage ligne par ligne des paris existants
foreach ($parisBD->listeBets() as $paris) {
    $id = $paris->id_paris;
    $nom = $parisBD->getNameTournament($id);       // Nom du tournoi lié
    $match_format = "Bo" . $parisBD->getFormatTournament($id); // Format du match
    $equipe1 = $parisBD->getEquipe1($id);
    $equipe2 = $parisBD->getEquipe2($id);
    $date_paris = $paris->date_paris;
    $cote = $paris->cote;

    include($racine_path . 'templates/back/paris_line.php');
}

// Fermeture des balises HTML
echo '</div></div></body></html>';
?>