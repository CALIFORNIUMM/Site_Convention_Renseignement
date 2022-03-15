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
            $sql = "INSERT INTO ETUDIANT(nomEtudiant, prenomEtudiant, telEtudiant, mdpEtudiant, dateNaissanceEtudiant, villeAdrEtudiant, numAdrEtudiant,codePostalAdrEtudiant, libAdrEtudiant, dateArriveeEtudiant, pseudoEtudiant) VALUES (:nom, :prenom, :tel, :mdp, :dateNaiss, :ville, :numAdr, :cp, :libAdr, :dateArr, :pseudo)";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(
                    ":nom" => $Etudiant->get_nomEtudiant(),
                    ":prenom" => $Etudiant->get_prenomEtudiant(),
                    ":tel" => $Etudiant->get_telEtudiant(),
                    ":mdp" => $Etudiant->get_mdpEtudiant(),
                    ":dateNaiss" => $Etudiant->get_dateNaissanceEtudiant(),
                    ":ville" => $Etudiant->get_villeAdrEtudiant(),
                    ":numAdr" => $Etudiant->get_numAdrEtudiant(),
                    ":cp" => $Etudiant->get_codePostalAdrEtudiant(),
                    ":libAdr" => $Etudiant->get_libAdrEtudiant(),
                    ":dateArr" => $Etudiant->get_dateArriveeEtudiant(),
                    "pseudo" => $Etudiant->get_pseudoEtudiant()
                ));
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
        } //PERMET L'INSERTION D'UN NOUVEL ETUDIANT

        public function isExistPseudo($pseudo){
            $sql = "SELECT count(*) as nb FROM Etudiant WHERE pseudoEtudiant = :pseudo";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(
                    ":pseudo" => $pseudo
                ));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $nb=null;
            if($row) {
                if($row['nb'] == 0){
                    $nb = FALSE;
                }else{
                    $nb = TRUE;
                }
            }
            // Retourne un tableau d'objets
            return $nb;
        }

        function connexionEtudiant($pseudo){
            $sql = "SELECT idEtudiant, mdpEtudiant FROM Etudiant WHERE pseudoEtudiant = :pseudo";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(
                    ":pseudo" => $pseudo
                ));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $infos=null;
            if($row) {
                $infos = $row;
            }
            // Retourne un tableau d'objets
            return $infos;
        }
    }
?>