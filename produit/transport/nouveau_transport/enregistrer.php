<?php require "../../../connexion_sql.php"; ?>
<?php
$transport = $bdd->prepare('INSERT INTO synoptique (
	numclient,
	numcontact,
	syn_date,
	attribut,
	jours,
	departde,
	date_depart,
	heuredepart,
	arriveea,
	date_arrivee,
	heurearrivee,
	commentaire
		) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
$transport->execute(array(
	$_POST['numclient'],
	$_POST['numcontact'],
	$_POST['syn_date'],
	$_POST['attribut'],
	$_POST['jours'],
	$_POST['departde'],
	$_POST['date_depart'], 
	$_POST['heuredepart'], 
	$_POST['arriveea'], 
	$_POST['date_arrivee'], 
	$_POST['heurearrivee'],  
	$_POST['commentaire']
		));

$livre_journal = $bdd->prepare('INSERT INTO livre_journal (
	numproduit,
	numdossier,
	etat,
	mois,
	annee,
	designation
		) VALUES(?,?,?,?,?,?)');
$livre_journal->execute(array(
	$_POST['numproduit'],
	$_POST['numdossier'],
	$_POST['etat'],
	$_POST['mois'],
	$_POST['annee'],
	$_POST['designation']
		));

header('Location: ../../transport');
?>
