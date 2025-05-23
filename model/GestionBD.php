<?php
	// Namespace des classes de la base de donnée
	namespace bd;
	include('config.php');
	
	// classe GestionBD comme demandée
	// Attention cette classe est un exemple, elle peut être implémentée de façon différente
	class GestionBD{
		public $pdo;

    /**
     * Ouvre une connexion à la base de données
     */
		public function connexion(){
			// recuperer le fichier conf et faire une connexion
			try{
				$this->pdo = new \PDO("pgsql:host=".SERVERNAME.";port=".PORT.";dbname=".DBNAME, USERNAME, PWD);
				}catch(PDOException $e){
				echo 'Exception PDO : '.$e->getMessage(); 
			}
		}

    /**
     * Ferme la connexion à la base de données
     */
		public function deconnexion(){
			$pdo = null;
		}
			
  }

?>
