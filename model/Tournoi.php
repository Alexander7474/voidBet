<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO est la class Animal
require_once($racine_path.'class/Tournoi.php');

// pour pouvoir créer la connexion à la BD
require_once('GestionBD.php');
use bd\GestionBD;

// classe Joueur comme définit sur le diagramme de classe
class Tournoi
{
	public function listeTournois()
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
	    //Prépartion de la requête
		$sql = 'SELECT * from tournois ORDER BY date_debut;';
		$stat = $BD->pdo->prepare($sql);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Tournoi');
		$stat->execute();
		$tournois = $stat->fetchAll();
		$BD->deconnexion();
		
		return $tournois;
	}
		
	public function getTournoi($id)
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
		$sql = 'SELECT * from tournois where id_tournoi=:id_tournoi;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_tournoi', $id);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Tournoi');
		$stat->execute();
		$tournoi = $stat->fetch();
		$BD->deconnexion();
		
		if(!$tournoi)
        {
			return null;
		}
		
		return $tournoi;
    }

    public function getTournoiId($nom)
	{
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'SELECT id_tournoi from tournois where nom_tournoi=:nom_tournoi;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('nom_tournoi', $nom);
		$stat->execute();
	  	$id = $stat->fetch(PDO::FETCH_ASSOC);
		$BD->deconnexion();

		if(!$id)
        {
			return -1;
		}
		
		return $id["id_tournoi"];
    }
		
	public function updateTournoi($tournoi)
	{
	    // Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'UPDATE tournois SET nom_tournoi=:nom_tournoi, date_debut=:date_debut, cash_prize=:cash_prize WHERE id_tournoi=:id_tournoi';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_tournoi', $tournoi->id_tournoi);
		$stat->bindParam('nom_tournoi', $tournoi->nom_tournoi);
		$stat->bindParam('date_debut', $tournoi->date_debut);
		$stat->bindParam('cash_prize', $tournoi->cash_prize);
		$stat->execute();
		$BD->deconnexion();
	}
		
	public function saveTournoi($tournoi){
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'INSERT INTO tournois(nom_tournoi, date_debut, cash_prize) VALUES (:nom_tournoi, :date_debut, :cash_prize);';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('nom_tournoi', $tournoi->nom_tournoi);
		$stat->bindParam('date_debut', $tournoi->date_debut);
		$stat->bindParam('cash_prize', $tournoi->cash_prize);
		$stat->execute();
		$BD->deconnexion();
  }

  public function getIdEquipesTournoi($id){
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
		$sql = 'SELECT * from composition_tournoi where id_tournoi=:id_tournoi;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_tournoi', $id);
    $stat->execute();

    $ids = array_column($stat->fetchAll(PDO::FETCH_ASSOC), 'id_equipe');

		$BD->deconnexion();

    return $ids;
  }

}

?>
