<?php

	namespace api;
	include('config.php');
	
	/**
	 * Classe GestionAPI qui interagit avec l'API de Pandascore.
	 *
	 * Cette classe fournit une méthode pour récupérer les tournois à partir de l'API de Pandascore
	 * pour un jeu spécifique, ici CS:GO. Elle extrait les données relatives aux tournois et les affiche.
	 *
	 * @package api
	 */
	class GestionAPI {

		/**
		 * Récupère et affiche les tournois à partir de l'API Pandascore.
		 *
		 * Cette méthode envoie une requête HTTP à l'API Pandascore pour obtenir les informations
		 * sur les matchs d'un tournoi spécifique. Les informations des tournois sont ensuite décodées
		 * et affichées dans la console (slug du tournoi).
		 *
		 * @return void
		 */
		public function getTournois() {
			// Envoi de la requête GET à l'API Pandascore
			$response = file_get_contents('https://api.pandascore.co/csgo/matches?tournament_id=15762&token='.API_KEY);
			$response = json_decode($response);

			// Affichage du slug des tournois
			for($i = 0; $i < sizeof($response); $i++) {
				echo $response[$i]->tournament->slug."\n";
			}
		}
	}

	// Création de l'objet GestionAPI et récupération des tournois
	$test = new GestionAPI();
	$test->getTournois();

?>