
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $racine_path='../';

    // template
    include($racine_path.'templates/back/menu_nav.php');
    include($racine_path.'templates/back/utilisateurs_struct.php');

    // valeur pour exemple
    $title="utilisateurs";

    require_once($racine_path."model/User.php");
    use bd\User;

    $userBD = new User();

    foreach ($userBD->listeUsers() as $user) 
    {
        $user_id = $user->id_user;
        $user_pseudo = $user->pseudo;
        $user_mail = $user->email;
        $user_vc = $user->void_coin;
        $user_age = $user->age;

        include($racine_path.'templates/back/utilisateurs_line.php');
    }

    // Suppression d'un utilisateur
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer"]) && isset($_POST["id_user"])) {
        $id_user = intval($_POST["id_user"]);
        $userBD->deleteUser($id_user);
        header("Location: utilisateurs.php"); // recharge la page
        exit;
    }

    // Modification instantanée d'un utilisateur
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valider_modif"]) && isset($_POST["id_user"])) {
        $id_user = intval($_POST["id_user"]);
        $pseudo = $_POST["pseudo"];
        $email = $_POST["email"];
        $age = intval($_POST["age"]);
        $void_coin = intval($_POST["void_coin"]);

        $userBD->updateUser($id_user, $pseudo, $email, $age, $void_coin);
        header("Location: utilisateurs.php"); // recharge la page
        exit;
    }
    
    echo '</div></div></body></html>';
?>