<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    /**
     * Page de gestion des tournois.
     *
     * Ce fichier permet de gérer les actions liées aux tournois, comme l'ajout, la suppression,
     * et la modification des tournois. Il affiche également la liste des tournois existants et 
     * leurs équipes associées.
     *
     * @package back
     */
    
    $title="Tournois";
    
    // Vérifie si le fichier est inclus dans l'index
    if(!isset($in_index)){
        $racine_path = '../';
        /*template*/  include($racine_path.'templates/back/menu_nav.php');
    }

    // Inclusion des modèles pour Tournoi et Equipe
    require_once($racine_path."model/Tournoi.php");
    use bd\Tournoi;

    require_once($racine_path."model/Equipe.php");
    use bd\Equipe;

    // Création des objets pour l'interaction avec la base de données
    $tournoisBD = new Tournoi();
    $equipesBD = new Equipe();

    // Annulation : rechargement de la page
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["annuler"])) {
        header("Location: utilisateurs.php");
        exit;
    }

    // Ajout d'un nouveau tournoi
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter"])) {
        if (!empty($_POST["nom_tournoi"]) && !empty($_POST["cash_prize"]) && !empty($_POST["date_debut"])) {
            $nouveau = new Tournoi();
            $nouveau->nom_tournoi = $_POST["nom_tournoi"];
            $nouveau->cash_prize = $_POST["cash_prize"];
            $nouveau->date_debut = $_POST["date_debut"];
    
            // Sauvegarde du tournoi dans la base de données
            $tournoisBD->saveTournoi($nouveau);
        }
        header("Location: tournois.php");
        exit;
    }

    // Suppression d'un tournoi
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer"]) && isset($_POST["id_tournoi"])) {
        $id_tournoi = intval($_POST["id_tournoi"]);
        $tournoisBD->deleteTournoi($id_tournoi);
        header("Location: tournois.php");
        exit;
    }
    
    // Modification d'un tournoi existant
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modifier"]) && isset($_POST["id_tournoi"])) {
        $tournoi = new Tournoi();
        $tournoi->id_tournoi = intval($_POST["id_tournoi"]);
        $tournoi->nom_tournoi = $_POST["nom_tournoi"];
        $tournoi->cash_prize = intval($_POST["cash_prize"]);
        $tournoi->tier = $_POST["tier"];
        $tournoi->date_debut = $_POST["date_debut"];
        $tournoi->equipes = $_POST["equipes"];
    
        // Mise à jour des informations du tournoi dans la base de données
        $tournoisBD->updateTournoi($tournoi);
        header("Location: tournois.php");
        exit;
    }

    // Inclusion du template pour afficher la structure des tournois
    include($racine_path.'templates/back/tournois_struct.php');

    // Affichage de la liste des tournois
    foreach ($tournoisBD->listeTournois() as $tournoi) {
        $tournament_id = $tournoi->id_tournoi;
        $tournament_name = $tournoi->nom_tournoi;
        $tournament_cashprize = $tournoi->cash_prize;
        $tournament_date = $tournoi->date_debut;
    
        $tournament_tier = "S tier";  // Niveau du tournoi par défaut

        // Récupération des équipes associées au tournoi
        $equipes = "| ";
        foreach ($tournoisBD->getIdEquipesTournoi($tournoi->id_tournoi) as $id) {
            $equipes = $equipes.$equipesBD->getEquipe($id)->nom_equipe." |";
        }

        $tournament_teams = $equipes;
    
        // Inclusion du template pour afficher chaque ligne de tournoi
        include($racine_path.'templates/back/tournois_line.php');
    }

    // Fermeture des balises HTML de la page
    echo '</div></div></body></html>';
?>