<?php
// Namespace des classes de la base de données
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Inclusion de la classe BetOnScore
require_once($racine_path . 'class/BetOnScore.php');
use bd\GestionBD;

/**
 * Classe BetOnScore
 * 
 * Gère les opérations CRUD sur la table bet_on_score.
 */
class BetOnScore
{
    /**
     * Récupère la liste de tous les paris sur le score.
     *
     * @return array Liste des objets BetOnScore
     */
    public function listeBetOnScore()
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        // Préparation de la requête
        $sql = 'SELECT * FROM bet_on_score;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\BetOnScore');
        $stat->execute();
        $bet_on_score = $stat->fetchAll();
        $BD->deconnexion();

        return $bet_on_score;
    }

    /**
     * Récupère un pari à partir de son identifiant.
     *
     * @param int $id Identifiant du pari
     * @return mixed Objet BetOnScore ou null s'il n'existe pas
     */
    public function getBetOnScore($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM bet_on_score WHERE id_paris = :id_paris;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_paris', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\BetOnScore');
        $stat->execute();
        $bet_on_score = $stat->fetch();
        $BD->deconnexion();

        if (!$bet_on_score) {
            return null;
        }

        return $bet_on_score;
    }

    /**
     * Récupère l'identifiant d'un pari en fonction des scores.
     *
     * @param int $score1 Score de l'équipe 1
     * @param int $score2 Score de l'équipe 2
     * @return int Identifiant du pari ou -1 s'il n'existe pas
     */
    public function getBetOnScoreId($score1, $score2)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT id_paris FROM bet_on_score WHERE score1 = :score1 AND score2 = :score2;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('score1', $score1);
        $stat->bindParam('score2', $score2);
        $stat->execute();
        $id = $stat->fetch(PDO::FETCH_ASSOC);
        $BD->deconnexion();

        if (!$id) {
            return -1;
        }

        return $id["id_paris"];
    }

    /**
     * Met à jour un pari existant dans la base.
     *
     * @param object $bet Objet contenant les informations du pari
     * @return void
     */
    public function updateBetOnScore($bet)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'UPDATE bet_on_score SET score1 = :score1, score2 = :score2 WHERE id_paris = :id_paris';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_paris', $bet->id_paris);
        $stat->bindParam('score1', $bet->score1);
        $stat->bindParam('score2', $bet->score2);
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Insère un nouveau pari dans la base de données.
     *
     * @param object $bet Objet contenant les informations du pari
     * @return void
     */
    public function saveBetOnScore($bet)
    {
        // Connexion à la base de données
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
