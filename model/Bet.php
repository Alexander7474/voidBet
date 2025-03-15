<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO est la class Animal
require('../class/Bet.php');

// pour pouvoir créer la connexion à la BD
require('GestionBD.php');
use bd\GestionBD;

// classe Animal comme définit sur le diagramme de classe
class Bet
{
	public function listeBets()
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
	    //Prépartion de la requête
		//$sql = 'SELECT * from site."Animal";';
		$sql = 'SELECT * from bets;';
		$stat = $BD->pdo->prepare($sql);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Bet');
		$stat->execute();
		$bets = $stat->fetchAll();
		$BD->deconnexion();
		
		return $bets;
	}
		
	public function getBet($id)
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
		$sql = 'SELECT * from bets where id_paris=:id_paris;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_paris', $id);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Bet');
		$stat->execute();
		$bet = $stat->fetch();
		$BD->deconnexion();
		
		if(!$bet)
        {
			return null;
		}
		
		return $bet;
    }

    public function getBetId($id_match, $date)
	{
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'SELECT id_paris from bets where id_match=:id_match and date_paris=:date_paris;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_match', $id_match);
        $stat->bindParam('date_paris', $date);
		$stat->execute();
	  	$id = $stat->fetch(PDO::FETCH_ASSOC);
		$BD->deconnexion();

		if(!$id)
        {
			return -1;
		}
		
		return $id["id_paris"];
    }
		
	public function updateBet($bet)
	{
	    // Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'UPDATE bets SET id_match=:id_match, date_paris=:date_paris, cote=:cote, id_user=:id_user WHERE id_paris=:id_paris';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_paris', $bet->id_paris);
		$stat->bindParam('id_match', $bet->id_match);
		$stat->bindParam('date_paris', $bet->date_paris);
		$stat->bindParam('cote', $bet->cote);
        $stat->bindParam('id_user', $bet->id_user);
		$stat->execute();
		$BD->deconnexion();
	}
		
	public function saveBet($bet){
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'INSERT INTO bets(id_match, date_paris, cote, id_user) VALUES (:id_match, :date_paris, :cote, :id_user);';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_match', $bet->id_match);
		$stat->bindParam('date_paris', $bet->date_paris);
		$stat->bindParam('cote', $bet->cote);
        $stat->bindParam('id_user', $bet->id_user);
		$stat->execute();
		$BD->deconnexion();
	}
}
?>