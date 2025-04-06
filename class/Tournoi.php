<?php
namespace classe;

/**
 * Classe Tournoi représentant un tournoi avec ses informations.
 */
class Tournoi
{
    /**
     * Identifiant unique du tournoi
     * 
     * @var int
     */
    public $id_tournoi;

    /**
     * Nom du tournoi
     * 
     * @var string
     */
    public $nom_tournoi;

    /**
     * Date de début du tournoi
     * 
     * @var string
     */
    public $date_debut;

    /**
     * Cash prize (prix en argent) du tournoi
     * 
     * @var int
     */
    public $cash_prize;

    /**
     * Constructeur de la classe Tournoi
     * 
     * @param int    $id_tournoi  Identifiant unique du tournoi (par défaut -1)
     * @param string $nom_tournoi Nom du tournoi (par défaut 'nom')
     * @param string $date_debut  Date de début du tournoi (par défaut 'aaaa-mm-jj')
     * @param int    $cash_prize  Cash prize du tournoi (par défaut 0)
     */
    public function __construct($id_tournoi = -1, $nom_tournoi = 'nom', $date_debut = 'aaaa-mm-jj', $cash_prize = 0)
    {
        $this->id_tournoi = $id_tournoi;
        $this->nom_tournoi = $nom_tournoi;
        $this->date_debut = $date_debut;
        $this->cash_prize = $cash_prize;
    }

    /**
     * Convertit l'objet Tournoi en une chaîne de caractères lisible
     * 
     * @return string Représentation textuelle du tournoi
     */
    public function __toString()
    {
        $str = "";
        $str .= "\n id_tournoi : " . $this->id_tournoi;
        $str .= "\n nom_tournoi : " . $this->nom_tournoi;
        $str .= "\n date_debut : " . $this->date_debut;
        $str .= "\n cash_prize : " . $this->cash_prize;
        
        return $str;
    }
}
?>
