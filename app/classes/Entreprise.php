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

        public function get_nom(){
            return $this->nomEnt;
        }

        public function get_mission(){
            return $this->missionEnt;
        }

        public function get_tel(){
            return $this->telEnt;
        }

        public function get_mail(){
            return $this->mailEnt;
        }

        public function get_siret(){
            return $this->siretEnt;
        }

        public function get_ville(){
            return $this->villeAdrEnt;
        }

        public function get_numAdr(){
            return $this->numAdrEnt;
        }

        public function get_cp(){
            return $this->codePostalAdrEnt;
        }

        public function get_libAdr(){
            return $this->libAdrEnt;
        }

        //Fucntions SET
        public function set_idEnt($idEnt){
            $this->idEnt = $idEnt;
        }//non utlisé dans 99% des cas

        public function set_nom($nomEnt){
            $this->nomEnt = $nomEnt;
        }

        public function set_mission($missionEnt){
            $this->missionEnt = $missionEnt;
        }

        public function set_tel($telEnt){
            $this->telEnt = $telEnt;
        }

        public function set_mail($mailEnt){
            $this->mailEnt = $mailEnt;
        }

        public function set_siret($siretEnt){
            $this->siretEnt = $siretEnt;
        }

        public function set_ville($villeAdrEnt){
            $this->villeAdrEnt = $villeAdrEnt;
        }

        public function set_numAdr($numAdrEnt){
            $this->numAdrEnt = $numAdrEnt;
        }

        public function set_cp($codePostalAdrEnt){
            $this->codePostalAdrEnt = $codePostalAdrEnt;
        }

        public function set_libAdr($libAdrEnt){
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