<?php 

unset($_COOKIE['logged']);
setcookie('logged', '', time() - 10, '/');
header('Location: connexion.php');

?>
