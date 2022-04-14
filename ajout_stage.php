<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<?php
    $title = "Ajout d'un stage";
    include('header.php'); 
    
    $titreStage=isset($_POST['titre']) ? $_POST['titre'] : NULL;
    $descriptifStage=isset($_POST['desc']) ? $_POST['desc'] : NULL;
    $dateDebutStage=isset($_POST['dateD']) ? $_POST['dateD'] : NULL;
    $dateFinStage=isset($_POST['dateF']) ? $_POST['dateF'] : NULL;
    $dureeHebdoStage=isset($_POST['duree']) ? $_POST['duree'] : NULL;
    $isPremiereAnnee=isset($_POST['isPremiereAnnee']) ? $_POST['isPremiereAnnee'] : NULL;
    $idProf=isset($_POST['idProf']) ? $_POST['idProf'] : NULL;
    $idEtudiant=isset($_POST['idEtudiant']) ? $_POST['idEtudiant'] : NULL;
    $idAnneeScolaire=isset($_POST['idAnneeScolaire']) ? $_POST['idAnneeScolaire'] : NULL;
    $idEnt=isset($_POST['idEnt']) ? $_POST['idEnt'] : NULL;
    $idContact=isset($_POST['idContact']) ? $_POST['idContact'] : NULL;
    
    
    
    //DAO des stages
    $stage = New StageDAO();

    $entreprises = New EntrepriseDAO();
    $entreprises = $entreprises->findAll();

    $profs = new ProfDAO();
    $profs = $profs->findAll();

    $annees = new AnneeScolaireDAO();
    $annees = $annees->findAll();

    //messages
    $messages = New Messages("error");
    $flash = New Flash();

    //Vérifie l'inscription
    if(isset($_POST['submit'])){

        if(empty(trim($titreStage))){
            $messages->add_messages("Titre du stage vide.");
        }

        if(empty(trim($descriptifStage))){
            $messages->add_messages("Descriptif du stage vide.");
        }

        if(empty(trim($dateDebutStage))){
            $messages->add_messages("Date de début du stage vide.");
        }

        if(empty(trim($dateFinStage))){
            $messages->add_messages("Date de fin du stage vide.");
        }

        if(empty(trim($dureeHebdoStage))){
            $messages->add_messages("La durée hebdomadaire du stage est vide.");
        }

        if(empty(trim($isPremiereAnnee))){
            $messages->add_messages("La question est vide.");
        }

        if(empty(trim($idProf))){
            $messages->add_messages("Vous n'avez pas choisi d'enseignant.");
        }

        if(empty(trim($idEnt))){
            $messages->add_messages("Vous n'avez pas choisi d'entreprise.");
        }

        if(empty(trim($idContact))){
            $messages->add_messages("Vous n'avez pas choisi de contact.");
        }

    
        //Si aucun message Inscription réussie et insertion dans BD
        if($messages->is_empty() == TRUE){
            $values = array(
                'titreStage' => $titreStage,
                'descriptifStage' => $descriptifStage,
                'dateDebutStage' => $dateDebutStage,
                'dateFinStage' => $dateFinStage,
                'dureeHebdoStage' => $dureeHebdoStage,
                'isPremiereAnnee' => $isPremiereAnnee,
                'idProfStage' => $idProf,
                'idEtudiantStage' => $idEtudiant,
                'idAnneeScolaireStage' => $idAnneeScolaire, 
                'idEntStage' => $idEnt,
                'idContactStage' => $idContact          
            );
            $stage = new Stage($values);
            $nstage = new StageDAO();
            $nstage = $nstage->newStage($stage);
            $flash->set_type('succes')->add_messages('Vous avez bien ajouté le stage : '.$stage->get_titreStage().'')->put();
            header("Location: index.php");
        }
    }
?>
<h1>Etudiant</h1>
<h2>Ajout d'un stage</h2>
<?php 
    if($messages->is_empty() == FALSE){
        $messages->afficher();
    }
?>

