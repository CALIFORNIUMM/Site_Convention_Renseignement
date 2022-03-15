<?php
    class AnneeScolaireDAO extends dao 
    {
        function __construct()
        {
            parent::__construct();
        }

        function find($idAnneeScolaire) {
            $sql = "SELECT * FROM AnneeScolaire WHERE idAnneeScolaire= :idAnneeScolaire";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(":idAnneeScolaire" => $idAnneeScolaire));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $AnneeScolaire=null;
            if($row) {  
                $AnneeScolaire = new AnneeScolaire($row);
            }
            // Retourne l'objet
            return $AnneeScolaire;
        } // function find() TROUVE UN SEUL UTILISATEUR

        function findAll() {
            $sql = "SELECT * FROM AnneeScolaire";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute();
                $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $AnneeScolaire = array();
            foreach ($rows as $row) {
                $AnneeScolaire[] = new AnneeScolaire($row);
            }
            // Retourne un tableau d'objets
            return $AnneeScolaire;
        } // function findAll() TROUVE TOUS LES AnneeScolaireS

        public function newAnneeScolaire(AnneeScolaire $AnneeScolaire){
            $sql = "INSERT INTO AnneeScolaire(libAnneeScolaire) VALUES (:libAnneeScolaire)";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(
                    ":libAnneeScolaire" => $AnneeScolaire->get_libAnneeScolaire()
                ));
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
        } //PERMET L'INSERTION D'UN NOUVEL AnneeScolaire
    }
?>