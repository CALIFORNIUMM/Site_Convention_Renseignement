<?php
    $title = "ConnexionProf";
    include('header.php');
    
    //DAO Prof
    $Prof = new ProfDAO();
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

        if($Prof->isExistPseudo($pseudo) == FALSE){
            $messages->add_messages("Le pseudo n'existe pas");
        }

        if($messages->is_empty() == TRUE){
            $prof = $Prof->connexionProf($pseudo);
            if(password_verify($mdp, $prof['mdpProf'])){
                $_SESSION['Prof'] = $Prof->find($prof['idProf']);
                //echo $_SESSION['Prof']->get_role();
                //if($_SESSION['Prof']->get_role() == 1) {
                //    $flash->set_type('succes')->add_messages('Vous vous êtes bien connecté : '.$_SESSION['Prof']->get_pseudo().'')->put();
                //    header('Location: controleur.php');
                //}
                //else if($_SESSION['Prof']->get_role() == 2) {
                //    $flash->set_type('succes')->add_messages('Vous vous êtes bien connecté : '.$_SESSION['Prof']->get_pseudo().'')->put();
                //    header('Location: admin.php');
                //}
                //else {
                    $flash->set_type('succes')->add_messages('Vous vous êtes bien connecté : '.$_SESSION['Prof']->get_pseudoProf().'')->put();
                    header('Location: profil.php');
                //}
            }
            else{
                $messages->add_messages("Le mot de passe est faux");
            }
        }
    }
?>
    <h1>Prof</h1>
    <h2>Connexion</h2>
<?php 
    if($messages->is_empty() == FALSE){
        $messages->afficher();
    }
?>
    <form method="POST" class="profil-box">
        <h1>bonsoir</h1>
        <div class="champs">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" name="pseudo" id="pseudo" value="<?= $pseudo ?>"><br>
    
            <label for="mdp">Mot de Passe</label><br>
            <input type="password" name="mdp" id="mdp"><br><br>
    
            <input name="submit" type="submit" id="submit" value="Se connecter">
        </div>
    </form>
    <a href="mdpoublie.php">Mot de passe oublié ?</a>
<?php include('footer.php'); ?>