<?php
namespace classe;

/**
 * Classe représentant un pari.
 *
 * Cette classe est utilisée pour encapsuler les informations relatives à un pari dans le système.
 * Elle permet de stocker des données comme l'ID du pari, l'ID du match, la date du pari, la cote, la valeur du pari, 
 * ainsi que l'ID de l'utilisateur qui a effectué ce pari.
 *
 * @package classe
 */
class Bet
{
    /**
     * @var int L'ID unique du pari.
     */
    public $id_paris;
    
    /**
     * @var int L'ID du match associé à ce pari.
     */
    public $id_match;
    
    /**
     * @var string La date et l'heure du pari.
     */
    public $date_paris;
    
    /**
     * @var float La cote du pari.
     */
    public $cote;
    
    /**
     * @var float La valeur du pari (montant).
     */
    public $valeur;
    
    /**
     * @var int L'ID de l'utilisateur qui a effectué ce pari.
     */
    public $id_user;
    
    /**
     * Constructeur de la classe Bet.
     *
     * Initialise les propriétés de l'objet Bet avec les valeurs fournies.
     *
     * @param int $id_paris L'ID du pari (par défaut -1).
     * @param int $id_match L'ID du match (par défaut -1).
     * @param string $date_paris La date du pari (par défaut une chaîne vide).
     * @param float $cote La cote du pari (par défaut 0).
     * @param float $valeur La valeur du pari (par défaut 0).
     * @param int $id_user L'ID de l'utilisateur ayant effectué le pari (par défaut -1).
     */
    public function __construct($id_paris=-1, $id_match=-1, $date_paris='', $cote=0, $valeur=0, $id_user=-1)
    {
        $this->id_paris = $id_paris;
        $this->id_match = $id_match;
        $this->date_paris = $date_paris;
        $this->cote = $cote;
        $this->valeur = $valeur;
        $this->id_user = $id_user;
    }

    /**
     * Retourne une chaîne de caractères représentant l'objet Bet.
     *
     * Cette méthode permet d'afficher facilement les informations d'un pari sous forme de chaîne de caractères.
     *
     * @return string La représentation sous forme de chaîne de l'objet Bet.
     */
    public function __toString()
    {
        $str = "\n id_paris : ".$this->id_paris;
        $str = $str .  "\n id_match : ".$this->id_match;
        $str = $str .  "\n date_paris : ".$this->date_paris;
        $str = $str .  "\n cote : ".$this->cote;
        $str = $str .  "\n valeur : ".$this->valeur;
        $str = $str .  "\n id_user : ".$this->id_user;
        return $str;
    }
}
?>