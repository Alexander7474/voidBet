<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $in_index=true;
    $title = "Accueil Admin";
    $racine_path = "./";
    $session_user = 1;

    /*template*/
    include($racine_path.'templates/back/menu_nav.php');
    include($racine_path.'templates/back/menu.php');
    include($racine_path.'templates/back/cookie.php');

    echo '</body></html>';
?>
