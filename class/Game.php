<?php
namespace classe;

class Game
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
            
    public function __construct($id_match=-1, $date_match='aaaa-mm-jj', $heure_match='hh:mm:ss', $format=-1, $id_equipe1=-1, $id_equipe2=-1, $id_tournoi=-1, $score1=-1, $cote1=-1, $score2=-1, $cote2=-1,)
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

    public function showInfo()
    {
        echo "\n id_match : ".$this->id_match;
        echo "\n date_match : ".$this->date_match;
        echo "\n heure_match : ".$this->heure_match;
        echo "\n bo : ".$this->format;
        echo "\n id_equipe1 : ".$this->id_equipe1;
        echo "\n id_equipe2 : ".$this->id_equipe2;
        echo "\n id_tournoi : ".$this->id_tournoi;
        echo "\n score1 :".$this->score1;
        echo "\n cote1 :".$this->cote1;
        echo "\n score2 : ".$this->score2;
        echo "\n cote2 :".$this->cote2;
    }
}
?>
