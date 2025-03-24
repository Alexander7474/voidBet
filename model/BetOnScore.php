<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO est la class Animal
require('../class/BetOnScore.php');

use bd\GestionBD;

// classe Animal comme définit sur le diagramme de classe
class BetOnScore
{
	public function listeBetOnScore()
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
	    //Prépartion de la requête
		//$sql = 'SELECT * from site."Animal";';
		$sql = 'SELECT * from bet_on_score;';
		$stat = $BD->pdo->prepare($sql);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\BetOnScore');
		$stat->execute();
		$bet_on_score = $stat->fetchAll();
		$BD->deconnexion();
		
		return $bet_on_score;
	}
		
	public function getBetOnScore($id)
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
		$sql = 'SELECT * from bet_on_score where id_paris=:id_paris;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_paris', $id);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\BetOnScore');
		$stat->execute();
		$bet_on_score = $stat->fetch();
		$BD->deconnexion();
		
		if(!$bet_on_score)
        {
			return null;
		}
		
		return $bet_on_score;
    }

    public function getBetOnScoreId($score1, $score2)
	{
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'SELECT id_paris from bet_on_score where score1=:score1 and score2=:score2;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('score1', $score1);
        $stat->bindParam('score2', $score2);
		$stat->execute();
	  	$id = $stat->fetch(PDO::FETCH_ASSOC);
		$BD->deconnexion();

		if(!$id)
        {
			return -1;
		}
		
		return $id["id_paris"];
    }
		
	public function updateBetOnScore($bet)
	{
	    // Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'UPDATE bet_on_score SET score1=:score1, score2=:score2 WHERE id_paris=:id_paris';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_paris', $bet->id_paris);
		$stat->bindParam('score1', $bet->score1);
		$stat->bindParam('score2', $bet->score2);
		$stat->execute();
		$BD->deconnexion();
	}
		
	public function saveBetOnScore($bet){
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'INSERT INTO bet_on_score(id_paris, score1, score2) VALUES (:id_paris, :score1, :score2);';
		$stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_paris', $bet->id_paris);
		$stat->bindParam('score1', $bet->score1);
		$stat->bindParam('score2', $bet->score2);
		$stat->execute();
		$BD->deconnexion();
	}
}
?>