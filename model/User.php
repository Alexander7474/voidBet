<?php
// Namespace des classes de la base de données
namespace bd;

// Pour pouvoir utiliser le namespace de PDO qui se trouve à la racine
use \PDO;

// Inclusion de la classe User
require_once($racine_path . 'class/User.php');

// Pour pouvoir créer la connexion à la base de données
require_once('GestionBD.php');
use bd\GestionBD;

/**
 * Classe de gestion des utilisateurs
 */
class User
{
    /**
     * Récupère tous les utilisateurs de la base de données
     *
     * @return array Liste des utilisateurs
     */
    public function listeUsers()
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        // Préparation de la requête
        $sql = 'SELECT * FROM users;';
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\User');
        $stat->execute();
        $users = $stat->fetchAll();
        $BD->deconnexion();

        return $users;
    }

    /**
     * Récupère un utilisateur à partir de son id
     *
     * @param int $id Identifiant de l'utilisateur
     *
     * @return mixed Un objet User ou null si l'utilisateur n'existe pas
     */
    public function getUser($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT * FROM users WHERE id_user = :id_user;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_user', $id);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\User');
        $stat->execute();
        $user = $stat->fetch();
        $BD->deconnexion();

        if (!$user) {
            return null;
        }

        return $user;
    }

    /**
     * Récupère l'id d'un utilisateur à partir de son pseudo
     *
     * @param string $pseudo Le pseudo de l'utilisateur
     *
     * @return int L'id de l'utilisateur ou -1 si l'utilisateur n'est pas trouvé
     */
    public function getUserId($pseudo)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'SELECT id_user FROM users WHERE pseudo = :pseudo;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('pseudo', $pseudo);
        $stat->execute();
        $id = $stat->fetch(PDO::FETCH_ASSOC);
        $BD->deconnexion();

        if (!$id) {
            return -1;
        }

        return $id["id_user"];
    }

    /**
     * Supprime un utilisateur de la base de données
     *
     * @param int $id L'id de l'utilisateur à supprimer
     */
    public function deleteUser($id)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'DELETE FROM users WHERE id_user = :id_user;';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_user', $id);
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Met à jour un utilisateur dans la base de données
     *
     * @param User $user L'objet contenant les informations à mettre à jour
     */
    public function updateUser($user)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'UPDATE users SET pseudo = :pseudo, password = :password, email = :email, void_coin = :void_coin WHERE id_user = :id_user';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('id_user', $user->id_user);
        $stat->bindParam('pseudo', $user->pseudo);
        $stat->bindParam('password', $user->password);
        $stat->bindParam('email', $user->email);
        $stat->bindParam('void_coin', $user->void_coin);
        $stat->execute();
        $BD->deconnexion();
    }

    /**
     * Sauvegarde un nouvel utilisateur dans la base de données
     *
     * @param User $user L'objet contenant les informations de l'utilisateur à sauvegarder
     */
    public function saveUser($user)
    {
        // Connexion à la base de données
        $BD = new GestionBD();
        $BD->connexion();

        $sql = 'INSERT INTO users(pseudo, password, email, void_coin) VALUES (:pseudo, :password, :email, :void_coin);';
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam('pseudo', $user->pseudo);
        $stat->bindParam('password', $user->password);
        $stat->bindParam('email', $user->email);
        $stat->bindParam('void_coin', $user->void_coin);
        $stat->execute();
        $BD->deconnexion();
    }
}
?>
