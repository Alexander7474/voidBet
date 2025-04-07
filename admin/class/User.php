<?php
namespace classe;

require_once("Personne.php");

/**
 * Classe représentant un utilisateur, héritant de la classe Personne.
 *
 * Cette classe étend la classe `Personne` pour ajouter des informations spécifiques à un utilisateur, telles que son identifiant, son email, son mot de passe et ses crédits.
 *
 * @package classe
 */
class User extends Personne
{
    /**
     * @var int L'identifiant unique de l'utilisateur.
     */
    public $id_user;

    /**
     * @var string L'email de l'utilisateur.
     */
    public $email;

    /**
     * @var string Le mot de passe de l'utilisateur.
     */
    public $password;

    /**
     * @var int Le nombre de crédits (void_coin) disponibles pour l'utilisateur.
     */
    public $void_coin;

    /**
     * Constructeur de la classe User.
     *
     * Initialise les propriétés de l'objet User avec les valeurs fournies. Cette classe étend la classe Personne, héritant ainsi des propriétés pseudo et age.
     *
     * @param int $id_user L'identifiant unique de l'utilisateur (par défaut -1).
     * @param string $pseudo Le pseudo de l'utilisateur (par défaut 'default_pseudo').
     * @param string $email L'email de l'utilisateur (par défaut 'email@email.com').
     * @param string $password Le mot de passe de l'utilisateur (par défaut 'password').
     * @param int $age L'âge de l'utilisateur (par défaut 0).
     * @param int $void_coin Le nombre de crédits (void_coin) de l'utilisateur (par défaut 0).
     */
    public function __construct($id_user=-1, $pseudo='default_pseudo', $email='email@email.com', $password='password', $age=0, $void_coin=0)
    {
        $this->id_user = $id_user;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->void_coin = $void_coin;
        $this->age = $age;
    }

    /**
     * Représentation sous forme de chaîne de caractères de l'objet User.
     *
     * Cette méthode permet de retourner une représentation lisible de l'objet User,
     * incluant toutes les informations pertinentes sur l'utilisateur.
     *
     * @return string La représentation de l'objet User sous forme de chaîne.
     */
    public function __toString()
    {
        $str = $str .  "\npseudo: ".$this->pseudo;
        $str = $str .  "\npassword: ".$this->password;
        $str = $str .  "\nemail: ".$this->email;
        $str = $str .  "\nage: ".$this->age;
        $str = $str .  "\nvoid_coin: ".$this->void_coin;
        $str = $str .  "\nid_user: ".$this->id_user;
        return $str;
    }
}
?>