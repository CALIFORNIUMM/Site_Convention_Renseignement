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
                    ":nom" => $Prof->get_nom(),
                    ":prenom" => $Prof->get_prenom(),
                    ":mdp" => $Prof->get_mdp(),
                    ":tel" => $Prof->get_tel(),
                    ":mail" => $Prof->get_mail()
                ));
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
        } //PERMET L'INSERTION D'UN NOUVEL Prof
    }
?>