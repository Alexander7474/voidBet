<?php
namespace classe;

  require("Personne.php");

	class User extends Personne{
    public $id;
		public $email;
    public $password;
    public $voidCoin;
		
		public function __construct($id=-1, $username='', $email='', $password='', $voidCoin=0){
      $this->id = $id;
			$this->pseudo = $username;
			$this->email = $email;
      $this->password = $password;
      $this->voidCoin = $voidCoin;
    }

    public function showInfo(){
      echo "username: ".$this->pseudo;
      echo "password: ".$this->password;
      echo "email: ".$this->email;
      echo "voidCoin: ".$this->voidCoin;
    }
		
  }
?>
