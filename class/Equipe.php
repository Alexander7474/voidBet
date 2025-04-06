<?php
namespace classe;

/**
 * Classe représentant une équipe.
 */
class Equipe
{
    /**
     * L'ID de l'équipe.
     * 
     * @var int
     */
    public $id_equipe;

    /**
     * Le nom de l'équipe.
     * 
     * @var string
     */
    public $nom_equipe;

    /**
     * L'ID du coach de l'équipe.
     * 
     * @var int
     */
    public $id_coach;

    /**
     * Le cash prize de l'équipe.
     * 
     * @var float
     */
    public $cash_prize;

    /**
     * La nationalité de l'équipe.
     * 
     * @var string
     */
    public $nat;

    /**
     * Le tableau des joueurs de l'équipe.
     * 
     * @var array
     */
    public $tableau_joueur;

    /**
     * Constructeur de la classe Equipe.
     * 
     * @param int    $id_equipe      L'ID de l'équipe.
     * @param string $nom_equipe     Le nom de l'équipe.
     * @param int    $id_coach       L'ID du coach.
     * @param float  $cash_prize     Le cash prize de l'équipe.
     * @param string $nat            La nationalité de l'équipe.
     * @param array  $tableau_joueur Le tableau des joueurs de l'équipe.
     */
    public function __construct($id_equipe = -1, $nom_equipe = 'nom', $id_coach = -1, $cash_prize = 0, $nat = 'nationalité', $tableau_joueur = [])
    {
        $this->id_equipe = $id_equipe;
        $this->nom_equipe = $nom_equipe;
        $this->id_coach = $id_coach;
        $this->cash_prize = $cash_prize;
        $this->nat = $nat;
        $this->tableau_joueur = $tableau_joueur;
    }

    /**
     * Retourne une chaîne de caractères représentant une équipe.
     * 
     * @return string
     */
    public function __toString()
    {
        $str = "";
        $str .= "\n id_equipe : " . $this->id_equipe;
        $str .= "\n nom_equipe : " . $this->nom_equipe;
        $str .= "\n id_coach : " . $this->id_coach;
        $str .= "\n cash_prize : " . $this->cash_prize;
        $str .= "\n nat : " . $this->nat;
        $str .= "\n tableau_joueur : " . implode(", ", $this->tableau_joueur);
        return $str;
    }
}
?>
