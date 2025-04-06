<?php
// Namespace des classes de la base de données
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO ait la classe Equipe
require_once($racine_path . 'class/Equipe.php');

// Pour pouvoir créer la connexion à la base de données
require_once('GestionBD.php');
use bd\GestionBD;

/**
 * Classe de gestion des équipes
 */
class Equipe
{
    /**
     * Récupère toutes les équipes
     *
     * @return array $equipes
     */
    public function listeEquipes()
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        // Préparation de la requête
        $sql = 'SELECT * FROM equipes;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Equipe');
        $stat->execute();
        $equipes = $stat->fetchAll();
        $BD->deconnexion();

        return $equipes;
    }

    /**
     * Récupère une équipe par son identifiant
     *
     * @param int $id Identifiant de l'équipe
     * @return Equipe|null
     */
    public function getEquipe($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM equipes WHERE id_equipe = :id_equipe;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_equipe', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Equipe');
        $stat->execute();
        $equipe = $stat->fetch();
        $BD->deconnexion();

        return $equipe ?: null;
    }

    /**
     * Récupère l'identifiant d'une équipe à partir de son nom
     *
     * @param string $nom Nom de l'équipe
     * @return int Identifiant de l'équipe, ou -1 si non trouvée
     */
    public function getEquipeId($nom)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT id_equipe FROM equipes WHERE nom_equipe = :nom_equipe;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('nom_equipe', $nom);
        $stat->execute();
        $id = $stat->fetch(PDO::FETCH_ASSOC);
        $BD->deconnexion();

        return $id ? $id["id_equipe"] : -1;
    }

    /**
     * Met à jour une équipe
     *
     * @param Equipe $equipe
     */
    public function updateEquipe($equipe)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'UPDATE equipes SET nom_equipe = :nom_equipe, id_coach = :id_coach WHERE id_equipe = :id_equipe';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_equipe', $equipe->id_equipe);
        $stat->bindParam('nom_equipe', $equipe->nom_equipe);
        $stat->bindParam('id_coach', $equipe->id_coach);
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Sauvegarde une nouvelle équipe
     *
     * @param Equipe $equipe
     */
    public function saveEquipe($equipe)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'INSERT INTO equipes(nom_equipe, id_coach) VALUES (:nom_equipe, :id_coach);';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('nom_equipe', $equipe->nom_equipe);
        $stat->bindParam('id_coach', $equipe->id_coach);
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Récupère la liste des identifiants des joueurs d'une équipe
     *
     * @param int $id Identifiant de l'équipe
     * @return array Liste des identifiants des joueurs
     */
    public function getIdJoueursEquipe($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM composition_equipe WHERE id_equipe = :id_equipe;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_equipe', $id);
        $stat->execute();

        $ids = array_column($stat->fetchAll(PDO::FETCH_ASSOC), 'id_joueur');

        $BD->deconnexion();

        return $ids;
    }
}
?>

