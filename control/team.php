<?php
$title = 'Équipes'; 
$racine_path = '../';

// les valeurs sont des exemples 
$team_name ="Navi";
$team_cashprize="9999$";
$players = ["p1", "p2", "p3", "p2", "p3"];
$player_cashprize="9999$";
$kd = "0.95";

$teams_line = '
<h3 class="mt-3 mb-1 border-bottom w-100">Nom équipe</h3>    
<div class="mb-3 p-2 text-white w-100 text-center align-items-center rounded first-plan">
  <div class="row mt-1 mb-1">
    <div class="col"><b>Coach</b></div>
    <div class="col"></div>
';

foreach ($players as $p => $name) {
  $teams_line = $teams_line. '
    <div class="col"><b>'.$name.'</b></div>
  ';
}

$teams_line = $teams_line.'
  </div>
</div>
';

$teams_struct = '
  <div class="mt-2 mb-2 p-2 d-flex flex-column align-items-center second-plan rounded">
    '.$teams_line.$teams_line.$teams_line.'
  </div>
'; // stock les divs des teams à afficher

$teams = $teams_struct;

?>
		
<?php /*template*/  include($racine_path.'templates/front/header.php');?>

<?php 
/*template*/  include($racine_path.'templates/front/team_template.php');
?>

<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
