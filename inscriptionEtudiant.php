<?php
    $title = "Inscription";
    include('header.php'); 
    
    $pseudo=isset($_POST['pseudo']) ? $_POST['pseudo'] : NULL;
    $mdp=isset($_POST['mdp']) ? $_POST['mdp'] : NULL;
    $mdp2=isset($_POST['mdp2']) ? $_POST['mdp2'] : NULL;
    $nom=isset($_POST['nom']) ? $_POST['nom'] : NULL;
    $prenom=isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
    $libAdrEtudiant=isset($_POST['libAdrEtudiant']) ? $_POST['libAdrEtudiant'] : NULL;
    $cp=isset($_POST['cp']) ? $_POST['cp'] : NULL;
    $ville=isset($_POST['ville']) ? $_POST['ville'] : NULL;
    $dateNaiss=isset($_POST['dateNaiss']) ? $_POST['dateNaiss'] : NULL;
    $numAdrEtudiant=isset($_POST['numAdrEtudiant']) ? $_POST['numAdrEtudiant'] : NULL;
    $dateArriveeEtudiant=isset($_POST['dateArriveeEtudiant']) ? $_POST['dateArriveeEtudiant'] : NULL;
    $tel=isset($_POST['tel']) ? $_POST['tel'] : NULL;
    
    //DAO des etudiant
    $etudiant = New EtudiantDAO();

    //messages
    $messages = New Messages("error");
    $flash = New Flash();

    //Vérifie l'inscription
    if(isset($_POST['submit'])){
        if(empty(trim($pseudo))){
            $messages->add_messages("Pseudo vide");
        }

        if(empty(trim($tel))){
            $messages->add_messages("Téléphone vide");
        }
        
        if(empty(trim($mdp))){
            $messages->add_messages("Mot de passe vide");
        }

        if(empty(trim($mdp2))){
            $messages->add_messages("Second mot de passe vide");
        }

        if(empty(trim($nom))){
            $messages->add_messages("Nom vide");
        }

        if(empty(trim($prenom))){
            $messages->add_messages("Prénom vide");
        }

        if(empty(trim($libAdrEtudiant))){
            $messages->add_messages("Libellé adresse vide");
        }

        if(empty(trim($cp))){
            $messages->add_messages("Code postal vide");
        }

        if(empty(trim($ville))){
            $messages->add_messages("Ville vide");
        }

        if(empty(trim($dateNaiss))){
            $messages->add_messages("date de naissance vide");
        }

        if(empty(trim($numAdrEtudiant))){
            $messages->add_messages("Numéro adresse vide");
        }

        if(empty(trim($dateArriveeEtudiant))){
            $messages->add_messages("date d'arrivée à l'Institut vide");
        }

        if($etudiant->isExistPseudo($pseudo) == TRUE ){
            $messages->add_messages("Le pseudo éxiste déjà");
        }

        if(mb_strlen($mdp) < 8){
            $messages->add_messages("Le mot de passe doit faire 8 caractères");
        }

        if(!preg_match("#[a-z]#", $mdp)){
            $messages->add_messages("Le mot de passe doit contenir au moins une minuscule");
        }

        if(!preg_match("#[A-Z]#", $mdp)){
            $messages->add_messages("Le mot de passe doit contenir au moins une majuscule");
        }

        if(!preg_match("#[0-9]#", $mdp)){
            $messages->add_messages("Le mot de passe doit contenir au moins un chiffre");
        }

        $pattern = '/[\'\/~`\!@#$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
        if(!preg_match($pattern, $mdp)){
            $messages->add_messages("Le mot de passe doit contenir au moins un caractère spécial");
            $messages->add_messages("Utilisez l'un de ses caractères spéciaux dans votre mot de passe : ^'£$%^&*()}{@:'#~?><>,;@|\-=-_+-`");
        }
            
        if(!($mdp === $mdp2)){
            $messages->add_messages("Les deux mots de passes ne sont pas identiques");
        }  
    
        //Si aucun message Inscription réussie et insertion dans BD
        if($messages->is_empty() == TRUE){
            $hash=password_hash($mdp, PASSWORD_BCRYPT); //hachage du mot de passe
            $values = array(
                'nomEtudiant' => $nom,
                'prenomEtudiant' => $prenom,
                'telEtudiant' => $tel,
                'mdpEtudiant' => $hash,
                'dateNaissanceEtudiant' => $dateNaiss,
                'villeAdrEtudiant' => $ville,
                'numAdrEtudiant' => $numAdrEtudiant,
                'codePostalAdrEtudiant' => $cp,
                'libAdrEtudiant' => $libAdrEtudiant,
                'dateArriveeEtudiant' => $dateArriveeEtudiant,
                'pseudoEtudiant' => $pseudo               
            );
            $etudiant = new Etudiant($values);
            $netudiant = new EtudiantDAO();
            $netudiant = $netudiant->newEtudiant($etudiant);
            $flash->set_type('succes')->add_messages('Vous vous êtes bien inscrit en tant qu\'étudiant : '.$etudiant->get_pseudoEtudiant().' Connectez-vous maintenant !')->put();
            header("Location: index.php");
        }
    }
?>
<h1>Etudiant</h1>
<h2>Inscription</h2>
<?php 
    if($messages->is_empty() == FALSE){
        $messages->afficher();
    }

?>

<form method="POST">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?= $pseudo ?>"><br><br>

    <label for="mdp">Mot de Passe</label><br>
    <input type="password" id="mdp" name="mdp"><br><br>

    <label for="mdp2">Confirmation du mot de passe:</label><br>
    <input type="password" id="mdp2" name="mdp2"><br><br>

    <label for="tel">tel</label><br>
    <input type="text" id="tel" name="tel" value="<?= $tel ?>"><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" value="<?= $nom ?>"><br><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" value="<?= $prenom ?>"><br><br>

    <label for="numAdrEtudiant">numAdrEtudiant</label><br>
    <input type="text" name="numAdrEtudiant" id="numAdrEtudiant" value="<?= $numAdrEtudiant ?>"><br><br>

    <label for="libAdrEtudiant">Libellé adresse</label><br>
    <input type="text" name="libAdrEtudiant" id="libAdrEtudiant" value="<?= $libAdrEtudiant ?>"><br><br>  

    <label for="cp">Code postal</label><br>
    <input type="text" name="cp" id="cp" value="<?= $cp ?>"><br><br>

    <label for="ville">Ville</label><br>
    <input type="text" name="ville" id="ville" value="<?= $ville ?>"><br><br>

    <label for="dateNaiss">Date de naissance</label><br>
    <input type="date" name="dateNaiss" id="dateNaiss" value="<?= $dateNaiss ?>"><br><br>

    <label for="dateArriveeEtudiant">date de votre arrivée à l'Institut</label><br>
    <input type="date" name="dateArriveeEtudiant" id="dateArriveeEtudiant" value="<?= $dateArriveeEtudiant ?>"><br><br>
    
    <input name="submit" type="submit" id="submit" value="S'inscrire">
</form>
<?php include('footer.php'); ?>