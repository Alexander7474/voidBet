<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO est la class Animal
require_once($racine_path.'class/Equipe.php');

// pour pouvoir créer la connexion à la BD
require_once('GestionBD.php');
use bd\GestionBD;

// classe Equipe comme définit sur le diagramme de classe
class Equipe
{
	public function listeEquipes()
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
	    //Prépartion de la requête
		$sql = 'SELECT * from equipes;';
		$stat = $BD->pdo->prepare($sql);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Equipe');
		$stat->execute();
		$equipes = $stat->fetchAll();
		$BD->deconnexion();
		
		return $equipes;
	}
		
	public function getEquipe($id)
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
		$sql = 'SELECT * from equipes where id_equipe=:id_equipe;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_equipe', $id);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Equipe');
		$stat->execute();
		$equipe = $stat->fetch();
		$BD->deconnexion();
		
		if(!$equipe)
        {
			return null;
		}
		
		return $equipe;
    }

    public function getEquipeId($nom)
	{
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'SELECT id_equipe from equipes where nom_equipe=:nom_equipe;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('nom_equipe', $nom);
		$stat->execute();
	  $id = $stat->fetch(PDO::FETCH_ASSOC);
		$BD->deconnexion();

		if(!$id)
        {
			return -1;
		}
		
		return $id["id_equipe"];
    }
		
	public function updateEquipe($equipe)
	{
	    // Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'UPDATE equipes SET nom_equipe=:nom_equipe, id_coach=:id_coach WHERE id_equipe=:id_equipe';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_equipe', $equipe->id_equipe);
		$stat->bindParam('nom_equipe', $equipe->nom_equipe);
		$stat->bindParam('id_coach', $equipe->id_coach);
		$stat->execute();
		$BD->deconnexion();
	}
		
	public function saveEquipe($equipe)
	{
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'INSERT INTO equipes(nom_equipe, id_coach) VALUES (:nom_equipe, :id_coach);';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('nom_equipe', $equipe->nom_equipe);
		$stat->bindParam('id_coach', $equipe->id_coach);
		$stat->execute();
		$BD->deconnexion();
  }

  public function getIdJoueursEquipe($id){
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
		$sql = 'SELECT * from composition_equipe where id_equipe=:id_equipe;';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_equipe', $id);
    $stat->execute();

    $ids = array_column($stat->fetchAll(PDO::FETCH_ASSOC), 'id_joueur');

		$BD->deconnexion();

    return $ids;
  }

  }

?>
