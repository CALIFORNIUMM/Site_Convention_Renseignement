<?php
    class Prof{
        private $idProf;
        private $nomProf;
        private $prenomProf;
        private $mdpProf;
        private $telProf;
        private $mailProf;
        private $pseudoProf;

        function __construct(Array $Prof=NULL){
            if($Prof != NULL){
                $this->fill($Prof); 
            }
        }

        //Functions GET
        public function get_idProf(){
            return $this->idProf;
        }

        public function get_nomProf(){
            return $this->nomProf;
        }

        public function get_prenomProf(){
            return $this->prenomProf;
        }

        public function get_mdpProf(){
            return $this->mdpProf;
        }

        public function get_telProf(){
            return $this->telProf;
        }

        public function get_mailProf(){
            return $this->mailProf;
        }

        public function get_pseudoProf(){
            return $this->pseudoProf;
        }

        //Functions SET
        public function set_idProf($idProf){
            $this->idProf = $idProf;
        }

        public function set_nomProf($nomProf){
            $this->nomProf = $nomProf;
        }

        public function set_prenomProf($prenomProf){
            $this->prenomProf = $prenomProf;
        }

        public function set_mdpProf($mdpProf){
            $this->mdpProf = $mdpProf;
        }

        public function set_telProf($telProf){
            $this->telProf = $telProf;
        }

        public function set_mailProf($mailProf){
            $this->$mailProf = $mailProf;
        }

        public function set_pseudoProf($pseudoProf){
            $this->pseudoProf = $pseudoProf;
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