<?php
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $in_index=true;
    $title = "Accueil Admin";
    $racine_path = "./";
    $html_racine_path = './';
    


    /*template*/
    include($racine_path.'templates/back/menu_nav.php');
    include($racine_path.'templates/back/connexion_template.php');
    include($racine_path.'templates/back/cookie.php');

    echo '</body></html>';
?>
