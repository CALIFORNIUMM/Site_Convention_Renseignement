<?php
    class ContactDAO extends dao 
    {
        function __construct()
        {
            parent::__construct();
        }

        function find($idContact) {
            $sql = "SELECT * FROM Contact WHERE idContact= :idContact";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(":idContact" => $idContact));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Contact=null;
            if($row) {  
                $Contact = new Contact($row);
            }
            // Retourne l'objet
            return $Contact;
        } // function find() TROUVE UN SEUL UTILISATEUR

        function findAll() {
            $sql = "SELECT * FROM Contact";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute();
                $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $Contact = array();
            foreach ($rows as $row) {
                $Contact[] = new Contact($row);
            }
            // Retourne un tableau d'objets
            return $Contact;
        } // function findAll() TROUVE TOUS LES ContactS

        public function newContact(Contact $Contact){
            $sql = "INSERT INTO Contact(nomContact, prenomContact, telContact, mailContact, fct_contact, is_gerant, idEnt) VALUES (:nom, :prenom, :tel, :mail, :fct, :isgerant, :idEnt)";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(
                    ":nom" => $Contact->get_nom(),
                    ":prenom" => $Contact->get_prenom(),
                    ":tel" => $Contact->get_tel(),
                    ":mail" => $Contact->get_mail(),
                    ":fct" => $Contact->get_fct(),
                    ":isgerant" => $Contact->get_isgerant(),
                    ":idEnt" => $Contact->get_idEnt()
                ));
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
        } //PERMET L'INSERTION D'UN NOUVEL Contact
    }
?>