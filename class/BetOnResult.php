<?php
namespace classe;

require("Bet.php");

class BetOnResult extends Bet
{
    public $result;
    public $id_equipe;
    
    public function __construct($id_paris=-1, $result='resultat', $id_equipe=-1, $id_match=-1, $date_paris='', $cote=0, $id_user=-1)
    {
        $this->id_paris = $id_paris;
        $this->result = $result;
        $this->id_equipe = $id_equipe;
        $this->id_match = $id_match;
        $this->date_paris = $date_paris;
        $this->cote = $cote;
        $this->id_user = $id_user;
    }

    public function showInfo()
    {
        echo "\n id_paris : ".$this->id_paris;
        echo "\n result : ".$this->result;
        echo "\n id_equipe : ".$this->id_equipe;
        echo "\n id_match : ".$this->id_match;
        echo "\n date_paris : ".$this->date_paris;
        echo "\n cote : ".$this->cote;
        echo "\n id_user : ".$this->id_user;
    }
}

?>