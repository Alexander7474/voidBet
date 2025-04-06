<?php
namespace classe;

require_once("Personne.php");

/**
 * Classe User qui hérite de la classe Personne
 * 
 * Cette classe représente un utilisateur avec ses informations personnelles,
 * telles que le pseudo, l'email, le mot de passe, l'âge et la quantité de void_coins.
 * Elle étend la classe Personne, et ajoute des propriétés et méthodes spécifiques aux utilisateurs.
 */
class User extends Personne
{
    /**
     * Identifiant unique de l'utilisateur
     * 
     * @var int
     */
    public $id_user;

    /**
     * Email de l'utilisateur
     * 
     * @var string
     */
    public $email;

    /**
     * Mot de passe de l'utilisateur
     * 
     * @var string
     */
    public $password;

    /**
     * Nombre de void_coins de l'utilisateur
     * 
     * @var int
     */
    public $void_coin;

    /**
     * Constructeur de la classe User
     * 
     * @param int    $id_user   Identifiant unique de l'utilisateur (par défaut -1)
     * @param string $pseudo    Pseudo de l'utilisateur (par défaut 'default_pseudo')
     * @param string $email     Email de l'utilisateur (par défaut 'email@email.com')
     * @param string $password  Mot de passe de l'utilisateur (par défaut 'password')
     * @param int    $age       Âge de l'utilisateur (par défaut 0)
     * @param int    $void_coin Quantité de void_coins (par défaut 0)
     */
    public function __construct($id_user = -1, $pseudo = 'default_pseudo', $email = 'email@email.com', $password = 'password', $age = 0, $void_coin = 0)
    {
        // Appel du constructeur parent (Personne)
        parent::__construct($pseudo, $age);

        // Initialisation des propriétés spécifiques à User
        $this->id_user = $id_user;
        $this->email = $email;
        $this->password = $password;
        $this->void_coin = $void_coin;
    }

    /**
     * Convertit l'objet User en une chaîne de caractères lisible
     * 
     * @return string Représentation textuelle de l'utilisateur
     */
    public function __toString()
    {
        $str = parent::__toString();  // Utilise la méthode __toString() de la classe Personne
        $str .= "\n email: " . $this->email;
        $str .= "\npassword: " . $this->password;
        $str .= "\nvoid_coin: " . $this->void_coin;
        $str .= "\nid_user: " . $this->id_user;
        
        return $str;
    }
}
?>
