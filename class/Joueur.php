<?php
namespace classe;

require_once("Personne.php");

/**
 * Classe représentant un joueur, héritant de la classe Personne.
 */
class Joueur extends Personne
{
    /**
     * Nationalité du joueur.
     * 
     * @var string
     */
    public $nationalite;

    /**
     * Indique si le joueur est un coach.
     * 
     * @var bool
     */
    public $is_coach;

    /**
     * Identifiant du joueur.
     * 
     * @var int
     */
    public $id_joueur;

    /**
     * Constructeur de la classe Joueur.
     * 
     * @param int    $id_joueur    Identifiant du joueur (par défaut -1).
     * @param string $pseudo       Pseudo du joueur (par défaut 'default_pseudo').
     * @param int    $age          Âge du joueur (par défaut 0).
     * @param string $nationalite  Nationalité du joueur (par défaut 'undefined').
     * @param bool   $is_coach     Indique si le joueur est un coach (par défaut FALSE).
     */
    public function __construct($id_joueur = -1, $pseudo = 'default_pseudo', $age = 0, $nationalite = 'undefined', $is_coach = FALSE)
    {
        // Appel du constructeur parent (Personne)
        parent::__construct($pseudo, $age);

        // Initialisation des propriétés spécifiques à Joueur
        $this->id_joueur = $id_joueur;
        $this->nationalite = $nationalite;
        $this->is_coach = $is_coach;
    }

    /**
     * Retourne une chaîne de caractères représentant un joueur.
     * 
     * @return string
     */
    public function __toString()
    {
        $str = parent::__toString();  // Utilise la méthode __toString() de la classe Personne
        $str .= "\n id_joueur: " . $this->id_joueur;
        $str .= "\nnationalite: " . $this->nationalite;
        $str .= "\nis_coach: " . ($this->is_coach ? 'true' : 'false');
        return $str;
    }
}
?>
