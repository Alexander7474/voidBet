<?php
namespace classe;

	class Team
    {
    public $id_equipe;
	public $nom_equipe;
    public $id_coach;
    public $cashprize;
    public $nat;
    public $tableau_joueur;
		
    public function __construct($id_equipe=-1, $nom_equipe='', $id_coach=-1, $cashprize=1000.50, $nat='deutsch', $tableau_joueur=0)
    {
        $this->id_equipe = $id_equipe;
	    $this->nom_equipe = $nom_equipe;
        $this->id_coach = $id_coach;
		$this->cashprize = $cashprize;
        $this->nat = $nat;
        $this->tableau_joueur = $tableau_joueur;
    }

    public function showInfo()
    {
        echo "\n id_equipe : ".$this->id_equipe;
        echo "\n nom_equipe : ".$this->nom_equipe;
        echo "\n id_coach : ".$this->id_coach;
        echo "\n cashprize : ".$this->cashprize;
        echo "\n nat : ".$this->nat;
        echo "\n tableau_joueur :".$this->tableau_joueur;
    }
		
    }
?>
