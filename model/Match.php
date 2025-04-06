<?php
// Namespace des classes de la base de données
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO ait la classe Match
require_once($racine_path . 'class/Match.php');

// Pour pouvoir créer la connexion à la base de données
require_once('GestionBD.php');
use bd\GestionBD;

/**
 * Classe de gestion des matchs
 */
class Matchs
{
    /**
     * Récupère tous les matchs triés par date
     *
     * @return array Liste des matchs
     */
    public function listeMatchs()
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        // Préparation de la requête
        $sql = 'SELECT * FROM matchs ORDER BY date_match;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Matchs');
        $stat->execute();
        $matchs = $stat->fetchAll();

        $BD->deconnexion();

        return $matchs;
    }

    /**
     * Récupère un match par son identifiant
     *
     * @param int $id Identifiant du match
     * @return Match|null
     */
    public function getMatch($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM matchs WHERE id_match = :id_match;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_match', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Matchs');
        $stat->execute();
        $match = $stat->fetch();

        $BD->deconnexion();

        return $match ?: null;
    }

    /**
     * Récupère l'identifiant d'un match à partir de la date, heure et id tournoi
     *
     * @param string $date Date du match (YYYY-MM-DD)
     * @param string $heure Heure du match (HH:MM:SS)
     * @param int $id_tournoi Identifiant du tournoi
     * @return int Identifiant du match ou -1 si non trouvé
     */
    public function getMatchId($date, $heure, $id_tournoi)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT id_match FROM matchs WHERE date_match = :date_match AND heure_match = :heure_match AND id_tournoi = :id_tournoi;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('date_match', $date);
        $stat->bindParam('heure_match', $heure);
        $stat->bindParam('id_tournoi', $id_tournoi);
        $stat->execute();
        $id = $stat->fetch(PDO::FETCH_ASSOC);

        $BD->deconnexion();

        return $id ? $id["id_match"] : -1;
    }

    /**
     * Met à jour un match
     *
     * @param Match $match
     */
    public function updateMatch($match)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'UPDATE matchs 
                SET date_match = :date_match, 
                    heure_match = :heure_match, 
                    format = :format, 
                    id_equipe1 = :id_equipe1, 
                    id_equipe2 = :id_equipe2, 
                    id_tournoi = :id_tournoi, 
                    score1 = :score1, 
                    cote1 = :cote1, 
                    score2 = :score2, 
                    cote2 = :cote2 
                WHERE id_match = :id_match';
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

    /**
     * Sauvegarde un nouveau match
     *
     * @param Match $match
     */
    public function saveMatch($match)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'INSERT INTO matchs (date_match, heure_match, format, id_equipe1, id_equipe2, id_tournoi, score1, cote1, score2, cote2) 
                VALUES (:date_match, :heure_match, :format, :id_equipe1, :id_equipe2, :id_tournoi, :score1, :cote1, :score2, :cote2);';
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
