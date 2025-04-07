<?php
// Namespace des classes de la base de donnée
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Pour que PDO ait la classe Animal
require_once($racine_path.'class/Equipe.php');

// pour pouvoir créer la connexion à la BD
require_once('GestionBD.php');
use bd\GestionBD;

/**
 * Classe Equipe qui représente les équipes dans le système.
 *
 * Cette classe fournit des méthodes pour gérer les équipes dans la base de données,
 * y compris la récupération, l'ajout, la mise à jour et la suppression des équipes.
 *
 * @package bd
 */
class Equipe
{
    /**
     * Récupère la liste des équipes dans la base de données.
     *
     * Cette méthode se connecte à la base de données, exécute une requête pour récupérer
     * toutes les équipes, puis retourne le résultat sous forme de tableau.
     *
     * @return array Liste des équipes sous forme de tableau d'objets Equipe.
     */
    public function listeEquipes()
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        // Préparation de la requête
        $sql = 'SELECT * from equipes;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Equipe');
        $stat->execute();
        $equipes = $stat->fetchAll();
        $BD->deconnexion();
        
        return $equipes;
    }

    /**
     * Récupère une équipe spécifique dans la base de données.
     *
     * Cette méthode se connecte à la base de données et récupère les informations d'une équipe
     * à partir de son ID. Elle retourne l'objet Equipe si trouvé, sinon retourne null.
     *
     * @param int $id L'ID de l'équipe à récupérer.
     * @return Equipe|null L'objet Equipe ou null si l'équipe n'existe pas.
     */
    public function getEquipe($id)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        $sql = 'SELECT * from equipes where id_equipe=:id_equipe;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_equipe', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'classe\Equipe');
        $stat->execute();
        $equipe = $stat->fetch();
        $BD->deconnexion();
        
        if (!$equipe) {
            return null;
        }
        
        return $equipe;
    }

    /**
     * Met à jour une équipe existante dans la base de données.
     *
     * Cette méthode permet de mettre à jour les informations d'une équipe spécifique dans
     * la base de données en fonction de l'objet Equipe passé en paramètre.
     *
     * @param Equipe $equipe L'objet Equipe à mettre à jour dans la base de données.
     */
    public function updateEquipe($equipe)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        $sql = 'UPDATE equipes SET nom_equipe=:nom_equipe, id_coach=:id_coach WHERE id_equipe=:id_equipe';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_equipe', $equipe->id_equipe);
        $stat->bindParam('nom_equipe', $equipe->nom_equipe);
        $stat->bindParam('id_coach', $equipe->id_coach);
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Enregistre une nouvelle équipe dans la base de données.
     *
     * Cette méthode permet d'ajouter une nouvelle équipe à la base de données en utilisant
     * les informations contenues dans l'objet Equipe passé en paramètre.
     *
     * @param Equipe $equipe L'objet Equipe à enregistrer dans la base de données.
     */
    public function saveEquipe($equipe)
    {
        // Connexion à la BD
        $BD = new GestionBD();
        $BD->connexion();
        
        $sql = 'INSERT INTO equipes(nom_equipe, id_coach) VALUES (:nom_equipe, :id_coach);';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('nom_equipe', $equipe->nom_equipe);
        $stat->bindParam('id_coach', $equipe->id_coach);
        $stat->execute();
        $BD->deconnexion();
    }
}
?>