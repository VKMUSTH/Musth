<?php require "../../../connexion_sql.php"; ?>
<?php
$nouv_contact = $bdd->prepare('INSERT INTO contacts (
	numclient,
	numdossier,
	civilite,
	nom,
	prenom,
	chambre,
	naissance,
	commentaire
		) VALUES(?,?,?,?,?,?,?,?)');
$nouv_contact->execute(array(
	$_POST['numclient'],
	$_POST['numdossier'],
	$_POST['civilite'], 
	$_POST['nom'],
	$_POST['prenom'], 
	$_POST['chambre'],
	$_POST['naissance'], 
	$_POST['commentaire']));


$nouv_voyageur = $bdd->prepare('INSERT INTO voyageurs (
	numclient,
	numproduit,
	numdossier,
	numcontact,
	attribut,
	unit
) VALUES(?,?,?,?,?,?)');
$nouv_voyageur->execute(array(
	$_POST['numclient'],
	$_POST['numproduit'],
	$_POST['numdossier'],
	$_POST['numcontact'],
	$_POST['attribut'], 
	$_POST['unit']
		));

header('Location: ..');
?>
