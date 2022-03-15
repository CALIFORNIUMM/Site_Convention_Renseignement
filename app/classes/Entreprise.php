<?php
    class Entreprise{
        private $idEnt;
        private $nomEnt;
        private $missionEnt;
        private $numAdrEnt;
        private $libAdrEnt;
        private $codePostalAdrEnt;
        private $villeAdrEnt;
        private $telEnt;
        private $mailEnt;
        private $siretEnt;

        function __construct(Array $Ent=NULL){
            if($Ent != NULL){
                $this->fill($Ent); 
            }
        }

        //Fucntions GET
        public function get_idEnt(){
            return $this->idEnt;
        }

        public function get_nomEnt(){
            return $this->nomEnt;
        }

        public function get_missionEnt(){
            return $this->missionEnt;
        }

        public function get_telephoneEnt(){
            return $this->telEnt;
        }

        public function get_mailEnt(){
            return $this->mailEnt;
        }

        public function get_siretEnt(){
            return $this->siretEnt;
        }

        public function get_villeAdrEnt(){
            return $this->villeAdrEnt;
        }

        public function get_numAdrEnt(){
            return $this->numAdrEnt;
        }

        public function get_codePostalEnt(){
            return $this->codePostalAdrEnt;
        }

        public function get_libAdrEnt(){
            return $this->libAdrEnt;
        }

        //Fucntions SET
        public function set_idEnt($idEnt){
            $this->idEnt = $idEnt;
        }//non utlisé dans 99% des cas

        public function set_nomEnt($nomEnt){
            $this->nomEnt = $nomEnt;
        }

        public function set_missionEnt($missionEnt){
            $this->missionEnt = $missionEnt;
        }

        public function set_telephoneEnt($telEnt){
            $this->telEnt = $telEnt;
        }

        public function set_mailEnt($mailEnt){
            $this->mailEnt = $mailEnt;
        }

        public function set_siretEnt($siretEnt){
            $this->siretEnt = $siretEnt;
        }

        public function set_villeAdrEnt($villeAdrEnt){
            $this->villeAdrEnt = $villeAdrEnt;
        }

        public function set_numAdrEnt($numAdrEnt){
            $this->numAdrEnt = $numAdrEnt;
        }

        public function set_codePostalEnt($codePostalAdrEnt){
            $this->codePostalAdrEnt = $codePostalAdrEnt;
        }

        public function set_libAdrEnt($libAdrEnt){
            $this->libAdrEnt = $libAdrEnt;
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