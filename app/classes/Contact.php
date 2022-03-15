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

        public function get_nomContact(){
            return $this->nomContact;
        }

        public function get_prenomContact(){
            return $this->prenomContact;
        }

        public function get_telContact(){
            return $this->telContact;
        }

        public function get_mailContact(){
            return $this->mailContact;
        }

        public function get_fct_contact(){
            return $this->fctContact;
        }

        public function get_is_gerant(){
            return $this->isgerantContact;
        }

        public function get_idEnt(){
            return $this->idEntContact;
        }

        //Fucntions SET
        public function set_idContact($idContact){
            $this->idContact = $idContact;
        }//non utlisé dans 99% des cas

        public function set_nomContact($nomContact){
            $this->nomContact = $nomContact;
        }

        public function set_prenomContact($prenomContact){
            $this->prenomContact = $prenomContact;
        }

        public function set_telContact($telContact){
            $this->telContact = $telContact;
        }

        public function set_mailContact($mailContact){
            $this->mailContact = $mailContact;
        }

        public function set_fct_contact($fctContact){
            $this->fctContact = $fctContact;
        }

        public function set_is_gerant($isgerantContact){
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