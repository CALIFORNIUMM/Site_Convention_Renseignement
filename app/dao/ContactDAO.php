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
                    ":nom" => $Contact->get_nomContact(),
                    ":prenom" => $Contact->get_prenomContact(),
                    ":tel" => $Contact->get_telContact(),
                    ":mail" => $Contact->get_mailContact(),
                    ":fct" => $Contact->get_fct_contact(),
                    ":isgerant" => $Contact->get_is_gerant(),
                    ":idEnt" => $Contact->get_idEnt()
                ));
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
        } //PERMET L'INSERTION D'UN NOUVEL Contact

        function findContactByEntreprise($idEnt){
            $sql = "SELECT * FROM contact, entreprise  WHERE entreprise.idEnt= contact.idEnt AND entreprise.idEnt = :idEnt";
            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute(array(":idEnt" => $idEnt));
                $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            $contact = array();
            foreach ($rows as $row) {
                $contact[] = new Contact($row);
            }
            // Retourne un tableau d'objets
            return $contact;
        } // function find()
    }
?>