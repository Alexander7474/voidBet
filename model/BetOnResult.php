<?php
// Namespace des classes de la base de données
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Inclusion de la classe BetOnResult
require_once($racine_path . 'class/BetOnResult.php');
use bd\GestionBD;

/**
 * Classe BetOnResult
 *
 * Gère les opérations CRUD sur la table bet_on_result.
 */
class BetOnResult
{
    /**
     * Récupère la liste de tous les paris sur les résultats.
     *
     * @return array Liste des objets BetOnResult
     */
    public function listeBetOnResult()
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        // Préparation de la requête
        $sql = 'SELECT * FROM bet_on_result;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\BetOnResult');
        $stat->execute();
        $bet_on_result = $stat->fetchAll();
        $BD->deconnexion();

        return $bet_on_result;
    }

    /**
     * Récupère un pari à partir de son identifiant.
     *
     * @param int $id Identifiant du pari
     * @return mixed Objet BetOnResult ou null s'il n'existe pas
     */
    public function getBetOnResult($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM bet_on_result WHERE id_paris = :id_paris;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_paris', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\BetOnResult');
        $stat->execute();
        $bet_on_result = $stat->fetch();
        $BD->deconnexion();

        if (!$bet_on_result) {
            return null;
        }

        return $bet_on_result;
    }

    /**
     * Récupère l'identifiant d'un pari en fonction du résultat et de l'équipe.
     *
     * @param string $result Résultat (victoire, nul, défaite, etc.)
     * @param int $id_equipe Identifiant de l'équipe
     * @return int Identifiant du pari ou -1 s'il n'existe pas
     */
    public function getBetOnResultId($result, $id_equipe)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT id_paris FROM bet_on_result WHERE result = :result AND id_equipe = :id_equipe;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('result', $result);
        $stat->bindParam('id_equipe', $id_equipe);
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
     * @param object $bet_on_result Objet contenant les informations du pari
     * @return void
     */
    public function updateBetOnResult($bet_on_result)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'UPDATE bet_on_result SET result = :result, id_equipe = :id_equipe WHERE id_paris = :id_paris';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_paris', $bet_on_result->id_paris);
        $stat->bindParam('result', $bet_on_result->result);
        $stat->bindParam('id_equipe', $bet_on_result->id_equipe);
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Insère un nouveau pari dans la base de données.
     *
     * @param object $bet_on_result Objet contenant les informations du pari
     * @return void
     */
    public function saveBetOnResult($bet_on_result)
    {
        // Connexion à la base de données
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
