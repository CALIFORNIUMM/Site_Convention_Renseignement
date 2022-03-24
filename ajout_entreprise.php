<?php
    $title = "Ajout d'une entreprise";
    include('header.php'); 
    
    $nomEnt=isset($_POST['nom']) ? $_POST['nom'] : NULL;
    $mission=isset($_POST['mission']) ? $_POST['mission'] : NULL;
    $numAdrEnt=isset($_POST['numAdrEnt']) ? $_POST['numAdrEnt'] : NULL;
    $codePostalEnt=isset($_POST['cp']) ? $_POST['cp'] : NULL;
    $villeAdrEnt=isset($_POST['ville']) ? $_POST['ville'] : NULL;
    $mailEnt=isset($_POST['mailEnt']) ? $_POST['mailEnt'] : NULL;
    $libAdrEnt=isset($_POST['libAdrEnt']) ? $_POST['libAdrEnt'] : NULL;
    $siretEnt=isset($_POST['siretEnt']) ? $_POST['siretEnt'] : NULL;
    $telephoneEnt=isset($_POST['tel']) ? $_POST['tel'] : NULL;
    
    //DAO des etudiant
    $entreprise = New EntrepriseDAO();

    //messages
    $messages = New Messages("error");
    $flash = New Flash();

    //Vérifie l'inscription
    if(isset($_POST['submit'])){

        if(empty(trim($nomEnt))){
            $messages->add_messages("Nom vide");
        }

        if(empty(trim($mission))){
            $messages->add_messages("Mission vide");
        }

        if(empty(trim($numAdrEnt))){
            $messages->add_messages("Numéro adresse vide");
        }

        if(empty(trim($libAdrEnt))){
            $messages->add_messages("Libellé adresse vide");
        }

        if(empty(trim($codePostalEnt))){
            $messages->add_messages("Code postal vide");
        }

        if(empty(trim($villeAdrEnt))){
            $messages->add_messages("Ville vide");
        }

        if(empty(trim($siretEnt))){
            $messages->add_messages("Siret vide");
        }

    
        //Si aucun message Inscription réussie et insertion dans BD
        if($messages->is_empty() == TRUE){
            $values = array(
                'nomEnt' => $nomEnt,
                'missionEnt' => $mission,
                'numAdrEnt' => $numAdrEnt,
                'libAdrEnt' => $libAdrEnt,
                'codePostalEnt' => $codePostalEnt,
                'villeAdrEnt' => $villeAdrEnt,
                'telephoneEnt' => $telephoneEnt,
                'mailEnt' => $mailEnt,
                'siretEnt' => $siretEnt           
            );
            $entreprise = new Entreprise($values);
            $nentreprise = new EntrepriseDAO();
            $nentreprise = $nentreprise->newEnt($entreprise);
            $flash->set_type('succes')->add_messages('Vous avez bien ajouté l\'entreprise : '.$entreprise->get_nomEnt().'')->put();
            header("Location: index.php");
        }
    }
?>
<h1>Etudiant</h1>
<h2>Ajout d'une entreprise</h2>
<?php 
    if($messages->is_empty() == FALSE){
        $messages->afficher();
    }
?>

<form method="POST">

    <label for="nom">Nom entreprise</label><br>
    <input type="text" id="nom" name="nom" value="<?= $nomEnt ?>"><br><br>

    <label for="mission">Mission entreprise</label><br>
    <input type="text" id="mission" name="mission" value="<?= $mission ?>"><br><br>

    <label for="numAdrEnt">Numéro adresse entreprise</label><br>
    <input type="text" name="numAdrEnt" id="numAdrEnt" value="<?= $numAdrEnt ?>"><br><br>  

    <label for="libAdrEnt">Libellé adresse entreprise</label><br>
    <input type="text" name="libAdrEnt" id="libAdrEnt" value="<?= $libAdrEnt ?>"><br><br>

    <label for="cp">Code postal entreprise</label><br>
    <input type="text" name="cp" id="cp" value="<?= $codePostalEnt ?>"><br><br>

    <label for="ville">Ville entreprise</label><br>
    <input type="text" name="ville" id="ville" value="<?= $villeAdrEnt ?>"><br><br>

    <label for="mailEnt">Mail entreprise</label><br>
    <input type="mail" name="mailEnt" id="mailEnt" value="<?= $mailEnt ?>"><br><br>

    <label for="tel">Téléphone entreprise</label><br>
    <input type="text" id="tel" name="tel" value="<?= $telephoneEnt ?>"><br><br>

    <label for="siretEnt">siret entreprise</label><br>
    <input type="text" name="siretEnt" id="siretEnt" value="<?= $siretEnt ?>"><br><br>
    
    <input name="submit" type="submit" id="submit" value="Ajouter l'entreprise">
</form>
<?php include('footer.php'); ?>