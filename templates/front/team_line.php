<h3 class="mt-3 mb-1 border-bottom w-100"><?php echo $team_name;?></h3>    
<div class="mb-3 p-2 text-white w-100 text-center align-items-center rounded first-plan">
  <div class="row mt-1 mb-1">
<div class="col"><b><?php echo $coach;?></b></div>
    <div class="col"></div>
    <?php foreach ($players as $p => $name) {
        echo '<div class="col"><b>'.$name.'</b></div>';
    }
    ?>
  </div>
</div>
