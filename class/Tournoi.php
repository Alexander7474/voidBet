<?php
namespace classe;

class Tournoi
{
    public $id_tournoi;
    public $nom_tournoi;
    public $date_debut;
    public $cash_prize;
    
    public function __construct($id_tournoi=0, $nom_tournoi='', $date_debut='', $cash_prize=0)
    {
        $this->id_tournoi = $id_tournoi;
        $this->nom_tournoi = $nom_tournoi;
        $this->date_debut = $date_debut;
        $this->cash_prize = $cash_prize;
    }

    public function showInfo()
    {
        echo "\n id_tournoi : ".$this->id_tournoi;
        echo "\n nom_tournoi : ".$this->nom_tournoi;
        echo "\n date_debut : ".$this->date_debut;
        echo "\n cash_prize : ".$this->cash_prize;
    }
}

?>