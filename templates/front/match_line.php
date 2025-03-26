<a href="<?php echo $match_bet_link; ?>">
<div class="row first-plan-h mt-3">
      <div class="col-2"><?php echo $match_time; ?></div>
      <div class="col-1 text-end">
        <span class="bg-warning rounded p-1"><?php echo $team1_cote; ?></span>
      </div>
      <div class="col-2 text-start">
        <b><?php echo $team1; ?></b> 
        <img src="<?php echo $team1_logo;?>" width="20" height="19">
      </div>
      <div class="col-2">
        <span class="second-plan rounded p-1"><?php echo $match_format; ?></span>
      </div>
      <div class="col-2 text-end">
        <img src="<?php echo $team2_logo;?>" width="20" height="19">
        <b><?php echo $team2; ?></b> 
      </div>
      <div class="col-1 text-start">
        <span class="bg-warning rounded p-1"><?php echo $team2_cote; ?></span>
      </div>
      <div class="col-2"><?php echo $match_tournament; ?></div>
    </div>
</a>
