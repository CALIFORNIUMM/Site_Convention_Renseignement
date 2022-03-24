<?php
    class ProfDAO extends dao 
    {
        function __construct()
        {
            parent::__construct();
        }

        function find($idProf) {
            $sql = "SELECT * FROM Prof WHERE idProf= :idProf";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(":idProf" => $idProf));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Prof=null;
            if($row) {  
                $Prof = new Prof($row);
            }
            // Retourne l'objet
            return $Prof;
        } // function find() TROUVE UN SEUL UTILISATEUR

        function findAll() {
            $sql = "SELECT * FROM Prof";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute();
                $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Prof = array();
            foreach ($rows as $row) {
                $Prof[] = new Prof($row);
            }
            // Retourne un tableau d'objets
            return $Prof;
        } // function findAll() TROUVE TOUS LES ProfS

        public function newProf(Prof $Prof){
            $sql = "INSERT INTO Prof(nomProf, prenomProf, mdpProf, telProf, mailProf) VALUES (:nom, :prenom, :mdp, :tel, :mail)";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(
                    ":nom" => $Prof->get_nomProf(),
                    ":prenom" => $Prof->get_prenomProf(),
                    ":mdp" => $Prof->get_mdpProf(),
                    ":tel" => $Prof->get_telProf(),
                    ":mail" => $Prof->get_mailProf()
                ));
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
        } //PERMET L'INSERTION D'UN NOUVEL Prof

        public function isExistPseudo($pseudo){
            $sql = "SELECT count(*) as nb FROM Prof WHERE pseudoProf = :pseudo";
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

        function connexionProf($pseudo){
            $sql = "SELECT idProf, mdpProf FROM Prof WHERE pseudoProf = :pseudo";
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