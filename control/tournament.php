<?php
$title = 'Tournois'; 
$racine_path = '../';

// les valeurs sont des exemples 
$tournament_name ="Navi";
$tournament_cashprize="9999$";
$player_cashprize="9999$";
$kd = "0.95";

$tournaments_line = '
  <div class="row">
    <div class="col-5 d-flex justify-content-start"><b>Cologne / 400 000 $</b></div>
    <div class="col-1">S tier</div>
    <div class="col-3">25/10/2025 - 26/10/2025</div>
    <div class="col-3 d-flex justify-content-start">xyz</div>
  </div>
';

$tournaments_struct = '
  <div class="mt-2 mb-2 p-2 d-flex flex-column align-items-center second-plan rounded">
    <h3 class="mt-3 mb-2 border-bottom w-100">Mois</h3>    
    <div class="mb-3 p-2 text-white w-100 text-center align-items-center rounded first-plan">
     <div class="row mt-1 mb-1">
      <div class="col-5 d-flex justify-content-start">Tournois/Prix</div>
      <div class="col-1">Niveau</div>
      <div class="col-3">Date</div>
      <div class="col-3 d-flex justify-content-start">Participants</div>
     </div>
     '.$tournaments_line.$tournaments_line.$tournaments_line.'
    </div>
  </div>
'; // stock les divs des tournaments à afficher

$tournaments = $tournaments_struct.$tournaments_struct;

?>
		
<?php /*template*/  include($racine_path.'templates/front/header.php');?>

<?php 
/*template*/  include($racine_path.'templates/front/tournament_template.php');
?>

<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
