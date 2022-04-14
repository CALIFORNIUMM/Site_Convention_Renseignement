<?php
    $title = "Ajout d'un contact";
    include('header.php');

    $prenomContact=isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
    $nomContact=isset($_POST['nom']) ? $_POST['nom'] : NULL;
    $telContact=isset($_POST['tel']) ? $_POST['tel'] : NULL;
    $idEnt=isset($_POST['idEnt']) ? $_POST['idEnt'] : NULL;
    $is_gerant=isset($_POST['is_gerant']) ? $_POST['is_gerant'] : NULL;
    $fct_contact=isset($_POST['fct_contact']) ? $_POST['fct_contact'] : NULL;
    $mailContact=isset($_POST['mail']) ? $_POST['mail'] : NULL;
    
    //DAO des etudiant
    $entreprises = New EntrepriseDAO();
    $entreprises = $entreprises->findAll();

    //messages
    $messages = New Messages("error");
    $flash = New Flash();

    //Vérifie l'inscription
    if(isset($_POST['submit'])){

        if(empty(trim($nomContact))){
            $messages->add_messages("Nom vide");
        }

        if(empty(trim($prenomContact))){
            $messages->add_messages("prenom vide");
        }

        if(empty(trim($idEnt))){
            $messages->add_messages("Entreprise vide");
        }

        if(empty(trim($fct_contact))){
            $messages->add_messages("Fonction vide");
        }

        if(empty(trim($is_gerant))){
            $messages->add_messages("Question vide");
        }


        //Si aucun message Inscription réussie et insertion dans BD
        if($messages->is_empty() == TRUE){
            $values = array(
                'nomContact' => $nomContact,
                'prenomContact' => $prenomContact,
                'telContact' => $telContact,
                'mailContact' => $mailContact,
                'fct_contact' => $fct_contact,
                'is_gerant' => $is_gerant,   
                'idEnt' => $idEnt    
            );
            $contact = new Contact($values);
            $ncontact = new ContactDAO();
            $ncontact = $ncontact->newContact($contact);
            $flash->set_type('succes')->add_messages('Vous avez bien ajouté le contact : '.$contact->get_nomContact().'')->put();
            header("Location: index.php");
        }
    }
?>
<h1>Etudiant</h1>
<h2>Ajout d'un contact</h2>
<?php 
    if($messages->is_empty() == FALSE){
        $messages->afficher();
    }
?>

<form method="POST">

    <label for="prenom">Prénom contact</label><br>
    <input type="text" id="prenom" name="prenom" value="<?= $prenomContact ?>"><br><br>

    <label for="nom">Nom contact</label><br>
    <input type="text" id="nom" name="nom" value="<?= $nomContact ?>"><br><br>

    <label for="tel">Téléphone contact</label><br>
    <input type="text" id="tel" name="tel" value="<?= $telContact ?>"><br><br>

    <label for="mailEnt">Mail contact</label><br>
    <input type="mail" name="mail" id="mail" value="<?= $mailContact ?>"><br><br>

    <label for="idEnt">Entreprise du contact</label><br>
    <select name="idEnt" id="idEnt">
        <option value=""selected>--Please choose an option--</option>
        <?php
            foreach($entreprises as $entreprisee){
                $selected = NULL;
                if($idEnt == $entreprisee->get_idEnt()){
                    $selected = "idEnt";
                }else{
                    $selected = NULL;
                }
                echo "<option value=\"".$entreprisee->get_idEnt()."\" $selected>".$entreprisee->get_nomEnt()."</option>";
            }
        ?>
    </select><br><br>

    <label for="fct_contact">Fonction contact</label><br>
    <input type="text" name="fct_contact" id="fct_contact" value="<?= $fct_contact ?>"><br><br>    

    <label for="is_gerant">Ce contact est-il gérant de l'entreprise ?</label><br>
    <select name="is_gerant" id="is_gerant">
        <option value=""selected>--Please choose an option--</option>
        <option value="Oui">Oui</option>
        <option value="Non">Non</option>
    </select><br><br>
    
    <input name="submit" type="submit" id="submit" value="Ajouter le contact">
</form>
<?php include('footer.php'); ?>