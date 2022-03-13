<?php

require_once "init.php";

// Instanciation de l'objet FDPF
$pdf = new mpdf();

// Metadonnées
$pdf->SetTitle('Fiche de renseignement', true);
$pdf->SetAuthor('????', true);
$pdf->SetSubject('Fiche de renseignement', true);
$pdf->mon_fichier="Fiche_Rensignement.pdf";

// Création d'une page
$pdf->AddPage();
$pdf->SetTextColor(0, 0, 0); // Noir

// Titre et logo de page
$pdf->Image('img/instit.png',10,10,-200,);
$pdf->SetFont('Times', '', 20);
$pdf->Cell(0, 20, utf8_decode("FICHE DE RENSEIGNEMENT"), 0, 1, 'R');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(125, 5, utf8_decode("Cette fiche est à remettre au professeur responsable des stages"), 0, 0, 'R');
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(35, 5,utf8_decode("le plus tôt possible"), 0, 1, 'L');
$pdf->SetFont('Times', 'BU', 10);
$pdf->Cell(0, 5, utf8_decode("Aucun départ en stage n'est autorisé sans convention de stage signée"), 0, 1, 'C');

// Génération du document PDF
$pdf->Output('f','outfiles/'.$pdf->mon_fichier);
header('Location: index.php');
?>
