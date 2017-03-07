<?php require "../../connexion_sql.php"; ?>
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

$req2 = $bdd->prepare('UPDATE contacts SET 
	unit = :nv_unit,
	type = :nv_type,
	naissance = :nv_type,
	voyageur = :nv_voyageur,
	decriptif = :nv_decriptif
		 WHERE id = \'1\'');
$req2->execute(array(
	'nv_unit' => $_POST['unit'],
	'nv_type' => $_POST['type'],
	'nv_naissance' => $_POST['naissance'],
	'nv_voyageur' => $_POST['voyageur'],
	'nv_decriptif' => $_POST['decriptif']
		));

header('Location: ../../operations');
?>
