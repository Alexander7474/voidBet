<?php
namespace classe;

/**
 * Classe représentant un tournoi.
 *
 * Cette classe est utilisée pour encapsuler les informations d'un tournoi, telles que son nom, sa date de début et le montant de la récompense en argent.
 *
 * @package classe
 */
class Tournoi
{
    /**
     * @var int L'identifiant unique du tournoi.
     */
    public $id_tournoi;

    /**
     * @var string Le nom du tournoi.
     */
    public $nom_tournoi;

    /**
     * @var string La date de début du tournoi (au format 'aaaa-mm-jj').
     */
    public $date_debut;

    /**
     * @var int Le montant du cash prize (récompense en argent).
     */
    public $cash_prize;

    /**
     * Constructeur de la classe Tournoi.
     *
     * Initialise les propriétés de l'objet Tournoi avec les valeurs fournies.
     *
     * @param int $id_tournoi L'identifiant du tournoi (par défaut -1).
     * @param string $nom_tournoi Le nom du tournoi (par défaut 'nom').
     * @param string $date_debut La date de début du tournoi (par défaut 'aaaa-mm-jj').
     * @param int $cash_prize Le montant du cash prize (par défaut 0).
     */
    public function __construct($id_tournoi=-1, $nom_tournoi='nom', $date_debut='aaaa-mm-jj', $cash_prize=0)
    {
        $this->id_tournoi = $id_tournoi;
        $this->nom_tournoi = $nom_tournoi;
        $this->date_debut = $date_debut;
        $this->cash_prize = $cash_prize;
    }

    /**
     * Représentation sous forme de chaîne de caractères de l'objet Tournoi.
     *
     * Cette méthode permet de retourner une représentation lisible de l'objet Tournoi,
     * incluant ses informations principales.
     *
     * @return string La représentation de l'objet Tournoi sous forme de chaîne.
     */
    public function __toString()
    {
        $str = $str .  "\n id_tournoi : ".$this->id_tournoi;
        $str = $str .  "\n nom_tournoi : ".$this->nom_tournoi;
        $str = $str .  "\n date_debut : ".$this->date_debut;
        $str = $str .  "\n cash_prize : ".$this->cash_prize;
        return $str;
    }
}
?>