<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO est la class Animal
require_once($racine_path.'class/Match.php');

// pour pouvoir créer la connexion à la BD
require_once('GestionBD.php');
use bd\GestionBD;

// classe Animal comme définit sur le diagramme de classe
class Matchs
{
	public function listeMatchs()
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
	    //Prépartion de la requête
		//$sql = 'SELECT * from site."Animal";';
		$sql = 'SELECT * from matchs ORDER BY date_match;';
		$stat = $BD->pdo->prepare($sql);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Matchs');
		$stat->execute();
		$matchs = $stat->fetchAll();
		$BD->deconnexion();
		
		return $matchs;
	}
		
	public function getMatch($id)
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
		$sql = 'SELECT * from matchs where id_match=:id_match;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_match', $id);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Matchs');
		$stat->execute();
		$match = $stat->fetch();
		$BD->deconnexion();
		
		if(!$match)
        {
			return null;
		}
		
		return $match;
    }

    public function getMatchId($date, $heure, $id_tournoi)
	{
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'SELECT id_match from matchs where date_match=:date_match and heure_match=:heure_match and id_tournoi=:id_tournoi;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('date_match', $date_match);
        $stat->bindParam('heure_match', $heure_match);
        $stat->bindParam('id_tournoi', $id_tournoi);
		$stat->execute();
	  	$id = $stat->fetch(PDO::FETCH_ASSOC);
		$BD->deconnexion();

		if(!$id)
        {
			return -1;
		}
		
		return $id["id_match"];
    }
		
	public function updateMatch($match)
	{
	    // Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'UPDATE matchs SET date_match=:date_match, heure_match=:heure_match, format=:format, id_equipe1=:id_equipe1, id_equipe2=:id_equipe2, id_tournoi=:id_tournoi, score1=:score1, cote1=:cote1, score2=:score, cote2=:cote2 WHERE id_match=:id_match';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_match', $match->id_match);
		$stat->bindParam('date_match', $match->date_match);
		$stat->bindParam('heure_match', $match->heure_match);
    $stat->bindParam('format', $match->format);
    $stat->bindParam('id_equipe1', $match->id_equipe1);
		$stat->bindParam('id_equipe2', $match->id_equipe2);
		$stat->bindParam('id_tournoi', $match->id_tournoi);
    $stat->bindParam('score1', $match->score1);
    $stat->bindParam('cote1', $match->cote1);
		$stat->bindParam('score2', $match->score2);
    $stat->bindParam('cote2', $match->cote2);
		$stat->execute();
		$BD->deconnexion();
	}
		
	public function saveMatch($match)
	{
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'INSERT INTO matchs(date_match, heure_match, format, id_equipe1, id_equipe2, id_tournoi, score1, cote1, score2, cote2) VALUES (:date_match, :heure_match, :format, :id_equipe1, :id_equipe2, :id_tournoi, :score1,:cote1, :score2, :cote2);';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('date_match', $match->date_match);
		$stat->bindParam('heure_match', $match->heure_match);
    $stat->bindParam('format', $match->format);
    $stat->bindParam('id_equipe1', $match->id_equipe1);
		$stat->bindParam('id_equipe2', $match->id_equipe2);
		$stat->bindParam('id_tournoi', $match->id_tournoi);
    $stat->bindParam('score1', $match->score1);
    $stat->bindParam('cote1', $match->cote1);
		$stat->bindParam('score2', $match->score2);
    $stat->bindParam('cote2', $match->cote2);
		$stat->execute();
		$BD->deconnexion();
	}
}
?>
