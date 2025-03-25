<?php

	namespace api;
	include('config.php');
	
	class GestionAPI{
		public function getTournois(){
      $response = file_get_contents('https://api.pandascore.co/csgo/matches?tournament_id=15762&token='.API_KEY);
      $response = json_decode($response);
      for($i = 0; $i < sizeof($response); $i++){
        echo $response[$i]->tournament->slug."\n";
      }
    }
  }

  $test = new GestionAPI();
  $test->getTournois();
?>
