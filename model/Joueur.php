<?php
// Namespace des classes de la base de données
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO ait la classe Joueur
require_once($racine_path . 'class/Joueur.php');

// Pour pouvoir créer la connexion à la base de données
require_once('GestionBD.php');
use bd\GestionBD;

/**
 * Classe permettant la gestion des joueurs
 */
class Joueur
{
    /**
     * Récupère tous les joueurs
     *
     * @return array
     */
    public function listeJoueurs()
    {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM joueurs;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Joueur');
        $stat->execute();
        $joueurs = $stat->fetchAll();

        $BD->deconnexion();

        return $joueurs;
    }

    /**
     * Récupère un joueur par son identifiant
     *
     * @param int $id
     * @return Joueur|null
     */
    public function getJoueur($id)
    {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM joueurs WHERE id_joueur = :id_joueur;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_joueur', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Joueur');
        $stat->execute();
        $joueur = $stat->fetch();

        $BD->deconnexion();

        return $joueur ?: null;
    }

    /**
     * Récupère l'ID d'un joueur via son pseudo
     *
     * @param string $pseudo
     * @return int
     */
    public function getJoueurId($pseudo)
    {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT id_joueur FROM joueurs WHERE pseudo = :pseudo;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('pseudo', $pseudo);
        $stat->execute();
        $id = $stat->fetch(PDO::FETCH_ASSOC);

        $BD->deconnexion();

        return $id ? $id["id_joueur"] : -1;
    }

    /**
     * Met à jour un joueur
     *
     * @param Joueur $joueur
     */
    public function updateJoueur($joueur)
    {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'UPDATE joueurs 
                SET pseudo = :pseudo, nationalite = :nationalite, is_coach = :is_coach 
                WHERE id_joueur = :id_joueur;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_joueur', $joueur->id_joueur);
        $stat->bindParam('pseudo', $joueur->pseudo);
        $stat->bindParam('nationalite', $joueur->nationalite);
        $stat->bindParam('is_coach', $joueur->is_coach, PDO::PARAM_BOOL);
        $stat->execute();

        $BD->deconnexion();
    }

    /**
     * Sauvegarde un nouveau joueur
     *
     * @param Joueur $joueur
     */
    public function saveJoueur($joueur)
    {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'INSERT INTO joueurs (pseudo, nationalite, is_coach) 
                VALUES (:pseudo, :nationalite, :is_coach);';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('pseudo', $joueur->pseudo);
        $stat->bindParam('nationalite', $joueur->nationalite);
        $stat->bindParam('is_coach', $joueur->is_coach, PDO::PARAM_BOOL);
        $stat->execute();

        $BD->deconnexion();
    }
}
?>
