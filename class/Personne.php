<?php
	namespace classe;

	class Personne{
    public $pseudo;
    public $age;
		
		public function __construct($pseudo='', $age=0){
      $this->pseudo = $pseudo;
      $this->age = $age;
		}
		
  }

?>
