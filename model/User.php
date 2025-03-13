<?php
	// Namespace des classes de la base de donnée
	namespace bd;
	
	// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
	use \PDO;

	// Pour que PDO est la class Animal
	require('../class/User.php');
	
	// pour pouvoir créer la connexion à la BD
	require('GestionBD.php');
	use bd\GestionBD;

	// classe Animal comme définit sur le diagramme de classe
	class User{

		public function listeUsers(){
			
			// Connexion àla bd
			$BD = new GestionBD();
			$BD->connexion();
			
			//Prépartion de la requête
			//$sql = 'SELECT * from site."Animal";';
			$sql = 'SELECT * from users;';
			$stat = $BD->pdo->prepare($sql);
			$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\User');
			$stat->execute();
			$users = $stat->fetchAll();
			$BD->deconnexion();
			
			return $users;
		}
		
		public function getUser($id){
			// Connexion àla bd
			$BD = new GestionBD();
			$BD->connexion();
			
			$sql = 'SELECT * from users where id_user=:id_user;';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('id_user', $id);
			$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\User');
			$stat->execute();
			$user = $stat->fetch();
			$BD->deconnexion();
			
			if(!$user){
				return null;
			}
			
			return $user;
    }

    public function getUserId($pseudo){
			// Connexion àla bd
			$BD = new GestionBD();
			$BD->connexion();
			
			$sql = 'SELECT id_user from users where pseudo=:pseudo;';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('pseudo', $pseudo);
			$stat->execute();
		  $id = $stat->fetch(PDO::FETCH_ASSOC);
			$BD->deconnexion();
			
			if(!$id){
				return -1;
			}
			
			return $id["id_user"];
    }
		
		public function updateAnimal($animal){
			// a faire
			
		}
		
		public function saveAnimal($animal){
			// a faire
			
		}
		
  }

  $test = new User();
  $user = $test->getUser($test->getUserId("jhon84"));
  print_r($user);

?>

