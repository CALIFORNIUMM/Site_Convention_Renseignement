<?php
    class AnneeScolaire{
        private $idAnneeScolaire;
        private $libAnneeScolaire;

        function __construct(Array $Contact=NULL){
            if($Contact != NULL){
                $this->fill($Contact); 
            }
        }

        //Fucntions GET
        public function get_idAnneeScolaire(){
            return $this->idAnneeScolaire;
        }

        public function get_libAnneeScolaire(){
            return $this->libAnneeScolaire;
        }

        //Functions SET
        public function set_idAnneeScolaire($idAnneeScolaire){
            $this->idAnneeScolaire = $idAnneeScolaire;
        }

        public function set_libAnneeScolaire($libAnneeScolaire){
            $this->libAnneeScolaire = $libAnneeScolaire;
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