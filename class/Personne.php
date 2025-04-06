<?php
namespace classe;

/**
 * Classe représentant une personne avec un pseudo et un âge.
 */
class Personne
{
    /**
     * Le pseudo de la personne.
     * 
     * @var string
     */
    public $pseudo;

    /**
     * L'âge de la personne.
     * 
     * @var int
     */
    public $age;

    /**
     * Constructeur de la classe Personne.
     * 
     * @param string $pseudo Le pseudo de la personne (par défaut vide).
     * @param int    $age    L'âge de la personne (par défaut 0).
     */
    public function __construct($pseudo = '', $age = 0)
    {
        $this->pseudo = $pseudo;
        $this->age = $age;
    }
}
?>
