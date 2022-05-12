<?php

require_once "init.php";

$id_stage = isset($_GET['id']) ? $_GET['id'] : null;

$dao = New StageDAO();
$stages = $dao->find($id_stage);

if($stages->get_idEtudiant() != $_SESSION['Etudiant']->get_idEtudiant()){
    header('Location: 403.php');
    exit;
}

$entreprisedao = New EntrepriseDAO();
$entreprisedao=$entreprisedao->find($stages->get_idEnt());

$etudiantdao = New EtudiantDAO();
$etudiantdao=$etudiantdao->find($stages->get_idEtudiant());

$contactdao = New ContactDAO();
$contactdao=$contactdao->find($stages->get_idContact());

$dateDebut = $stages->get_dateDebutStage();
$dateFin = $stages->get_dateFinStage();

$timestampDebut = strtotime($dateDebut); 
$newDateDebut = date("d-m", $timestampDebut);

$timestampFin = strtotime($dateFin); 
$newDateFin = date("d-m", $timestampFin);

// Instanciation de l'objet FDPF
$pdf = new mpdf();

// Metadonnées
$pdf->SetTitle('Fiche de renseignement', true);
$pdf->SetAuthor('.', true);
$pdf->SetSubject('Fiche de renseignement', true);
$pdf->mon_fichier="Fiche_Renseignement_".$etudiantdao->get_nomEtudiant()."_à_".$entreprisedao->get_nomEnt().".pdf";

// Création d'une page
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0, 0, 0); // Noir

$pdf->Image('img\template_fiche_renseign.png', 0, 0, 210, 300);

//etudiant
$pdf->SetXY(26,62);
$pdf->Cell(158, 6, utf8_decode($etudiantdao->get_nomEtudiant()." ".$etudiantdao->get_prenomEtudiant()." ".$etudiantdao->get_numAdrEtudiant()." ".$etudiantdao->get_libAdrEtudiant()." ".$etudiantdao->get_codePostalAdrEtudiant()." ".$etudiantdao->get_villeAdrEtudiant()), 0,1,"L",false);

//date debut
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(92,69);
$pdf->Cell(8, 5, utf8_decode($newDateDebut), 0,1,"L",false);

//date fin
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(104,69);
$pdf->Cell(8, 5, utf8_decode($newDateFin), 0,1,"L",false);

//duree hebdo
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(26,76);
$pdf->Cell(13, 6, utf8_decode($stages->get_dureeHebdoStage()), 0,1,"R",false);

//nom entreprise
$pdf->SetXY(26,100);
$pdf->Cell(158, 6, utf8_decode($entreprisedao->get_nomEnt()), 0,1,"L",false);

//adresse entreprise
$pdf->SetXY(41,109);
$pdf->Cell(90, 6, utf8_decode($entreprisedao->get_numAdrEnt()." ".$entreprisedao->get_libAdrEnt()), 0,1,"L",false);

//cp entreprise
$pdf->SetXY(140,109);
$pdf->Cell(20, 6, utf8_decode($entreprisedao->get_codePostalEnt()), 0,1,"L",false);

//ville entreprise
$pdf->SetXY(35,117);
$pdf->Cell(80, 5, utf8_decode($entreprisedao->get_villeAdrEnt()), 0,1,"L",false);

//siret entreprise
$pdf->SetXY(42,124);
$pdf->Cell(40, 6, utf8_decode($entreprisedao->get_siretEnt()), 0,1,"L",false);

//mission entreprise
$pdf->SetXY(65,131);
$pdf->Cell(90, 6, utf8_decode($entreprisedao->get_missionEnt()), 0,1,"L",false);

//nom resp entreprise
$pdf->SetXY(85,139);
$pdf->Cell(40, 6, utf8_decode("Rene lataupe"), 1,1,"L",false);

// A FAIRE LA CROIX DE LA CIVILITE

//Focntion resp entreprise
$pdf->SetXY(41,157);
$pdf->Cell(40, 5, utf8_decode("Gérant"), 1,1,"L",false);

//nom tuteur entreprise
$pdf->SetXY(63,172);
$pdf->Cell(40, 5, utf8_decode($contactdao->get_nomContact()." ".$contactdao->get_prenomContact()), 0,1,"L",false);

// A FAIRE LA CROIX DE LA CIVILITE

//mail tuteur entreprise
$pdf->SetXY(35,183);
$pdf->Cell(75, 6, utf8_decode($contactdao->get_mailContact()), 0,1,"L",false);

//cache si different entreprise
$pdf->SetXY(61,193);
$pdf->Cell(75, 5, utf8_decode(" "), 0,1,"L",true);


//fonction tuteur entreprise
$pdf->SetXY(155,179);
$pdf->MultiCell(40, 5, utf8_decode($contactdao->get_fct_contact()), 0,"L",false);

//lieu nom
$pdf->SetXY(26,205);
$pdf->Cell(158, 6, utf8_decode($entreprisedao->get_nomEnt()), 0,1,"L",false);

//lieu adresse
$pdf->SetXY(40,211);
$pdf->Cell(140, 6, utf8_decode($entreprisedao->get_numAdrEnt()." ".$entreprisedao->get_libAdrEnt()), 0,1,"L",false);

//lieu adresse cp ville
$pdf->SetXY(41,219);
$pdf->Cell(85, 5, utf8_decode($entreprisedao->get_codePostalEnt()." ".$entreprisedao->get_villeAdrEnt()), 0,1,"L",false);

//activité envisage par l'entreprise
$pdf->SetXY(26,237);
$pdf->Cell(158, 6, utf8_decode($stages->get_descriptifStage()), 0,1,"L",false);



// Génération du document PDF
$pdf->Output('f','outfiles/'.$pdf->mon_fichier);
header('Location: profil.php');
?>
