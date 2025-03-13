
<?php
    
    $title = 'Utilisateur'; 
    $racine_path = '../';

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    

    /*template*/  include($racine_path.'templates/front/header.php');

    // valeur pour exemple
    $titre="Utilisateur";
    $nom ="Nom";
    $prenom ="Prénom";
    $pseudo="Pseudo";
    $email="Email";
    $password = "Password";


    include($racine_path.'templates/front/utilisateur_template.php');

    /*template*/  include($racine_path.'templates/front/footer.php');
?>