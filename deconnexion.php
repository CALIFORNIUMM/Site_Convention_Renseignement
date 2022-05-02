<?php
$title = "Deconnexion";
include('header.php');

unset($_SESSION['Etudiant']);
unset($_SESSION['Prof']);
header('Location: index.php'); // pas touchew
?>