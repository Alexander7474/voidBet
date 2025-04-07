<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO ait la classe Animal
require_once($racine_path.'class/Tournoi.php');

// pour pouvoir créer la connexion à la BD
require_once('GestionBD.php');
use bd\GestionBD;

/**
 * Classe Tournoi qui représente les tournois dans le système.
 *
 * Cette classe fournit des méthodes pour gérer les tournois dans la base de données,
 * y compris la récupération, l'ajout, la mise à jour et la suppression des tournois.
 *
 * @package bd
 */
class Tournoi
{
    /**
     * Récupère la liste des tournois dans la base de données.
     *
     * Cette méthode se connecte à la base de données, exécute une requête pour récupérer
     * tous les tournois, puis retourne le résultat sous forme de tableau.
     *
     * @return array Liste des tournois sous forme de tableau d'objets Tournoi.
     */
    public function listeTournois()
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        // Préparation de la requête
        $sql = 'SELECT * from tournois ORDER BY date_debut;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Tournoi');
        $stat->execute();
        $tournois = $stat->fetchAll();
        $BD->deconnexion();
        
        return $tournois;
    }

    /**
     * Supprime un tournoi de la base de données.
     *
     * Cette méthode supprime un tournoi existant de la base de données en fonction de son ID.
     *
     * @param int $id L'ID du tournoi à supprimer.
     */
    public function deleteTournoi($id)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        $sql = 'DELETE from tournois where id_tournoi=:id_tournoi;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_tournoi', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Tournoi');
        $stat->execute();
        $BD->deconnexion();
    }
    
    /**
     * Met à jour un tournoi existant dans la base de données.
     *
     * Cette méthode permet de mettre à jour les informations d'un tournoi spécifique dans
     * la base de données en fonction de l'objet Tournoi passé en paramètre.
     *
     * @param Tournoi $tournoi L'objet Tournoi à mettre à jour dans la base de données.
     */
    public function updateTournoi($tournoi)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        $sql = 'UPDATE tournois SET nom_tournoi=:nom_tournoi, date_debut=:date_debut, cash_prize=:cash_prize WHERE id_tournoi=:id_tournoi';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_tournoi', $tournoi->id_tournoi);
        $stat->bindParam('nom_tournoi', $tournoi->nom_tournoi);
        $stat->bindParam('date_debut', $tournoi->date_debut);
        $stat->bindParam('cash_prize', $tournoi->cash_prize);
        $stat->bindParam('participants', $tournoi->cash_prize);
        $stat->execute();
        $BD->deconnexion();
    }
    
    /**
     * Enregistre un nouveau tournoi dans la base de données.
     *
     * Cette méthode permet d'ajouter un nouveau tournoi à la base de données en utilisant
     * les informations contenues dans l'objet Tournoi passé en paramètre.
     *
     * @param Tournoi $tournoi L'objet Tournoi à enregistrer dans la base de données.
     */
    public function saveTournoi($tournoi)
    {
        // Connexion à la BD
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
     * Récupère les ID des équipes participantes à un tournoi.
     *
     * Cette méthode retourne un tableau d'ID des équipes participantes à un tournoi donné.
     * Elle effectue une jointure avec la table `composition_tournoi` pour récupérer les IDs.
     *
     * @param int $id L'ID du tournoi pour lequel récupérer les équipes participantes.
     * @return array Un tableau contenant les ID des équipes.
     */
    public function getIdEquipesTournoi($id)
    {
        // Connexion à la BD
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