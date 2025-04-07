<?php
namespace classe;

/**
 * Classe représentant une équipe.
 *
 * Cette classe est utilisée pour encapsuler les informations relatives à une équipe, telles que son nom, son coach, 
 * le cash prize, sa nationalité, et son tableau de joueurs.
 *
 * @package classe
 */
class Equipe
{
    /**
     * @var int L'ID unique de l'équipe.
     */
    public $id_equipe;
    
    /**
     * @var string Le nom de l'équipe.
     */
    public $nom_equipe;
    
    /**
     * @var int L'ID du coach de l'équipe.
     */
    public $id_coach;
    
    /**
     * @var float Le montant du cash prize associé à l'équipe.
     */
    public $cash_prize;
    
    /**
     * @var string La nationalité de l'équipe.
     */
    public $nat;
    
    /**
     * @var int Tableau des joueurs de l'équipe (peut être une liste d'IDs ou un nombre).
     */
    public $tableau_joueur;
    
    /**
     * Constructeur de la classe Equipe.
     *
     * Initialise les propriétés de l'objet Equipe avec les valeurs fournies.
     *
     * @param int $id_equipe L'ID de l'équipe (par défaut -1).
     * @param string $nom_equipe Le nom de l'équipe (par défaut 'nom').
     * @param int $id_coach L'ID du coach de l'équipe (par défaut -1).
     * @param float $cash_prize Le cash prize associé à l'équipe (par défaut 0).
     * @param string $nat La nationalité de l'équipe (par défaut 'nationalité').
     * @param int $tableau_joueur Le tableau des joueurs de l'équipe (par défaut 0).
     */
    public function __construct($id_equipe=-1, $nom_equipe='nom', $id_coach=-1, $cash_prize=0, $nat='nationalité', $tableau_joueur=0)
    {
        $this->id_equipe = $id_equipe;
        $this->nom_equipe = $nom_equipe;
        $this->id_coach = $id_coach;
        $this->cash_prize = $cash_prize;
        $this->nat = $nat;
        $this->tableau_joueur = $tableau_joueur;
    }

    /**
     * Retourne une chaîne de caractères représentant l'objet Equipe.
     *
     * Cette méthode permet d'afficher facilement les informations d'une équipe sous forme de chaîne de caractères.
     *
     * @return string La représentation sous forme de chaîne de l'objet Equipe.
     */
    public function __toString()
    {
        $str = $str .  "\n id_equipe : ".$this->id_equipe;
        $str = $str .  "\n nom_equipe : ".$this->nom_equipe;
        $str = $str .  "\n id_coach : ".$this->id_coach;
        $str = $str .  "\n cash_prize : ".$this->cash_prize;
        $str = $str .  "\n nat : ".$this->nat;
        $str = $str .  "\n tableau_joueur :".$this->tableau_joueur;
        return $str;
    }
}
?>