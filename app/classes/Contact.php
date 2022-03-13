<?php
    class Contact{
        private $idContact;
        private $nomContact;
        private $prenomContact;
        private $telContact;
        private $mailContact;
        private $fctContact;
        private $isgerantContact;
        private $idEntContact;

        function __construct(Array $Contact=NULL){
            if($Contact != NULL){
                $this->fill($Contact); 
            }
        }

        //Fucntions GET
        public function get_idContact(){
            return $this->idContact;
        }

        public function get_nom(){
            return $this->nomContact;
        }

        public function get_prenom(){
            return $this->prenomContact;
        }

        public function get_tel(){
            return $this->telContact;
        }

        public function get_mail(){
            return $this->mailContact;
        }

        public function get_fct(){
            return $this->fctContact;
        }

        public function get_isgerant(){
            return $this->isgerantContact;
        }

        public function get_idEnt(){
            return $this->idEntContact;
        }

        //Fucntions SET
        public function set_idContact($idContact){
            $this->idContact = $idContact;
        }//non utlisé dans 99% des cas

        public function set_nom($nomContact){
            $this->nomContact = $nomContact;
        }

        public function set_prenom($prenomContact){
            $this->prenomContact = $prenomContact;
        }

        public function set_tel($telContact){
            $this->telContact = $telContact;
        }

        public function set_mail($mailContact){
            $this->mailContact = $mailContact;
        }

        public function set_fct($fctContact){
            $this->fctContact = $fctContact;
        }

        public function set_isgerant($isgerantContact){
            $this->isgerantContact = $isgerantContact;
        }

        public function set_idEnt($idEntContact){
            $this->idEntContact = $idEntContact;
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