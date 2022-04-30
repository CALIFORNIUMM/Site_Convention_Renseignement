<?php
    class Stage{
        private $idStage;
        private $titreStage;
        private $descriptifStage;
        private $dateDebutStage;
        private $dateFinStage;
        private $dureeHebdoStage;
        private $isPremiereAnnee;
        private $idProf;
        private $idEtudiant;
        private $idAnneeScolaire;
        private $idEnt;
        private $idContact;

        function __construct(Array $Prof=NULL){
            if($Prof != NULL){
                $this->fill($Prof); 
            }
        }

        //Functions GET
        public function get_idStage(){
            return $this->idStage;
        }

        public function get_titreStage(){
            return $this->titreStage;
        }

        public function get_descriptifStage(){
            return $this->descriptifStage;
        }

        public function get_dateDebutStage(){
            return $this->dateDebutStage;
        }

        public function get_dateFinStage(){
            return $this->dateFinStage;
        }

        public function get_dureeHebdoStage(){
            return $this->dureeHebdoStage;
        }

        public function get_isPremiereAnnee(){
            return $this->isPremiereAnnee;
        }

        public function get_idProf(){
            return $this->idProf;
        }

        public function get_idEtudiant(){
            return $this->idEtudiant;
        }

        public function get_idAnneeScolaire(){
            return $this->idAnneeScolaire;
        }

        public function get_idEnt(){
            return $this->idEnt;
        }
        
        public function get_idContact(){
            return $this->idContact;
        }

        //Functions SET
        public function set_idStage($idStage){
                $this->idStage = $idStage;         
        }

        public function set_titreStage($titreStage){
                $this->titreStage = $titreStage;        
        } 

        public function set_descriptifStage($descriptifStage){
                $this->descriptifStage = $descriptifStage;            
        }

        public function set_dateDebutStage($dateDebutStage){
                $this->dateDebutStage = $dateDebutStage;        
        }
  
        public function set_dateFinStage($dateFinStage){
                $this->dateFinStage = $dateFinStage;        
        }     

        public function set_dureeHebdoStage($dureeHebdoStage){
                $this->dureeHebdoStage = $dureeHebdoStage;           
        } 
        
        public function set_isPremiereAnnee($isPremiereAnnee){
            $this->isPremiereAnnee = $isPremiereAnnee;           
    }

        public function set_idProf($idProf){
                $this->idProf = $idProf;               
        }      

        public function set_idEtudiant($idEtudiant){
                $this->idEtudiant = $idEtudiant;               
        }

        public function set_idAnneeScolaire($idAnneeScolaire){
                $this->idAnneeScolaire = $idAnneeScolaire;    
        }

        public function set_idEnt($idEnt){
                $this->idEnt = $idEnt;        
        }
       
        public function set_idContact($idContact){
                $this->idContact = $idContact;
        }

        //Function de fill sur les set_ter
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