<?php require "../../../connexion_sql.php"; ?>
<?php
$visite = $bdd->prepare('INSERT INTO synoptique (
	numclient,
	numcontact,
	attribut,
	jour,
	designation
		) VALUES(?,?,?,?,?)');
$visite->execute(array(
	$_POST['numclient'],
	$_POST['numcontact'],
	$_POST['attribut'],
	$_POST['jour'],
	$_POST['designation']
		));



header('Location: ../../visite');
?>
<!--$livre_journal = $bdd->prepare('INSERT INTO livre_journal (
	numproduit,
	numdossier,
	categorie,
	etat,
	mois,
	annee,
	designation
		) VALUES(?,?,?,?,?,?,?)');
$livre_journal->execute(array(
	$_POST['numproduit'],
	$_POST['numdossier'],
	$_POST['categorie'],
	$_POST['etat'],
	$_POST['mois'],
	$_POST['annee'],
	$_POST['designation']
		));

-->
