<?php
namespace classe;

require_once("Bet.php");

/**
 * Classe représentant un pari sur un résultat de match.
 */
class BetOnResult extends Bet
{
    /**
     * Le résultat du match (par exemple : "victoire", "défaite", "match nul").
     * 
     * @var string
     */
    public $result;

    /**
     * L'ID de l'équipe concernée par le pari.
     * 
     * @var int
     */
    public $id_equipe;

    /**
     * Constructeur de la classe BetOnResult.
     * Appelle le constructeur de la classe Bet et ajoute des propriétés spécifiques.
     * 
     * @param int    $id_paris    L'ID du pari.
     * @param string $result      Le résultat du pari.
     * @param int    $id_equipe   L'ID de l'équipe concernée par le pari.
     * @param int    $id_match    L'ID du match.
     * @param string $date_paris  La date à laquelle le pari est effectué.
     * @param float  $cote        La cote du pari.
     * @param int    $id_user     L'ID de l'utilisateur ayant placé le pari.
     */
    public function __construct($id_paris = -1, $result = 'resultat', $id_equipe = -1, $id_match = -1, $date_paris = '', $cote = 0, $id_user = -1)
    {
        // Appel du constructeur parent (Bet)
        parent::__construct($id_paris, $id_match, $date_paris, $cote, 0, $id_user);
        
        // Initialisation des propriétés spécifiques à BetOnResult
        $this->result = $result;
        $this->id_equipe = $id_equipe;
    }

    /**
     * Retourne une chaîne de caractères représentant le pari sur le résultat.
     * 
     * @return string
     */
    public function __toString()
    {
        $str = parent::__toString();  // Utilise la méthode __toString() de la classe Bet
        $str .= "\n result : " . $this->result;
        $str .= "\n id_equipe : " . $this->id_equipe;
        return $str;
    }
}
?>
