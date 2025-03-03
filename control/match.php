<?php
$title = 'Matchs'; 
$racine_path = '../';

if(isset($GET['match_id'])){

}else{
  // les valeurs sont des exemples 
  $team1 ="Spirit";
  $team2 ="Navi";
  $match_format="Bo3";
  $match_time="10:30";
  $match_tournament="Cologne";
  $team1_cote="1.32";
  $team2_cote="2.52";

  $matches_top = '

  ';

  $matches_line = '
    <div class="row first-plan-h mt-3">
      <div class="col-2">'.$match_time.'</div>
      <div class="col-8">
        <span class="bg-warning rounded p-1">'.$team1_cote.'</span>
         <b>'.$team1.'</b> 
        <span class="second-plan rounded p-1">'.$match_format.'</span>
        <b>'.$team2.'</b> 
        <span class="bg-warning rounded p-1">'.$team2_cote.'</span>
      </div>
      <div class="col-2">'.$match_tournament.'</div>
    </div>
  ';

  $daily_matches_struct = '

      <h3 class="mt-1 mb-1 border-bottom w-100">Date</h3>    

      <div class="p-2 text-white w-100 text-center align-items-center rounded first-plan">
        <div class="row">
          <div class="col-2">Heure</div>
          <div class="col-8">Match</div>
          <div class="col-2">Tournois</div>
        </div>
      '.$matches_line.$matches_line.$matches_line.'
    </div>
  '; // stock les divs des matches à afficher

  $matches = $daily_matches_struct.$daily_matches_struct.$daily_matches_struct;
}

?>
		
<?php /*template*/  include($racine_path.'templates/front/header.php');?>

<?php 
/*template*/  include($racine_path.'templates/front/match_template.php');
?>

<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
