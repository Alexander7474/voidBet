<?php
namespace classe;

/**
 * Classe représentant un pari (générique) sur un match.
 */
class Bet
{
    /**
     * L'ID du pari.
     * 
     * @var int
     */
    public $id_paris;

    /**
     * L'ID du match sur lequel le pari est placé.
     * 
     * @var int
     */
    public $id_match;

    /**
     * La date à laquelle le pari a été effectué.
     * 
     * @var string
     */
    public $date_paris;

    /**
     * La cote du pari.
     * 
     * @var float
     */
    public $cote;

    /**
     * La valeur du pari (montant).
     * 
     * @var float
     */
    public $valeur;

    /**
     * L'ID de l'utilisateur ayant placé le pari.
     * 
     * @var int
     */
    public $id_user;

    /**
     * Constructeur de la classe Bet.
     * 
     * @param int    $id_paris    L'ID du pari.
     * @param int    $id_match    L'ID du match sur lequel le pari est effectué.
     * @param string $date_paris  La date du pari.
     * @param float  $cote        La cote du pari.
     * @param float  $valeur      La valeur du pari (montant).
     * @param int    $id_user     L'ID de l'utilisateur ayant placé le pari.
     */
    public function __construct($id_paris = -1, $id_match = -1, $date_paris = '', $cote = 0, $valeur = 0, $id_user = -1)
    {
        $this->id_paris = $id_paris;
        $this->id_match = $id_match;
        $this->date_paris = $date_paris;
        $this->cote = $cote;
        $this->valeur = $valeur;
        $this->id_user = $id_user;
    }

    /**
     * Retourne une chaîne de caractères représentant le pari.
     * 
     * @return string
     */
    public function __toString()
    {
        $str = "";
        $str .= "\n id_paris : " . $this->id_paris;
        $str .= "\n id_match : " . $this->id_match;
        $str .= "\n date_paris : " . $this->date_paris;
        $str .= "\n cote : " . $this->cote;
        $str .= "\n valeur : " . $this->valeur;
        $str .= "\n id_user : " . $this->id_user;
        return $str;
    }
}
?>
