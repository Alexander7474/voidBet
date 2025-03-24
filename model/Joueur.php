<?php
	// Namespace des classes de la base de donnée
	namespace bd;
	
	// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
	use \PDO;

	// Pour que PDO est la class Joueur
	require('../class/Joueur.php');
	
	// pour pouvoir créer la connexion à la BD
	require('GestionBD.php');
	use bd\GestionBD;

	// classe Joueur comme définit sur le diagramme de classe
	class Joueur{

		public function listeJoueurs(){
			
			// Connexion àla bd
			$BD = new GestionBD();
			$BD->connexion();
			
			//Prépartion de la requête
			$sql = 'SELECT * from joueurs;';
			$stat = $BD->pdo->prepare($sql);
			$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Joueur');
			$stat->execute();
			$joueurs = $stat->fetchAll();
			$BD->deconnexion();
			
			return $joueurs;
		}
		
		public function getJoueur($id){
			// Connexion àla bd
			$BD = new GestionBD();
			$BD->connexion();
			
			$sql = 'SELECT * from joueurs where id_joueur=:id_joueur;';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('id_joueur', $id);
			$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Joueur');
			$stat->execute();
			$joueur = $stat->fetch();
			$BD->deconnexion();
			
			if(!$joueur){
				return null;
			}
			
			return $joueur;
    }

    public function getJoueurId($pseudo){
			// Connexion àla bd
			$BD = new GestionBD();
			$BD->connexion();
			
			$sql = 'SELECT id_joueur from joueurs where pseudo=:pseudo;';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('pseudo', $pseudo);
			$stat->execute();
		  $id = $stat->fetch(PDO::FETCH_ASSOC);
			$BD->deconnexion();
			
			if(!$id){
				return -1;
			}
			
			return $id["id_joueur"];
    }
		
		public function updateJoueur($joueur){
			// Connexion àla bd
			$BD = new GestionBD();
			$BD->connexion();
			
			$sql = 'UPDATE joueurs SET pseudo=:pseudo, nationalite=:nationalite, is_coach=:is_coach  WHERE id_joueur=:id_joueur';
			$stat = $BD->pdo->prepare($sql);
      $stat->bindParam('id_joueur', $joueur->id_joueur);
      $stat->bindParam('pseudo', $joueur->pseudo);
      $stat->bindParam('nationalite', $joueur->nationalite);
      $stat->bindParam('is_coach', $joueur->is_coach, PDO::PARAM_BOOL);
			$stat->execute();
			$BD->deconnexion();
		}
		
		public function saveJoueur($joueur){
			// Connexion àla bd
			$BD = new GestionBD();
			$BD->connexion();
			
			$sql = 'INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES (:pseudo, :nationalite, :is_coach);';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('pseudo', $joueur->pseudo);
      $stat->bindParam('nationalite', $joueur->nationalite);
      $stat->bindParam('is_coach', $joueur->is_coach, PDO::PARAM_BOOL);
			$stat->execute();
			$BD->deconnexion();
		}
		
  }

?>

