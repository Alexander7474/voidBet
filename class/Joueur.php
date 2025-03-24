<?php
namespace classe;

  require("Personne.php");

	class Joueur extends Personne{
    public $nationalite;
    public $is_coach;
    public $id_joueur;
		
		public function __construct($id_joueur=-1, $pseudo='default_pseudo', $age=0, $nationalite='undefined', $is_coach=false){
      $this->id_joueur = $id_joueur;
			$this->pseudo = $pseudo;
      $this->age = $age;
      $this->nationalite = $nationalite;
      $this->is_coach = $is_coach;
    }

    public function showInfo(){
      echo "\npseudo: ".$this->pseudo;
      echo "\nage: ".$this->age;
      echo "\nid_joueur: ".$this->id_joueur;
      echo "\nnationalite: ".$this->nationalite;
      echo "\nis_coach: ".$$this->is_coach;
    }
		
  }
?>
