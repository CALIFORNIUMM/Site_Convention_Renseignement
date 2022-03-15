<?php
    class Stage{
        private $idStage;
        private $titreStage;
        private $descriptifStage;
        private $dateDebutStage;
        private $dateFinStage;
        private $dureeHebdoStage;
        private $isPremiereAnnee;
        private $idProfStage;
        private $idEtudiantStage;
        private $idAnneeScolaireStage;
        private $idEntStage;
        private $idContactStage;

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

        public function get_isPremiereAnne(){
            return $this->isPremiereAnnee;
        }

        public function get_idProfStage(){
            return $this->idProfStage;
        }

        public function get_idEtudiantStage(){
            return $this->idEtudiantStage;
        }

        public function get_idAnneeScolaireStage(){
            return $this->idAnneeScolaireStage;
        }

        public function get_idEntStage(){
            return $this->idEntStage;
        }
        
        public function get_idContactStage(){
            return $this->idContactStage;
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

        public function set_idProfStage($idProfStage){
                $this->idProfStage = $idProfStage;               
        }      

        public function set_idEtudiantStage($idEtudiantStage){
                $this->idEtudiantStage = $idEtudiantStage;               
        }

        public function set_idAnneeScolaireStage($idAnneeScolaireStage){
                $this->idAnneeScolaireStage = $idAnneeScolaireStage;    
        }

        public function set_idEntStage($idEntStage){
                $this->idEntStage = $idEntStage;        
        }
       
        public function set_idContactStage($idContactStage){
                $this->idContactStage = $idContactStage;
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