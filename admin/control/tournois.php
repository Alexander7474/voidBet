
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $racine_path='../';

    // template
    include($racine_path.'templates/back/menu_nav.php');
    include($racine_path.'templates/back/tournois_struct.php');

    // valeur pour exemple
    $title="Tournois";

    require_once($racine_path."model/Tournoi.php");
    use bd\Tournoi;

    require_once($racine_path."model/Equipe.php");
    use bd\Equipe;

    $tournoisBD = new Tournoi();
    $equipesBD = new Equipe();

    foreach ($tournoisBD->listeTournois() as $tournoi) {
        $tournament_name = $tournoi->nom_tournoi;
        $tournament_cashprize = $tournoi->cash_prize;
        $tournament_date = $tournoi->date_debut;
    
        // Ajouter les équipes et le tier (à récupérer dynamiquement si possible)
        $tournament_tier = "S tier";
        $tournament_teams = "x | y | z";
    
        include($racine_path.'templates/back/tournois_line.php');
    }
    
    // Suppression d'un tournoi
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer"]) && isset($_POST["id_tournoi"])) {
        $id_tournoi = intval($_POST["id_tournoi"]);
        $tournoisBD->deleteTournoi($id_tournoi);
        header("Location: tournois.php");
        exit;
    }
    
    // Modification instantanée d'un tournoi
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valider_modif"]) && isset($_POST["id_tournoi"])) {
        $id_tournoi = intval($_POST["id_tournoi"]);
        $nom_tournoi = $_POST["nom_tournoi"];
        $cash_prize = intval($_POST["cash_prize"]);
        $tier = $_POST["tier"];
        $date_debut = $_POST["date_debut"];
        $equipes = $_POST["equipes"];
    
        $tournoisBD->updateTournoi($id_tournoi, $nom_tournoi, $cash_prize, $tier, $date_debut, $equipes);
        header("Location: tournois.php");
        exit;
    }

    echo '</div></div></body></html>';
?>