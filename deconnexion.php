<?php
$title = "Deconnexion";
include('header.php');

unset($_SESSION['Etudiant']);
header('Location: index.php');
?>