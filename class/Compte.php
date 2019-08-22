<?php
    class Compte
    {
        private $solde = 0;

        // public function __construct($solde)
        // {
        //     $this->solde=$solde;
        // }

        public function deposer(int $montant)
        {
            $this->solde+= $montant;
        }

        public function retirer(int $montant)
        {
            $this->solde-= $montant;
        }

        public function virerVers(int $montant, Compte $cptDestinationCompte)
        {
            $this->retirer($montant);
            $cptDestinationCompte->deposer($montant);
        }

        public function afficher()
        {
            echo "solde : " . $this->solde;
        }
    }
