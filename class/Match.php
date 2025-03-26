<?php
namespace classe;

class Matchs
{
    public $id_match;
    public $date_match;
    public $heure_match;
    public $format;
    public $id_equipe1;
    public $id_equipe2;
    public $id_tournoi;
    public $score1;
    public $cote1;
    public $score2;
    public $cote2;
            
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
