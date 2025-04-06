<?php
// Namespace des classes de la base de données
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO ait la classe Tournoi
require_once($racine_path . 'class/Tournoi.php');

// Pour pouvoir créer la connexion à la base de données
require_once('GestionBD.php');
use bd\GestionBD;

/**
 * Classe de gestion des tournois 
 */
class Tournoi
{
    /**
     * Récupère tous les tournois triés par date 
     *
     * @return array $tournois
     */
    public function listeTournois()
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        // Préparation de la requête
        $sql = 'SELECT * FROM tournois ORDER BY date_debut;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Tournoi');
        $stat->execute();
        $tournois = $stat->fetchAll();
        $BD->deconnexion();

        return $tournois;
    }

    /**
     * Récupère un tournoi 
     * 
     * @param int $id 
     * @return Tournoi|null
     */
    public function getTournoi($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM tournois WHERE id_tournoi = :id_tournoi;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_tournoi', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Tournoi');
        $stat->execute();
        $tournoi = $stat->fetch();
        $BD->deconnexion();

        return $tournoi ?: null;
    }

    /**
     * Récupère l'id d'un tournoi
     *
     * @param string $nom 
     * @return int
     */  
    public function getTournoiId($nom)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT id_tournoi FROM tournois WHERE nom_tournoi = :nom_tournoi;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('nom_tournoi', $nom);
        $stat->execute();
        $id = $stat->fetch(PDO::FETCH_ASSOC);
        $BD->deconnexion();

        return $id ? $id["id_tournoi"] : -1;
    }

    /**
     * Met à jour un tournoi
     *
     * @param Tournoi $tournoi
     */ 
    public function updateTournoi($tournoi)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'UPDATE tournois SET nom_tournoi = :nom_tournoi, date_debut = :date_debut, cash_prize = :cash_prize WHERE id_tournoi = :id_tournoi';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_tournoi', $tournoi->id_tournoi);
        $stat->bindParam('nom_tournoi', $tournoi->nom_tournoi);
        $stat->bindParam('date_debut', $tournoi->date_debut);
        $stat->bindParam('cash_prize', $tournoi->cash_prize);
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Sauvegarde un tournoi
     *
     * @param Tournoi $tournoi
     */
    public function saveTournoi($tournoi)
    {
        // Connexion à la base de données
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

    /**
     * Récupère la liste des identifiants des équipes dans un tournoi
     *
     * @param int $id Identifiant du tournoi 
     * @return array $ids
     */ 
    public function getIdEquipesTournoi($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM composition_tournoi WHERE id_tournoi = :id_tournoi;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_tournoi', $id);
        $stat->execute();

        $ids = array_column($stat->fetchAll(PDO::FETCH_ASSOC), 'id_equipe');

        $BD->deconnexion();

        return $ids;
    }
}
?>
