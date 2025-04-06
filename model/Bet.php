<?php
// Namespace des classes de la base de données
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Inclusion de la classe Bet
require_once($racine_path . 'class/Bet.php');

// Pour pouvoir créer la connexion à la base de données
require_once('GestionBD.php');
use bd\GestionBD;

/**
 * Classe de gestion des paris
 */
class Bet
{
    /**
     * Récupère la liste des paris dans la base de données
     *
     * @return array Liste des paris
     */
    public function listeBets()
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        // Préparation de la requête
        $sql = 'SELECT * FROM bets;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Bet');
        $stat->execute();
        $bets = $stat->fetchAll();
        $BD->deconnexion();

        return $bets;
    }

    /**
     * Récupère un pari à partir de son id unique dans la base de données
     *
     * @param int $id Identifiant du pari
     *
     * @return mixed Objet Bet ou null si le pari n'existe pas
     */
    public function getBet($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM bets WHERE id_paris = :id_paris;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_paris', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Bet');
        $stat->execute();
        $bet = $stat->fetch();
        $BD->deconnexion();

        if (!$bet) {
            return null;
        }

        return $bet;
    }

    /**
     * Récupère la liste des identifiants des paris pour un match
     *
     * @param int $id_match Identifiant du match
     * @param string $date Date du match
     *
     * @return int Identifiant du pari ou -1 si aucun pari n'est trouvé
     */
    public function getBetId($id_match, $date)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT id_paris FROM bets WHERE id_match = :id_match AND date_paris = :date_paris;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_match', $id_match);
        $stat->bindParam('date_paris', $date);
        $stat->execute();
        $id = $stat->fetch(PDO::FETCH_ASSOC);
        $BD->deconnexion();

        if (!$id) {
            return -1;
        }

        return $id["id_paris"];
    }

    /**
     * Met à jour un pari dans la base de données
     *
     * @param Bet $bet Objet contenant les informations du pari à mettre à jour
     */
    public function updateBet($bet)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'UPDATE bets SET id_match = :id_match, date_paris = :date_paris, valeur = :valeur, cote = :cote, id_user = :id_user WHERE id_paris = :id_paris';
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

    /**
     * Sauvegarde un pari dans la base de données
     *
     * @param Bet $bet Objet contenant les informations du pari à sauvegarder
     * 
     * @return int Identifiant du pari inséré
     */
    public function saveBet($bet)
    {
        // Connexion à la base de données
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

        // Récupérer l'ID du pari inséré
        $id = $BD->pdo->lastInsertId();

        $BD->deconnexion();

        return $id;
    }
}
?>
