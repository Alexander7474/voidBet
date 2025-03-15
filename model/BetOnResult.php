<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO est la class Animal
require('../class/BetOnResult.php');

use bd\GestionBD;

// classe Animal comme définit sur le diagramme de classe
class BetOnResult
{
	public function listeBetOnResult()
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
	    //Prépartion de la requête
		//$sql = 'SELECT * from site."Animal";';
		$sql = 'SELECT * from bet_on_result;';
		$stat = $BD->pdo->prepare($sql);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\BetOnResult');
		$stat->execute();
		$bet_on_result = $stat->fetchAll();
		$BD->deconnexion();
		
		return $bet_on_result;
	}
		
	public function getBetOnResult($id)
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
		$sql = 'SELECT * from bet_on_result where id_paris=:id_paris;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_paris', $id);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\BetOnResult');
		$stat->execute();
		$bet_on_result = $stat->fetch();
		$BD->deconnexion();
		
		if(!$bet_on_result)
        {
			return null;
		}
		
		return $bet_on_result;
    }

    public function getBetOnResultId($result, $id_equipe)
	{
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'SELECT id_paris from bet_on_result where result=:result and id_equipe=:id_equipe;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('result', $result);
        $stat->bindParam('id_equipe', $id_equipe);
		$stat->execute();
	  	$id = $stat->fetch(PDO::FETCH_ASSOC);
		$BD->deconnexion();

		if(!$id)
        {
			return -1;
		}
		
		return $id["id_paris"];
    }
		
	public function updateBetOnResult($bet_on_result)
	{
	    // Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'UPDATE bet_on_result SET result=:result, id_equipe=:id_equipe WHERE id_paris=:id_paris';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_paris', $bet_on_result->id_paris);
		$stat->bindParam('result', $bet_on_result->result);
		$stat->bindParam('id_equipe', $bet_on_result->id_equipe);
		$stat->execute();
		$BD->deconnexion();
	}
		
	public function saveBetOnResult($bet_on_result){
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'INSERT INTO bet_on_result(id_paris, result, id_equipe) VALUES (:id_paris, :result, :id_equipe);';
		$stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_paris', $bet_on_result->id_paris);
		$stat->bindParam('result', $bet_on_result->result);
		$stat->bindParam('id_equipe', $bet_on_result->id_equipe);
		$stat->execute();
		$BD->deconnexion();
	}
}
?>