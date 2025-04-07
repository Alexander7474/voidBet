<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = "utilisateurs";

// Vérifie si le fichier n'est pas inclus depuis l'index, et inclut le menu de navigation si nécessaire
if (!isset($in_index)) {
    $racine_path = '../';
    /*template*/  include($racine_path . 'templates/back/menu_nav.php');
}

require_once($racine_path . "model/User.php");
use bd\User;

$userBD = new User();

// Annulation : rechargement de la page
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["annuler"])) {
    header("Location: utilisateurs.php");
    exit;
}

// Validation du formulaire pour ajouter un utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter"])) {
    // Vérifie que tous les champs sont bien remplis
    if (!empty($_POST["new_pseudo"]) && !empty($_POST["new_email"]) && !empty($_POST["new_age"]) && !empty($_POST["new_password"])) {
        $nouveau = new classe\User();
        $nouveau->pseudo = $_POST["new_pseudo"];
        $nouveau->password = $_POST["new_password"];
        $nouveau->email = $_POST["new_email"];
        $nouveau->void_coin = 100;  // Initialise les void_coins à 100
        $nouveau->age = $_POST["new_age"];

        // Sauvegarde le nouvel utilisateur dans la base de données
        $userBD->saveUser($nouveau);
    }
    
    // Dans tous les cas, on recharge la page
    header("Location: utilisateurs.php");
    exit;
}

// Suppression d'un utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer"]) && isset($_POST["id_user"])) {
    $id_user = intval($_POST["id_user"]);
    $userBD->deleteUser($id_user);
    header("Location: utilisateurs.php"); // recharge la page
    exit;
}

// Modification d'un utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valider_modif"]) && isset($_POST["id_user"])) {
    $nouveau = new classe\User();
    $nouveau->id_user = intval($_POST["id_user"]);
    $nouveau->pseudo = $_POST["pseudo"];
    $nouveau->email = $_POST["email"];
    $nouveau->void_coin = intval($_POST["void_coin"]);

    // Met à jour les informations de l'utilisateur
    $userBD->updateUser($nouveau);
    header("Location: utilisateurs.php"); // recharge la page
    exit;
}

// Inclusion des templates
include($racine_path . 'templates/back/utilisateurs_struct.php');

// Affiche la liste des utilisateurs
foreach ($userBD->listeUsers() as $user) {
    $user_id = $user->id_user;
    $user_pseudo = $user->pseudo;
    $user_mail = $user->email;
    $user_vc = $user->void_coin;
    
    // Affiche chaque utilisateur dans la page
    include($racine_path . 'templates/back/utilisateurs_line.php');
}

echo '</div></div></body></html>';
?>