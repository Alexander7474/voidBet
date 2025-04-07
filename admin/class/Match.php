<?php
namespace classe;

/**
 * Classe représentant un match.
 *
 * Cette classe est utilisée pour encapsuler les informations relatives à un match, telles que les équipes en compétition,
 * la date et l'heure du match, les scores, les cotes, et le tournoi associé.
 *
 * @package classe
 */
class Matchs
{
    /**
     * @var int L'ID unique du match.
     */
    public $id_match;
    
    /**
     * @var string La date du match (au format 'aaaa-mm-jj').
     */
    public $date_match;
    
    /**
     * @var string L'heure du match (au format 'hh:mm:ss').
     */
    public $heure_match;
    
    /**
     * @var int Le format du match (par exemple, BO3, BO5, etc.).
     */
    public $format;
    
    /**
     * @var int L'ID de la première équipe.
     */
    public $id_equipe1;
    
    /**
     * @var int L'ID de la deuxième équipe.
     */
    public $id_equipe2;
    
    /**
     * @var int L'ID du tournoi auquel ce match appartient.
     */
    public $id_tournoi;
    
    /**
     * @var int Le score de la première équipe.
     */
    public $score1;
    
    /**
     * @var float La cote de la première équipe.
     */
    public $cote1;
    
    /**
     * @var int Le score de la deuxième équipe.
     */
    public $score2;
    
    /**
     * @var float La cote de la deuxième équipe.
     */
    public $cote2;
    
    /**
     * Constructeur de la classe Matchs.
     *
     * Initialise les propriétés de l'objet Matchs avec les valeurs fournies.
     *
     * @param int $id_match L'ID du match (par défaut -1).
     * @param string $date_match La date du match (par défaut 'aaaa-mm-jj').
     * @param string $heure_match L'heure du match (par défaut 'hh:mm:ss').
     * @param int $format Le format du match (par défaut -1).
     * @param int $id_equipe1 L'ID de la première équipe (par défaut -1).
     * @param int $id_equipe2 L'ID de la deuxième équipe (par défaut -1).
     * @param int $id_tournoi L'ID du tournoi (par défaut -1).
     * @param int $score1 Le score de la première équipe (par défaut -1).
     * @param float $cote1 La cote de la première équipe (par défaut -1).
     * @param int $score2 Le score de la deuxième équipe (par défaut -1).
     * @param float $cote2 La cote de la deuxième équipe (par défaut -1).
     */
    public function __construct($id_match=-1, $date_match='aaaa-mm-jj', $heure_match='hh:mm:ss', $format=-1, $id_equipe1=-1, $id_equipe2=-1, $id_tournoi=-1, $score1=-1, $cote1=-1, $score2=-1, $cote2=-1)
    {
        $this->id_match = $id_match;
        $this->date_match = $date_match;
        $this->heure_match = $heure_match;
        $this->format = $format;
        $this->id_equipe1 = $id_equipe1;
        $this->id_equipe2 = $id_equipe2;
        $this->id_tournoi = $id_tournoi;
        $this->score1 = $score1;
        $this->cote1 = $cote1;
        $this->score1 = $score2;
        $this->cote2 = $cote2;
    }

    /**
     * Retourne une chaîne de caractères représentant l'objet Matchs.
     *
     * Cette méthode permet d'afficher facilement les informations d'un match sous forme de chaîne de caractères.
     *
     * @return string La représentation sous forme de chaîne de l'objet Matchs.
     */
    public function __toString()
    {
        $str = $str .  "\n id_match : ".$this->id_match;
        $str = $str .  "\n date_match : ".$this->date_match;
        $str = $str .  "\n heure_match : ".$this->heure_match;
        $str = $str .  "\n bo : ".$this->format;
        $str = $str .  "\n id_equipe1 : ".$this->id_equipe1;
        $str = $str .  "\n id_equipe2 : ".$this->id_equipe2;
        $str = $str .  "\n id_tournoi : ".$this->id_tournoi;
        $str = $str .  "\n score1 :".$this->score1;
        $str = $str .  "\n cote1 :".$this->cote1;
        $str = $str .  "\n score2 : ".$this->score2;
        $str = $str .  "\n cote2 :".$this->cote2;
        return $str;
    }
}
?>