<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

$title = '404'; 
$racine_path = '../';
$html_racine_path = './';

require_once($racine_path.'model/User.php');
use bd\User;

if(isset($_SESSION['logged'])){
  $tab_unser = unserialize($_SESSION['logged']);
  $userDB = new User();

  $user = $userDB->getUser($tab_unser[0]['id']);

  if($user != null){
    if($user->password == $tab_unser[0]['password']){
      $session_user = $user;
    }
  }
}
/*template*/  include($racine_path.'templates/front/cookie.php');
/*template*/  include($racine_path.'templates/front/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Destinataire de l'e-mail (vous pouvez ajouter plusieurs destinataires ici)
    $to = "alexandre.lanternier@alumni.univ-avignon.fr"; 

    // Sujet de l'e-mail
    $subject = "Nouveau message de VoidBet";

    // Corps du message
    $body = "Vous avez reçu un nouveau message du formulaire de contact.\n\n".
            "E-mail: $email\n\n".
            "Message:\n$message";

    // En-têtes pour l'e-mail (optionnel, mais recommandé pour la lisibilité)
    $headers = "From: $email\r\n".
               "Reply-To: $email\r\n".
               "X-Mailer: PHP/" . phpversion();

    // Envoi de l'e-mail
    if (mail($to, $subject, $body, $headers)) {
      header('Location: .');
    } else {
      header('Location: .');
    }
}

header('Location: .');

/*template*/  include($racine_path.'templates/front/footer.php');

?>
