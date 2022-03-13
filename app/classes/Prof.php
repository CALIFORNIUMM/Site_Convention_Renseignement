<?php
    class Prof{
        private $idProf;
        private $nomProf;
        private $prenomProf;
        private $mdpProf;
        private $telProf;
        private $mailProf;

        function __construct(Array $Prof=NULL){
            if($Prof != NULL){
                $this->fill($Prof); 
            }
        }

        //Functions GET
        public function get_idProf(){
            return $this->idProf;
        }

        public function get_nom(){
            return $this->nomProf;
        }

        public function get_prenom(){
            return $this->prenomProf;
        }

        public function get_mdp(){
            return $this->mdpProf;
        }

        public function get_tel(){
            return $this->telProf;
        }

        public function get_mail(){
            return $this->mailProf;
        }

        //Functions SET
        public function set_idProf($idProf){
            $this->idProf = $idProf;
        }

        public function set_nom($nomProf){
            $this->nomProf = $nomProf;
        }

        public function set_prenom($prenomProf){
            $this->prenomProf = $prenomProf;
        }

        public function set_mdp($mdpProf){
            $this->mdpProf = $mdpProf;
        }

        public function set_tel($telProf){
            $this->telProf = $telProf;
        }

        public function set_mail($mailProf){
            $this->$mailProf = $$mailProf;
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