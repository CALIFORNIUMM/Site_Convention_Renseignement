<?php

require_once "init.php";

// Instanciation de l'objet FDPF
$pdf = new mpdf();

// Metadonnées
$pdf->SetTitle('Fiche de renseignement', true);
$pdf->SetAuthor('.', true);
$pdf->SetSubject('Fiche de renseignement', true);
$pdf->mon_fichier="Fiche_Rensignement.pdf";

// Création d'une page
$pdf->AddPage();
$pdf->SetTextColor(0, 0, 0); // Noir

$pdf->Image('img\template_fiche_renseign.png', 0, 0, 210, 300);

 

// Génération du document PDF
$pdf->Output('f','outfiles/'.$pdf->mon_fichier);
header('Location: index.php');
?>
