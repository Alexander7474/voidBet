<?php
namespace classe;

require_once("Bet.php");

class BetOnScore extends Bet
{
    public $score1;
    public $score2;
    
    public function __construct($id_paris=-1, $score1=0, $score2=0, $id_match=-1, $date_paris='', $cote=0, $id_user=-1)
    {
        $this->id_paris = $id_paris;
        $this->score1 = $score1;
        $this->score2 = $score2;
        $this->id_match = $id_match;
        $this->date_paris = $date_paris;
        $this->cote = $cote;
        $this->id_user = $id_user;
    }

    public function __toString()
    {
        $str = "\n id_paris : ".$this->id_paris;
        $str = $str .  "\n score1 : ".$this->score1;
        $str = $str .  "\n score2 : ".$this->score2;
        $str = $str .  "\n id_match : ".$this->id_match;
        $str = $str .  "\n date_paris : ".$this->date_paris;
        $str = $str .  "\n cote : ".$this->cote;
        $str = $str .  "\n id_user : ".$this->id_user;
        return $str;
    }

    public function isValid($m){
      if($this->score1 < 0 || $this->score2 < 0 || $this->score1 > intdiv($m->format,2)+1 || $this->score2 > intdiv($m->format,2)+1 || $this->score1 == $this->score2 || ($this->score1 < intdiv($m->format,2)+1 && $this->score2 < intdiv($m->format,2)+1)) {
        return FALSE;
      }
      return TRUE;
    }

}

?>
