<?php
namespace classe;

/**
 * Classe représentant une personne.
 *
 * Cette classe est utilisée pour encapsuler les informations de base concernant une personne, telles que son pseudo et son âge.
 *
 * @package classe
 */
class Personne
{
    /**
     * @var string Le pseudo de la personne.
     */
    public $pseudo;
    
    /**
     * @var int L'âge de la personne.
     */
    public $age;
    
    /**
     * Constructeur de la classe Personne.
     *
     * Initialise les propriétés de l'objet Personne avec les valeurs fournies.
     *
     * @param string $pseudo Le pseudo de la personne (par défaut une chaîne vide).
     * @param int $age L'âge de la personne (par défaut 0).
     */
    public function __construct($pseudo='', $age=0){
        $this->pseudo = $pseudo;
        $this->age = $age;
    }
}
?>