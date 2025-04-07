<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO ait la classe Animal
require_once($racine_path.'class/Bet.php');

// pour pouvoir créer la connexion à la BD
require_once('GestionBD.php');
use bd\GestionBD;

/**
 * Classe Bet qui représente les paris dans le système.
 *
 * Cette classe fournit des méthodes pour gérer les paris dans la base de données,
 * y compris la récupération, l'ajout, la mise à jour et la suppression des paris.
 *
 * @package bd
 */
class Bet
{
    /**
     * Récupère la liste des paris dans la base de données.
     *
     * Cette méthode se connecte à la base de données, exécute une requête pour récupérer
     * tous les paris, puis retourne le résultat sous forme de tableau.
     *
     * @return array Liste des paris sous forme de tableau d'objets Bet.
     */
    public function listeBets()
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        // Préparation de la requête
        $sql = 'SELECT * from bets;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Bet');
        $stat->execute();
        $bets = $stat->fetchAll();
        $BD->deconnexion();
        
        return $bets;
    }
    
    /**
     * Met à jour un pari existant dans la base de données.
     *
     * Cette méthode permet de mettre à jour les informations d'un pari spécifique dans
     * la base de données en fonction de l'objet Bet passé en paramètre.
     *
     * @param Bet $bet L'objet Bet à mettre à jour dans la base de données.
     */
    public function updateBet($bet)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        $sql = 'UPDATE bets SET date_paris=:date_paris,  cote=:cote WHERE id_paris=:id_paris';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_paris', $bet->id_paris);
        $stat->bindParam('date_paris', $bet->date_paris);
        $stat->bindParam('cote', $bet->cote);
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Enregistre un nouveau pari dans la base de données.
     *
     * Cette méthode permet d'ajouter un nouveau pari à la base de données en utilisant
     * les informations contenues dans l'objet Bet passé en paramètre.
     *
     * @param Bet $bet L'objet Bet à enregistrer dans la base de données.
     * @return int L'ID du pari nouvellement créé.
     */
    public function saveBet($bet)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        $sql = 'INSERT INTO bets(id_match, date_paris, cote) VALUES (:id_match, :date_paris, :cote);';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_match', $bet->id_match);
        $stat->bindParam('date_paris', $bet->date_paris);
        $stat->bindParam('cote', $bet->cote);
        $stat->execute();

        $id = $BD->pdo->lastInsertId();

        $BD->deconnexion();

        return $id;
    }

    /**
     * Supprime un pari de la base de données.
     *
     * Cette méthode supprime un pari existant de la base de données en fonction de son ID.
     *
     * @param int $id L'ID du pari à supprimer.
     */
    public function deleteBet($id)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        $sql = 'DELETE from bets where id_paris=:id_paris;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_paris', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Bet');
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Récupère le nom du tournoi associé à un pari.
     *
     * Cette méthode retourne le nom du tournoi auquel le pari est associé en effectuant
     * une jointure avec les tables des matchs et des tournois.
     *
     * @param int $id L'ID du pari pour lequel récupérer le nom du tournoi.
     * @return string Le nom du tournoi.
     */
    public function getNameTournament($id)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT t.nom_tournoi FROM bets b JOIN matchs m ON b.id_match = m.id_match JOIN tournois t ON m.id_tournoi = t.id_tournoi WHERE b.id_paris = :id_paris;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':id_paris', $id);
        $stat->execute();
        $nom = $stat->fetchColumn();
        $BD->deconnexion();

        return $nom;
    }

    /**
     * Récupère le format du tournoi associé à un pari.
     *
     * Cette méthode retourne le format du tournoi auquel le pari est associé en effectuant
     * une jointure avec la table des matchs.
     *
     * @param int $id L'ID du pari pour lequel récupérer le format du tournoi.
     * @return string Le format du tournoi.
     */
    public function getFormatTournament($id)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT m.format FROM bets b JOIN matchs m ON b.id_match = m.id_match WHERE b.id_paris = :id_paris;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':id_paris', $id);
        $stat->execute();
        $format = $stat->fetchColumn();
        $BD->deconnexion();

        return $format;
    }

    /**
     * Récupère le nom de la première équipe associée à un pari.
     *
     * Cette méthode retourne le nom de la première équipe associée au match du pari.
     *
     * @param int $id L'ID du pari pour lequel récupérer le nom de la première équipe.
     * @return string Le nom de la première équipe.
     */
    public function getEquipe1($id)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT e.nom_equipe FROM bets b JOIN matchs m ON b.id_match = m.id_match JOIN equipes e ON m.id_equipe1 = e.id_equipe WHERE b.id_paris = :id_paris;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':id_paris', $id);
        $stat->execute();
        $equipe = $stat->fetchColumn();
        $BD->deconnexion();

        return $equipe;
    }

    /**
     * Récupère le nom de la deuxième équipe associée à un pari.
     *
     * Cette méthode retourne le nom de la deuxième équipe associée au match du pari.
     *
     * @param int $id L'ID du pari pour lequel récupérer le nom de la deuxième équipe.
     * @return string Le nom de la deuxième équipe.
     */
    public function getEquipe2($id)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT e.nom_equipe FROM bets b JOIN matchs m ON b.id_match = m.id_match JOIN equipes e ON m.id_equipe2 = e.id_equipe WHERE b.id_paris = :id_paris;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':id_paris', $id);
        $stat->execute();
        $equipe = $stat->fetchColumn();
        $BD->deconnexion();

        return $equipe;
    }
}
?>