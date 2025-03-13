<?php 
    $title = "connexion";
    $racine_path = '../';
    
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    require($racine_path.'model/GestionBD.php');
    use bd\GestionBD;

    include($racine_path.'templates/front/header.php');
    include($racine_path.'templates/front/connexion_template.php');
    include($racine_path.'templates/front/footer.php');
?>
