<?php require "../../../connexion_sql.php"; ?>
<?php

$insert_client = $bdd->prepare('INSERT INTO clients (
	numproduit,
	numdossier,
	numcontact,
	statut,
	date_cdv,
	date_depart,
	date_retour,
	facturation_debut,
	facturation_fin
		) VALUES(?,?,?,?,?,?,?,?,?)');
$insert_client->execute(array(
	$_POST['numproduit'],
	$_POST['numdossier'],
	$_POST['numcontact'],
	$_POST['statut'],
	$_POST['date_cdv'],
	$_POST['date_depart'],
	$_POST['date_retour'],
	$_POST['facturation_debut'],
	$_POST['facturation_fin']
		));
$insert_contact = $bdd->prepare('INSERT INTO contacts (
	trigger_ctct,
	date_ctct,
	civilite,
	nom,
	prenom,
	nom_firme,
	email,
	web,

	adresse,
	cpladresse,
	code_postal,
	ville,
	pays
		) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
$insert_contact->execute(array(
	$_POST['trigger_ctct'],
	$_POST['date_ctct'],
	$_POST['civilite'],
	$_POST['nom'],
	$_POST['prenom'],
	$_POST['nom_firme'],
	$_POST['email'],
	$_POST['web'],

	$_POST['adresse'],
	$_POST['cpladresse'],
	$_POST['code_postal'],
	$_POST['ville'],
	$_POST['pays']
		));
$update_numclient = $bdd->prepare('UPDATE admin SET numclient = :nv_numclient WHERE id = \'1\'');
$update_numclient->execute(array('nv_numclient' => $_POST['numclient']	));


header('Location: ../..');
?>
