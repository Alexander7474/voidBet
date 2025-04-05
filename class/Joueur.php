<?php
namespace classe;

  require_once("Personne.php");

	class Joueur extends Personne{
    public $nationalite;
    public $is_coach;
    public $id_joueur;
		
		public function __construct($id_joueur=-1, $pseudo='default_pseudo', $age=0, $nationalite='undefined',$is_coach=FALSE){
      $this->id_joueur = $id_joueur;
			$this->pseudo = $pseudo;
      $this->age = $age;
      $this->nationalite = $nationalite;
      $this->is_coach = $is_coach;
    }

    public function __toString(){
      $str = $str .  "\npseudo: ".$this->pseudo;
      $str = $str .  "\nage: ".$this->age;
      $str = $str .  "\nid_joueur: ".$this->id_joueur;
      $str = $str .  "\nnationalite: ".$this->nationalite;
      $str = $str .  "\nis_coach: ";
      $str = $str .  $this->is_coach ? 'true' : 'false';
      return $str;
    }
		
  }
?>
