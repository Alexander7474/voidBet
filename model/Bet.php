<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO est la class Animal
require_once($racine_path.'class/Bet.php');

// pour pouvoir créer la connexion à la BD
require_once('GestionBD.php');
use bd\GestionBD;

// classe Bet comme définit sur le diagramme de classe
class Bet
{
  /**
   * @brief Récupère la liste des paris dans la base de données
   * 
   * @return array $bets liste des paris 
   */
	public function listeBets()
    {
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
		
	    //Prépartion de la requête
		$sql = 'SELECT * from bets;';
		$stat = $BD->pdo->prepare($sql);
		$stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Bet');
		$stat->execute();
		$bets = $stat->fetchAll();
		$BD->deconnexion();
		
		return $bets;
	}
	
  /**
   * @brief Récupère un paris à partir de son id unique dans la base de données 
   * 
   * @param int $id id du paris 
   *
   * @return array $bets liste des paris 
   */
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

  /**
    * @brief Récupère la liste d'id des paris 
    *
    * @param int $id_match 
    * @param date $date du match
    * 
    * @return array $bets liste des paris 
    */
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
	
  /**
    * @brief Mes a jour un paris dans la base
    *
    * @param Bet $bet 
    */
	public function updateBet($bet)
	{
	    // Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'UPDATE bets SET id_match=:id_match, date_paris=:date_paris, valeur=:valeur, cote=:cote, id_user=:id_user WHERE id_paris=:id_paris';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_paris', $bet->id_paris);
		$stat->bindParam('id_match', $bet->id_match);
		$stat->bindParam('date_paris', $bet->date_paris);
		$stat->bindParam('cote', $bet->cote);
		$stat->bindParam('valeur', $bet->valeur);
        $stat->bindParam('id_user', $bet->id_user);
		$stat->execute();
		$BD->deconnexion();
	}

	public function saveBet($bet){
		// Connexion àla bd
		$BD = new GestionBD();
		$BD->connexion();
			
		$sql = 'INSERT INTO bets(id_match, date_paris, valeur, cote, id_user) VALUES (:id_match, :date_paris, :valeur, :cote, :id_user);';
		$stat = $BD->pdo->prepare($sql);
		$stat->bindParam('id_match', $bet->id_match);
		$stat->bindParam('date_paris', $bet->date_paris);
		$stat->bindParam('cote', $bet->cote);
		$stat->bindParam('valeur', $bet->valeur);
        $stat->bindParam('id_user', $bet->id_user);
    $stat->execute();

    $id = $BD->pdo->lastInsertId();

    $BD->deconnexion();

    return $id;
	}
}
?>
