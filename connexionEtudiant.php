<?php
    $title = "ConnexionEtudiant";
    include('header.php');
    
    //DAO Etudiant
    $Etudiant = new EtudiantDAO();
    //liste des messages
    $messages = New Messages("error");
    $flash = New Flash();

    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : NULL;
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : NULL;
    //si form envoyé
    if(isset($_POST['submit'])){
        if(empty(trim($pseudo))){
            $messages->add_messages("Pseudo vide");
        }

        if(empty(trim($mdp))){
            $messages->add_messages("Mot de passe vide");
        }

        if($Etudiant->isExistPseudo($pseudo) == FALSE){
            $messages->add_messages("Le pseudo n'existe pas");
        }

        if($messages->is_empty() == TRUE){
            $etudiant = $Etudiant->connexionEtudiant($pseudo);
            if(password_verify($mdp, $etudiant['mdpEtudiant'])){
                $_SESSION['Etudiant'] = $Etudiant->find($etudiant['idEtudiant']);
                //echo $_SESSION['Etudiant']->get_role();
                //if($_SESSION['Etudiant']->get_role() == 1) {
                //    $flash->set_type('succes')->add_messages('Vous vous êtes bien connecté : '.$_SESSION['Etudiant']->get_pseudo().'')->put();
                //    header('Location: controleur.php');
                //}
                //else if($_SESSION['Etudiant']->get_role() == 2) {
                //    $flash->set_type('succes')->add_messages('Vous vous êtes bien connecté : '.$_SESSION['Etudiant']->get_pseudo().'')->put();
                //    header('Location: admin.php');
                //}
                //else {
                    $flash->set_type('succes')->add_messages('Vous vous êtes bien connecté : '.$_SESSION['Etudiant']->get_pseudo().'')->put();
                    header('Location: profil.php');
                //}
            }
            else{
                $messages->add_messages("Le mot de passe est faux");
            }
        }
    }
?>
    <h1>etudiant</h1>
    <h2>Connexion</h2>
<?php 
    if($messages->is_empty() == FALSE){
        $messages->afficher();
    }
?>
    <form method="POST">

        <label for="pseudo">Pseudo</label><br>
        <input type="text" name="pseudo" id="pseudo" value="<?= $pseudo ?>"><br>

        <label for="mdp">Mot de Passe</label><br>
        <input type="password" name="mdp" id="mdp"><br><br>

        <input name="submit" type="submit" id="submit" value="Se connecter">
    </form>
    <a href="mdpoublie.php">Mot de passe oublié ?</a>
<?php include('footer.php'); ?>