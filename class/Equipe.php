<?php
namespace classe;

class Equipe
{
    public $id_equipe;
    public $nom_equipe;
    public $id_coach;
    public $cash_prize;
    public $nat;
    public $tableau_joueur;
    
    public function __construct($id_equipe=-1, $nom_equipe='nom', $id_coach=-1, $cash_prize=0, $nat='nationalité', $tableau_joueur=0)
    {
        $this->id_equipe = $id_equipe;
        $this->nom_equipe = $nom_equipe;
        $this->id_coach = $id_coach;
        $this->cash_prize = $cash_prize;
        $this->nat = $nat;
        $this->tableau_joueur = $tableau_joueur;
    }

    public function __toString()
    {
        $str = $str .  "\n id_equipe : ".$this->id_equipe;
        $str = $str .  "\n nom_equipe : ".$this->nom_equipe;
        $str = $str .  "\n id_coach : ".$this->id_coach;
        $str = $str .  "\n cash_prize : ".$this->cash_prize;
        $str = $str .  "\n nat : ".$this->nat;
        $str = $str .  "\n tableau_joueur :".$this->tableau_joueur;
        return $str;
    }
}
?>
