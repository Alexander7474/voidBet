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
		
		public function getAnimal($id){
			// Connexion àla bd
			$BD = new GestionBD();
			$BD->connexion();
			
			//$sql = 'SELECT * from site."Animal" where id=:id;';
			$sql = 'SELECT * from animal where id=:id;';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('id', $id);
			$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\User');
			$stat->execute();
			$animal = $stat->fetch();
			$BD->deconnexion();
			
			// si l'animal n'existe pas en base de donnée je renvoie une page 404, 
			// le mieux serait d'avoir une page propre à votre site, du style Oups la page n'existe plus...
			// Et une redirection vers l'accueil
			if(!$animal){
				header('HTTP/1.0 404 Not Found');
				exit;
			}
			
			return $animal;
		}
		
		public function updateAnimal($animal){
			// a faire
			
		}
		
		public function saveAnimal($animal){
			// a faire
			
		}
		
  }

  $test = new User();
  $users = $test->listeUsers();
  print_r($users);
  $users[0]->showInfo();

?>

