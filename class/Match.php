<?php
namespace classe;

/**
 * Classe représentant un match entre deux équipes.
 */
class Matchs
{
    /**
     * L'ID unique du match.
     * 
     * @var int
     */
    public $id_match;

    /**
     * La date du match.
     * 
     * @var string
     */
    public $date_match;

    /**
     * L'heure du match.
     * 
     * @var string
     */
    public $heure_match;

    /**
     * Le format du match (par exemple, format Bo3, Bo5, etc.).
     * 
     * @var int
     */
    public $format;

    /**
     * L'ID de la première équipe.
     * 
     * @var int
     */
    public $id_equipe1;

    /**
     * L'ID de la deuxième équipe.
     * 
     * @var int
     */
    public $id_equipe2;

    /**
     * L'ID du tournoi auquel le match appartient.
     * 
     * @var int
     */
    public $id_tournoi;

    /**
     * Le score de la première équipe.
     * 
     * @var int
     */
    public $score1;

    /**
     * La cote du pari pour la première équipe.
     * 
     * @var float
     */
    public $cote1;

    /**
     * Le score de la deuxième équipe.
     * 
     * @var int
     */
    public $score2;

    /**
     * La cote du pari pour la deuxième équipe.
     * 
     * @var float
     */
    public $cote2;

    /**
     * Constructeur de la classe Matchs.
     * 
     * @param int    $id_match   L'ID du match.
     * @param string $date_match La date du match.
     * @param string $heure_match L'heure du match.
     * @param int    $format     Le format du match.
     * @param int    $id_equipe1 L'ID de la première équipe.
     * @param int    $id_equipe2 L'ID de la deuxième équipe.
     * @param int    $id_tournoi L'ID du tournoi.
     * @param int    $score1     Le score de la première équipe.
     * @param float  $cote1      La cote pour la première équipe.
     * @param int    $score2     Le score de la deuxième équipe.
     * @param float  $cote2      La cote pour la deuxième équipe.
     */
    public function __construct(
        $id_match = -1, $date_match = 'aaaa-mm-jj', $heure_match = 'hh:mm:ss', $format = -1,
        $id_equipe1 = -1, $id_equipe2 = -1, $id_tournoi = -1, $score1 = -1, $cote1 = -1, 
        $score2 = -1, $cote2 = -1
    ) {
        $this->id_match = $id_match;
        $this->date_match = $date_match;
        $this->heure_match = $heure_match;
        $this->format = $format;
        $this->id_equipe1 = $id_equipe1;
        $this->id_equipe2 = $id_equipe2;
        $this->id_tournoi = $id_tournoi;
        $this->score1 = $score1;
        $this->cote1 = $cote1;
        $this->score2 = $score2;
        $this->cote2 = $cote2;
    }

    /**
     * Retourne une représentation sous forme de chaîne du match.
     * 
     * @return string La représentation du match sous forme de chaîne.
     */
    public function __toString()
    {
        $str = "";
        $str .= "\n id_match : ".$this->id_match;
        $str .= "\n date_match : ".$this->date_match;
        $str .= "\n heure_match : ".$this->heure_match;
        $str .= "\n format : ".$this->format;
        $str .= "\n id_equipe1 : ".$this->id_equipe1;
        $str .= "\n id_equipe2 : ".$this->id_equipe2;
        $str .= "\n id_tournoi : ".$this->id_tournoi;
        $str .= "\n score1 : ".$this->score1;
        $str .= "\n cote1 : ".$this->cote1;
        $str .= "\n score2 : ".$this->score2;
        $str .= "\n cote2 : ".$this->cote2;
        return $str;
    }
}
?>
