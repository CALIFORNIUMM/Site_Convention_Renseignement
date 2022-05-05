<?php
    include('init.php');
    include('CSS/connexion.css');
    $messages = array();  // Message d'erreur
    if(isset($_SESSION['Etudiant'])){
        $sessionEtu = $_SESSION['Etudiant'];
    }
    if(isset($_SESSION['Prof'])){
        $sessionProf = $_SESSION['Prof'];
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
                if(isset($sessionEtu)){
                    echo '<li class="ligne left"><a href="profil.php">Profil</a></li>';
                    echo '<li class="ligne left"><a href="ajout_stage.php">Ajouter un stage</a></li>';
                    echo '<li class="ligne right"><a href="deconnexion.php">DECONNEXION</a></li>';
                }else{
                    echo '<li class="ligne right"><a href="connexionEtudiant.php">CONNEXION ELEVE</a></li>';
                    echo '<li class="ligne right"><a href="inscriptionEtudiant.php">INSCRIPTION ELEVE</a></li>';
                    echo '<li class="ligne right"><a href="connexionProf.php">CONNEXION PROF</a></li>';
                }
            ?>

        </ul>
    </div>

    <div id="content">
<?php 
    $messages = New Flash();
    $messages->afficher()->remove_messages()->put();
?>