<form method="POST">

    <label for="titre">Titre stage</label><br>
    <input type="text" id="titre" name="titre" value="<?= $titreStage ?>"><br><br>

    <label for="desc">Desriptif Stage</label><br>
    <input type="text" id="desc" name="desc" value="<?= $descriptifStage ?>"><br><br>

    <label for="dateD">Date de début du stage</label><br>
    <input type="date" name="dateD" id="dateD" value="<?= $dateDebutStage ?>"><br><br>  

    <label for="dateF">Date de fin de stage</label><br>
    <input type="date" name="dateF" id="dateF" value="<?= $dateFinStage ?>"><br><br>

    <label for="duree">Durée hebdomaire du stage</label><br>
    <input type="text" name="duree" id="duree" value="<?= $dureeHebdoStage ?>"><br><br>

    <label for="isPremiereAnnee">Etes-vous en première année ?</label><br>
    <select name="isPremiereAnnee" id="isPremiereAnnee">
        <option value=""selected>--Please choose an option--</option>
        <option value="Oui">Oui</option>
        <option value="Non">Non</option>
    </select><br><br>

    <label for="idProf">Veuillez choisir votre enseignant référant.</label><br>
    <select name="idProf" id="idProf">
        <option value=""selected>Sélectionnez l'enseignant.</option>
        <?php
            foreach($profs as $prof){
                $selected = NULL;
                if($idProf == $prof->get_idProf()){
                    $selected = "selected";
                }else{
                    $selected = NULL;
                }
                echo "<option value=\"".$prof->get_idProf()."\" $selected>".$prof->get_nomProf()." ".$prof->get_prenomProf()."</option>";
            }
        ?>
    </select><br><br>

    <input type="text" id="idEtudiant" name="idEtudiant" value="<?= $_SESSION['Etudiant']->get_idEtudiant() ?>" hidden>

    <label for="idAnneeScolaire">Veuillez choisir l'année scolaire.</label><br>
    <select name="idAnneeScolaire" id="idAnneeScolaire">
        <option value=""selected>Sélectionnez l'année scolaire.</option>
        <?php
            foreach($annees as $annee){
                $selected = NULL;
                if($idAnneeScolaire == $annee->get_idAnneeScolaire()){
                    $selected = "selected";
                }else{
                    $selected = NULL;
                }
                echo "<option value=\"".$annee->get_idAnneeScolaire()."\" $selected>".$annee->get_libAnneeScolaire()."</option>";
            }
        ?>
    </select><br><br>
    
    <script language="Javascript">
				function getcontact(val) {
					$.ajax({
					type: "POST",
					url: "get_contact.php",
					data:'idEnt='+val,
					success: function(data){
						$("#idContact").html(data);
					}
					});
				}

                function selectentreprise(val) {
                    $("#search-box").val(val);
                    $("#suggesstion-box").hide();
                }
    </script>

    <label for="idEnt">Veuillez choisir votre entreprise.</label>   
    <a href="ajout_enteprise.php">Ajoutez votre entreprise !</a><br>
    <select name="idEnt" id="idEnt" onChange="getcontact(this.value);">
        <option value=""selected>--Please choose an option--</option>
        <?php
            foreach($entreprises as $entreprisee){
                $selected = NULL;
                if($idEnt == $entreprisee->get_idEnt()){
                    $selected = "selected";
                }else{
                    $selected = NULL;
                }
                echo "<option value=\"".$entreprisee->get_idEnt()."\" $selected>".$entreprisee->get_nomEnt()."</option>";
            }
        ?>
    </select><br><br>

    <label for="idContact">Veuillez choisir votre contact.</label>
    <a href="ajout_contact.php">Ajoutez le contact d'une entreprise !</a><br>
            <select name="idContact" id="idContact">
                <option value="">Sélectionnez le contact</option>
            </select><br><br>
    
    <input name="submit" type="submit" id="submit" value="Ajouter le stage">
</form>

<?php include('footer.php'); ?>