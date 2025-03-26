<?php
namespace classe;

require_once("Bet.php");

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

    public function __toString()
    {
        $str = "\n id_paris : ".$this->id_paris;
        $str = $str .  "\n result : ".$this->result;
        $str = $str .  "\n id_equipe : ".$this->id_equipe;
        $str = $str .  "\n id_match : ".$this->id_match;
        $str = $str .  "\n date_paris : ".$this->date_paris;
        $str = $str .  "\n cote : ".$this->cote;
        $str = $str .  "\n id_user : ".$this->id_user;
        return $str;
    }
}

?>
