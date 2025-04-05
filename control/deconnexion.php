<?php 
session_start();

unset($_COOKIE['logged']);
setcookie('logged', '', time() - 10, '/');

// Supprimer le cookie de session (facultatif mais recommandé)
if (ini_get("session.use_cookies")) {
    setcookie(session_name(), '', time() - 3600, "/");
}

session_destroy();

header('Location: connexion.php');
?>
