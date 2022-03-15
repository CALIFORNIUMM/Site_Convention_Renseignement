<?php
    include('init.php');
    $messages = array();  // Message d'erreur
    if(isset($_SESSION['user'])){
        $session = $_SESSION['user'];
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <title>FICHE - <?= $title ?></title>
</head>

<body>
    
    <div class="navbar">
        <ul>
            <li class="ligne left"><h1><a href="index.php">Accueil</a></h1></li>
            <li class="ligne center"><h1>FICHE - <?= $title ?></h1></li>

            <?php
                if(isset($session)){
                    //if($session->get_role() == 2){
                    //    echo '<li><a href="admin.php">ADMIN</a></li>';
                    //}
                    //if($session->get_role() == 1){
                    //    echo '<li class="ligne right"><a href="controleur.php">CONTROLEUR</a></li>';
                    //}
                    //echo '<li class="ligne left"><a href="profil.php">MON COMPTE</a></li>';
                    //echo '<li class="ligne right"><a href="deconnexion.php">DECONNEXION</a></li>';
                }else{
                    echo '<li class="ligne right"><a href="connexionEtudiant.php">CONNEXION PROF</a></li>';
                    echo '<li class="ligne right"><a href="connexionProf.php">CONNEXION ETUDIANT</a></li>';
                }
            ?>

        </ul>
    </div>

    <div id="content">
<?php 
    $messages = New Flash();
    $messages->afficher()->remove_messages()->put();
?>