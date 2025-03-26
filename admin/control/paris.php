
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $racine_path='../';

    // template
    include($racine_path.'templates/back/menu_nav.php');
    include($racine_path.'templates/back/paris_struct.php');

    // valeur pour exemple
    $title="Paris";

    require_once($racine_path."model/Bet.php");
    use bd\Bet;

    require_once($racine_path."model/Game.php");
    use bd\Game;

    $parisBD = new Bet();
    $matchBD = new Game();

    foreach ($parisBD->listeBets() as $paris) {
        $nom = "tournois rocket league"; // À récupérer dynamiquement
        $match = "demi-final"; // À récupérer dynamiquement
        $equipe1 = "Valorant"; // À récupérer dynamiquement
        $equipe2 = "SSS"; // À récupérer dynamiquement
        $valeur = $paris->cote;
    
        include($racine_path.'templates/back/paris_line.php');
    }
    
    // Suppression d'un pari
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer"]) && isset($_POST["id_paris"])) {
        $id_paris = intval($_POST["id_paris"]);
        $parisBD->deleteBet($id_paris);
        header("Location: paris.php");
        exit;
    }
    
    // Modification instantanée d'un pari
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valider_modif"]) && isset($_POST["id_paris"])) {
        $id_paris = intval($_POST["id_paris"]);
        $nom_tournoi = $_POST["nom_tournoi"];
        $match = $_POST["match"];
        $equipe1 = $_POST["equipe1"];
        $equipe2 = $_POST["equipe2"];
        $cote = floatval($_POST["cote"]);
    
        $parisBD->updateBet($id_paris, $nom_tournoi, $match, $equipe1, $equipe2, $cote);
        header("Location: paris.php");
        exit;
    }

    echo '</div></div></body></html>';
?>