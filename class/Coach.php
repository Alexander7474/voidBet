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

    public function __toString(){
      $str = $str .  "\npseudo: ".$this->pseudo;
      $str = $str .  "\npassword: ".$this->password;
      $str = $str .  "\nemail: ".$this->email;
      $str = $str .  "\nage: ".$this->age;
      $str = $str .  "\nvoid_coin: ".$this->void_coin;
      $str = $str .  "\nid_user: ".$this->id_user;
      return $str;
    }
		
  }
?>
