<?php
include('init.php'); 
//Liste des ligues existantes
$entreprises = New EntrepriseDAO();
$entreprises = $entreprises->findAll();
//Liste des clubs existantes

//liste des données déjà existantes

$entreprise=isset($_POST['idEnt']) ? $_POST['idEnt'] : NULL;


	$contacts = New ContactDAO();
    $contacts = $contacts->findContactByEntreprise($_POST['idEnt']);
?>
	<option value="">Sélectionnez le contact</option>
<?php
	foreach($contacts as $contact) {
?>
	<option value="<?php echo $contact->get_idContact(); ?>"><?php echo $contact->get_nomContact()." ".$contact->get_prenomContact(); ?></option>
<?php
	} // pas touchew
?>