<?php
namespace classe;

class Matchs
{
    public $id_match;
    public $date_match;
    public $heure_match;
    public $id_equipe1;
    public $id_equipe2;
    public $id_tournoi;
    public $score1;
    public $score2;
            
    public function __construct($id_match=-1, $date_match='aaaa-mm-jj', $heure_match='hh:mm:ss', $id_equipe1=-1, $id_equipe2=-1, $id_tournoi=-1, $score1=0, $score2=0)
    {
        $this->id_match = $id_match;
        $this->date_match = $date_match;
        $this->heure_match = $heure_match;
        $this->id_equipe1 = $id_equipe1;
        $this->id_equipe2 = $id_equipe2;
        $this->id_tournoi = $id_tournoi;
        $this->score1 = $score1;
        $this->score1 = $score2;
    }

    public function showInfo()
    {
        echo "\n id_match : ".$this->id_match;
        echo "\n date_match : ".$this->date_match;
        echo "\n heure_match : ".$this->heure_match;
        echo "\n id_equipe1 : ".$this->id_equipe1;
        echo "\n id_equipe2 : ".$this->id_equipe2;
        echo "\n id_tournoi : ".$this->id_tournoi;
        echo "\n score1 :".$this->score1;
        echo "\n score1 : ".$this->score2;
    }
}
?>
