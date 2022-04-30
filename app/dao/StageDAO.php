<?php
    class StageDAO extends dao 
    {
        function __construct()
        {
            parent::__construct();
        }

        function find($idStage) {
            $sql = "SELECT * FROM Stage WHERE idStage= :idStage";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(":idStage" => $idStage));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Stage=null;
            if($row) {  
                $Stage = new Stage($row);
            }
            // Retourne l'objet
            return $Stage;
        } // function find() TROUVE UN SEUL UTILISATEUR

        function findAll() {
            $sql = "SELECT * FROM Stage";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute();
                $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Stage = array();
            foreach ($rows as $row) {
                $Stage[] = new Stage($row);
            }
            // Retourne un tableau d'objets
            return $Stage;
        } // function findAll() TROUVE TOUS LES StageS

        public function newStage(Stage $Stage){
            $sql = "INSERT INTO stage (titreStage, descriptifStage, dateDebutStage, dateFinStage, dureeHebdoStage, idProf, idEtudiant, idAnneeScolaire, idEnt, idContact, isPremiereAnnee) VALUES (:titre, :descriptif, :dateDebut, :DateFin, :duree, :idProf, :idEtudiant, :idAnneeScolaire, :idEnt, :idContact, :isPremiereAnnee)";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(
                    ":titre" => $Stage->get_titreStage(),
                    ":descriptif" => $Stage->get_descriptifStage(),
                    ":dateDebut" => $Stage->get_dateDebutStage(),
                    ":DateFin" => $Stage->get_dateFinStage(),
                    ":duree" => $Stage->get_dureeHebdoStage(),
                    ":idProf" => $Stage->get_idProf(),
                    ":idEtudiant" => $Stage->get_idEtudiant(),
                    ":idAnneeScolaire" => $Stage->get_idAnneeScolaire(),
                    ":idEnt" => $Stage->get_idEnt(),
                    ":idContact" => $Stage->get_idContact(),
                    ":isPremiereAnnee" => $Stage->get_isPremiereAnnee()
                ));
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
        } //PERMET L'INSERTION D'UN NOUVEL Stage

        public function findAllByIdEtudiant($idEtudiant) {
            $sql = "SELECT * FROM Stage WHERE idEtudiant= :idEtudiant";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(":idEtudiant" => $idEtudiant));
                $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Stage = array();
            foreach ($rows as $row) {
                $Stage[] = new Stage($row);
            }
            // Retourne un tableau d'objets
            return $Stage;
        } // function findAll() TROUVE TOUS LES StageS

        public function findNomEntByIdEnt($idEnt) {
            $sql = "SELECT nomEnt FROM Entreprise WHERE idEnt = :idEnt";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(":idEnt" => $idEnt));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Stage=null;
            if($row) {  
                $Stage = new Stage($row);
            }
            // Retourne l'objet
            return $Stage;
        } // function find() TROUVE UN SEUL UTILISATEUR
    }
?>