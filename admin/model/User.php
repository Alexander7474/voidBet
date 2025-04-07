<?php
	// Namespace des classes de la base de donnée
	namespace bd;
	
	// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
	use \PDO;

	$racine_path = '../';
	// Pour que PDO ait la classe User
	require($racine_path.'class/User.php');
	
	// pour pouvoir créer la connexion à la BD
	require('GestionBD.php');
	use bd\GestionBD;

	/**
	 * Classe User qui représente les utilisateurs du système.
	 *
	 * Cette classe fournit des méthodes pour gérer les utilisateurs dans la base de données,
	 * y compris la récupération, l'ajout, la mise à jour et la suppression des utilisateurs.
	 *
	 * @package bd
	 */
	class User {

		/**
		 * Récupère la liste des utilisateurs dans la base de données.
		 *
		 * Cette méthode se connecte à la base de données, exécute une requête pour récupérer
		 * tous les utilisateurs, puis retourne le résultat sous forme de tableau.
		 *
		 * @return array Liste des utilisateurs sous forme de tableau d'objets User.
		 */
		public function listeUsers() {
			
			// Connexion à la BD
			$BD = new GestionBD();
			$BD->connexion();
			
			// Préparation de la requête
			$sql = 'SELECT * from users;';
			$stat = $BD->pdo->prepare($sql);
			$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\User');
			$stat->execute();
			$users = $stat->fetchAll();
			$BD->deconnexion();
			
			return $users;
		}

		/**
		 * Supprime un utilisateur de la base de données.
		 *
		 * Cette méthode supprime un utilisateur spécifié par son ID de la base de données.
		 *
		 * @param int $id L'ID de l'utilisateur à supprimer.
		 */
		public function deleteUser($id) {
			// Connexion à la BD
			$BD = new GestionBD();
			$BD->connexion();
			
			$sql = 'DELETE from users where id_user=:id_user;';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('id_user', $id);
			$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\User');
			$stat->execute();
			$BD->deconnexion();
    	}

		/**
		 * Met à jour un utilisateur dans la base de données.
		 *
		 * Cette méthode met à jour les informations d'un utilisateur spécifique dans
		 * la base de données en fonction de l'objet User passé en paramètre.
		 *
		 * @param User $user L'objet User à mettre à jour dans la base de données.
		 */
		public function updateUser($user) {
			// Connexion à la BD
			$BD = new GestionBD();
			$BD->connexion();
			
			$sql = 'UPDATE users SET pseudo=:pseudo, password=:password, email=:email, void_coin=:void_coin WHERE id_user=:id_user';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('id_user', $user->id_user);
			$stat->bindParam('pseudo', $user->pseudo);
			$stat->bindParam('password', $user->password);
			$stat->bindParam('email', $user->email);
			$stat->bindParam('void_coin', $user->void_coin);
			$stat->execute();
			$BD->deconnexion();
		}

		/**
		 * Enregistre un nouvel utilisateur dans la base de données.
		 *
		 * Cette méthode permet d'ajouter un nouvel utilisateur à la base de données en
		 * utilisant les informations contenues dans l'objet User passé en paramètre.
		 *
		 * @param User $user L'objet User à enregistrer dans la base de données.
		 */
		public function saveUser($user) {
			// Connexion à la BD
			$BD = new GestionBD();
			$BD->connexion();
			
			$sql = 'INSERT INTO users(pseudo, password, email, void_coin) VALUES (:pseudo, :password, :email, :void_coin);';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('pseudo', $user->pseudo);
			$stat->bindParam('password', $user->password);
			$stat->bindParam('email', $user->email);
			$stat->bindParam('void_coin', $user->void_coin);
			$stat->execute();
			$BD->deconnexion();
		}
		
		/**
		 * Récupère un utilisateur à partir de son id
		 *
		 * @param int $id Identifiant de l'utilisateur
		 *
		 * @return mixed Un objet User ou null si l'utilisateur n'existe pas
		 */
		public function getUser($id)
		{
			// Connexion à la base de données
			$BD = new GestionBD();
			$BD->connexion();

			$sql = 'SELECT * FROM users WHERE id_user = :id_user;';
			$stat = $BD->pdo->prepare($sql);
			$stat->bindParam('id_user', $id);
			$stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\User');
			$stat->execute();
			$user = $stat->fetch();
			$BD->deconnexion();

			if (!$user) {
				return null;
			}

			return $user;
		}
	}
?>