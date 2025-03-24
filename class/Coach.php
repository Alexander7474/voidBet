<?php
namespace classe;

  require("Personne.php");

	class Coach extends Personne{
    public 
    public $id_user;
		
		public function __construct($id_user=-1, $pseudo='default_pseudo', $email='email@email.com', $password='password', $void_coin=0, $age=0){
      $this->id_user = $id_user;
			$this->pseudo = $pseudo;
			$this->email = $email;
      $this->password = $password;
      $this->void_coin = $void_coin;
      $this->age = $age;
    }

    public function showInfo(){
      echo "\npseudo: ".$this->pseudo;
      echo "\npassword: ".$this->password;
      echo "\nemail: ".$this->email;
      echo "\nage: ".$this->age;
      echo "\nvoid_coin: ".$this->void_coin;
      echo "\nid_user: ".$this->id_user;
    }
		
  }
?>
