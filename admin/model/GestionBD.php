<?php
	// Namespace des classes de la base de donnée
	namespace bd;
	include('config.php');
	
	/**
	 * Classe GestionBD qui gère la connexion à la base de données.
	 *
	 * Cette classe fournit des méthodes pour établir et fermer une connexion à la base de
	 * données PostgreSQL en utilisant PDO. Elle est utilisée pour interagir avec la base
	 * de données dans d'autres classes qui ont besoin d'accéder aux données.
	 *
	 * @package bd
	 */
	class GestionBD {
		/** @var PDO $pdo Instance de la classe PDO pour la connexion à la base de données. */
		public $pdo;
		
		/**
		 * Établit une connexion à la base de données en utilisant les informations
		 * définies dans le fichier de configuration `config.php`.
		 *
		 * Cette méthode crée une instance de PDO pour se connecter à une base de données
		 * PostgreSQL. Si la connexion échoue, elle génère une exception.
		 *
		 * @return void
		 * @throws PDOException Si la connexion échoue, une exception PDO est levée.
		 */
		public function connexion() {
			// Récupérer le fichier conf et faire une connexion
			try {
				$this->pdo = new \PDO("pgsql:host=".SERVERNAME.";port=".PORT.";dbname=".DBNAME, USERNAME, PWD);
			} catch(PDOException $e) {
				echo 'Exception PDO : '.$e->getMessage(); 
			}
		}
		
		/**
		 * Ferme la connexion à la base de données.
		 *
		 * Cette méthode met l'instance de PDO à null pour fermer proprement la connexion.
		 *
		 * @return void
		 */
		public function deconnexion() {
			$this->pdo = null;
		}
	}

?>