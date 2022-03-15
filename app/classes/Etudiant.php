<?php
    class Etudiant{
        private $idEtudiant;
        private $nomEtudiant;
        private $prenomEtudiant;
        private $telEtudiant;
        private $mdpEtudiant;
        private $dateNaissanceEtudiant;
        private $villeAdrEtudiant;
        private $numAdrEtudiant;
        private $codePostalAdrEtudiant;
        private $libAdrEtudiant;
        private $dateArriveeEtudiant;
        private $pseudoEtudiant;

        function __construct(Array $Etudiant=NULL){
            if($Etudiant != NULL){
                $this->fill($Etudiant); 
            }
        }

        //Fucntions GET
        public function get_idEtudiant(){
            return $this->idEtudiant;
        }

        public function get_nomEtudiant(){
            return $this->nomEtudiant;
        }

        public function get_prenomEtudiant(){
            return $this->prenomEtudiant;
        }

        public function get_telEtudiant(){
            return $this->telEtudiant;
        }

        public function get_mdpEtudiant(){
            return $this->mdpEtudiant;
        }

        public function get_dateNaissanceEtudiant(){
            return $this->dateNaissanceEtudiant;
        }

        public function get_villeAdrEtudiant(){
            return $this->villeAdrEtudiant;
        }

        public function get_numAdrEtudiant(){
            return $this->numAdrEtudiant;
        }

        public function get_codePostalAdrEtudiant(){
            return $this->codePostalAdrEtudiant;
        }

        public function get_libAdrEtudiant(){
            return $this->libAdrEtudiant;
        }

        public function get_dateArriveeEtudiant(){
            return $this->dateArriveeEtudiant;
        }

        public function get_pseudoEtudiant(){
            return $this->pseudoEtudiant;
        }

        //Fucntions SET
        public function set_idEtudiant($idEtudiant){
            $this->idEtudiant = $idEtudiant;
        }//non utlisé dans 99% des cas

        public function set_nomEtudiant($nomEtudiant){
            $this->nomEtudiant = $nomEtudiant;
        }

        public function set_prenomEtudiant($prenomEtudiant){
            $this->prenomEtudiant = $prenomEtudiant;
        }

        public function set_telEtudiant($telEtudiant){
            $this->telEtudiant = $telEtudiant;
        }

        public function set_mdpEtudiant($mdpEtudiant){
            $this->mdpEtudiant = $mdpEtudiant;
        }

        public function set_dateNaissanceEtudiant($dateNaissanceEtudiant){
            $this->dateNaissanceEtudiant = $dateNaissanceEtudiant;
        }

        public function set_villeAdrEtudiant($villeAdrEtudiant){
            $this->villeAdrEtudiant = $villeAdrEtudiant;
        }

        public function set_numAdrEtudiant($numAdrEtudiant){
            $this->numAdrEtudiant = $numAdrEtudiant;
        }

        public function set_codePostalAdrEtudiant($codePostalAdrEtudiant){
            $this->codePostalAdrEtudiant = $codePostalAdrEtudiant;
        }

        public function set_libAdrEtudiant($libAdrEtudiant){
            $this->libAdrEtudiant = $libAdrEtudiant;
        }

        public function set_dateArriveeEtudiant($dateArriveeEtudiant){
            $this->dateArriveeEtudiant = $dateArriveeEtudiant;
        }

        public function set_pseudoEtudiant($pseudoEtudiant){
            $this->pseudoEtudiant = $pseudoEtudiant;
        }

        //Function de fill sur les setter
        public function fill(array $tableau){
            foreach($tableau as $key => $valeur){
                $methode = 'set_'.$key;
                if(method_exists($this, $methode)){
                    $this->$methode($valeur);
                }
            }
        }

    }
?>