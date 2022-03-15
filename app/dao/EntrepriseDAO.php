<?php
    class EntrepriseDAO extends dao 
    {
        function __construct()
        {
            parent::__construct();
        }

        function find($idEnt) {
            $sql = "SELECT * FROM Entreprise WHERE idEnt= :idEnt";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(":idEnt" => $idEnt));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Ent=null;
            if($row) {  
                $Ent = new Entreprise($row);
            }
            // Retourne l'objet
            return $Ent;
        } // function find() TROUVE UN SEUL UTILISATEUR

        function findAll() {
            $sql = "SELECT * FROM Entreprise";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute();
                $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Ent = array();
            foreach ($rows as $row) {
                $Ent[] = new Entreprise($row);
            }
            // Retourne un tableau d'objets
            return $Ent;
        } // function findAll() TROUVE TOUS LES EntS

        public function newEnt(Entreprise $Ent){
            $sql = "INSERT INTO Ent(nomEnt, missionEnt, numAdrEnt, libAdrEnt, codePostalEnt, villeAdrEnt, telephoneEnt, mailEnt, siretEnt) VALUES (:nom, :mission, :numAdr, :libAdr, :cp, :ville, :tel, :mail, :siret)";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(
                    ":nom" => $Ent->get_nomEnt(),
                    ":mission" => $Ent->get_mailEnt(),
                    ":numAdr" => $Ent->get_numAdrEnt(),
                    ":libAdr" => $Ent->get_libAdrEnt(),
                    ":cp" => $Ent->get_codePostalEnt(),
                    ":ville" => $Ent->get_villeAdrEnt(),
                    ":tel" => $Ent->get_telephoneEnt(),
                    ":mail" => $Ent->get_mailEnt(),
                    ":siret" => $Ent->get_siretEnt(),
                ));
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
        } //PERMET L'INSERTION D'UN NOUVEL Ent
    }
?>