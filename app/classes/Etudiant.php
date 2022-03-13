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

        function __construct(Array $Etudiant=NULL){
            if($Etudiant != NULL){
                $this->fill($Etudiant); 
            }
        }

        //Fucntions GET
        public function get_idEtudiant(){
            return $this->idEtudiant;
        }

        public function get_nom(){
            return $this->nomEtudiant;
        }

        public function get_prenom(){
            return $this->prenomEtudiant;
        }

        public function get_tel(){
            return $this->telEtudiant;
        }

        public function get_mdp(){
            return $this->mdpEtudiant;
        }

        public function get_dateNaissance(){
            return $this->dateNaissanceEtudiant;
        }

        public function get_ville(){
            return $this->villeAdrEtudiant;
        }

        public function get_numAdr(){
            return $this->numAdrEtudiant;
        }

        public function get_cp(){
            return $this->codePostalAdrEtudiant;
        }

        public function get_libAdr(){
            return $this->libAdrEtudiant;
        }

        public function get_dateArr(){
            return $this->dateArriveeEtudiant;
        }

        //Fucntions SET
        public function set_idEtudiant($idEtudiant){
            $this->idEtudiant = $idEtudiant;
        }//non utlisé dans 99% des cas

        public function set_nom($nomEtudiant){
            $this->nomEtudiant = $nomEtudiant;
        }

        public function set_prenom($prenomEtudiant){
            $this->prenomEtudiant = $prenomEtudiant;
        }

        public function set_tel($telEtudiant){
            $this->telEtudiant = $telEtudiant;
        }

        public function set_mdp($mdpEtudiant){
            $this->mdpEtudiant = $mdpEtudiant;
        }

        public function set_dateNaissance($dateNaissanceEtudiant){
            $this->dateNaissanceEtudiant = $dateNaissanceEtudiant;
        }

        public function set_ville($villeAdrEtudiant){
            $this->villeAdrEtudiant = $villeAdrEtudiant;
        }

        public function set_numAdr($numAdrEtudiant){
            $this->numAdrEtudiant = $numAdrEtudiant;
        }

        public function set_cp($codePostalAdrEtudiant){
            $this->codePostalAdrEtudiant = $codePostalAdrEtudiant;
        }

        public function set_libAdr($libAdrEtudiant){
            $this->libAdrEtudiant = $libAdrEtudiant;
        }

        public function set_dateArr($dateArriveeEtudiant){
            $this->dateArriveeEtudiant = $dateArriveeEtudiant;
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