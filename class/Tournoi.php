<?php
namespace classe;

class Tournoi
{
    public $id_tournoi;
    public $nom_tournoi;
    public $date_debut;
    public $cash_prize;
    
    public function __construct($id_tournoi=-1, $nom_tournoi='nom', $date_debut='aaaa-mm-jj', $cash_prize=0)
    {
        $this->id_tournoi = $id_tournoi;
        $this->nom_tournoi = $nom_tournoi;
        $this->date_debut = $date_debut;
        $this->cash_prize = $cash_prize;
    }

    public function __toString()
    {
        $str = $str .  "\n id_tournoi : ".$this->id_tournoi;
        $str = $str .  "\n nom_tournoi : ".$this->nom_tournoi;
        $str = $str .  "\n date_debut : ".$this->date_debut;
        $str = $str .  "\n cash_prize : ".$this->cash_prize;
        return $str;
    }
}

?>
