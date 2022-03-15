<?php
    class EtudiantDAO extends dao 
    {
        function __construct()
        {
            parent::__construct();
        }

        function find($idEtudiant) {
            $sql = "SELECT * FROM Etudiant WHERE idEtudiant= :idEtudiant";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(":idEtudiant" => $idEtudiant));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $etudiant=null;
            if($row) {  
                $etudiant = new Etudiant($row);
            }
            // Retourne l'objet
            return $etudiant;
        } // function find() TROUVE UN SEUL UTILISATEUR

        function findAll() {
            $sql = "SELECT * FROM Etudiant";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute();
                $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $etudiant = array();
            foreach ($rows as $row) {
                $etudiant[] = new Etudiant($row);
            }
            // Retourne un tableau d'objets
            return $etudiant;
        } // function findAll() TROUVE TOUS LES ETUDIANTS

        public function newEtudiant(Etudiant $Etudiant){
            $sql = "INSERT INTO ETUDIANT(nomEtudiant, prenomEtudiant, telEtudiant, mdpEtudiant, dateNaissanceEtudiant, villeAdrEtudiant, numAdrEtudiant,codePostalAdrEtudiant, libAdrEtudiant, dateArriveeEtudiant) VALUES (:nom, :prenom, :tel, :mdp, :dateNaiss, :ville, :numAdr, :cp, :libAdr, :dateArr)";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(
                    ":nom" => $Etudiant->get_nom(),
                    ":prenom" => $Etudiant->get_prenom(),
                    ":tel" => $Etudiant->get_tel(),
                    ":mdp" => $Etudiant->get_mdp(),
                    ":dateNaiss" => $Etudiant->get_dateNaissance(),
                    ":ville" => $Etudiant->get_ville(),
                    ":numAdr" => $Etudiant->get_numAdr(),
                    ":cp" => $Etudiant->get_cp(),
                    ":libAdr" => $Etudiant->get_libAdr(),
                    ":dateArr" => $Etudiant->get_dateArr()
                ));
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
        } //PERMET L'INSERTION D'UN NOUVEL ETUDIANT
    }
?>