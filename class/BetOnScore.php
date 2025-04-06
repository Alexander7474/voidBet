<?php
namespace classe;

require_once("Bet.php");

/**
 * Classe représentant un pari sur le score d'un match.
 */
class BetOnScore extends Bet
{
    /**
     * Le score de l'équipe 1.
     * 
     * @var int
     */
    public $score1;

    /**
     * Le score de l'équipe 2.
     * 
     * @var int
     */
    public $score2;

    /**
     * Constructeur de la classe BetOnScore.
     * Appelle le constructeur de la classe Bet et ajoute des propriétés spécifiques.
     * 
     * @param int    $id_paris    L'ID du pari.
     * @param int    $score1      Le score de l'équipe 1.
     * @param int    $score2      Le score de l'équipe 2.
     * @param int    $id_match    L'ID du match.
     * @param string $date_paris  La date à laquelle le pari est effectué.
     * @param float  $cote        La cote du pari.
     * @param int    $id_user     L'ID de l'utilisateur ayant placé le pari.
     */
    public function __construct($id_paris = -1, $score1 = 0, $score2 = 0, $id_match = -1, $date_paris = '', $cote = 0, $id_user = -1)
    {
        // Appel du constructeur parent (Bet)
        parent::__construct($id_paris, $id_match, $date_paris, $cote, 0, $id_user);
        
        // Initialisation des propriétés spécifiques à BetOnScore
        $this->score1 = $score1;
        $this->score2 = $score2;
    }

    /**
     * Retourne une chaîne de caractères représentant le pari sur le score.
     * 
     * @return string
     */
    public function __toString()
    {
        $str = parent::__toString();  // Utilise la méthode __toString() de la classe Bet
        $str .= "\n score1 : " . $this->score1;
        $str .= "\n score2 : " . $this->score2;
        return $str;
    }

    /**
     * Vérifie si le pari est valide en fonction des conditions du match.
     * 
     * @param object $m L'objet match qui contient le format du match.
     * 
     * @return bool
     */
    public function isValid($m)
    {
        // Vérification des conditions de validité du pari
        if ($this->score1 < 0 || $this->score2 < 0 ||
            $this->score1 > intdiv($m->format, 2) + 1 || $this->score2 > intdiv($m->format, 2) + 1 ||
            $this->score1 == $this->score2 ||
            ($this->score1 < intdiv($m->format, 2) + 1 && $this->score2 < intdiv($m->format, 2) + 1)) {
            return false;
        }
        return true;
    }
}
?>
