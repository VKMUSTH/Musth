<?php require "../../connexion_sql.php"; ?>
<?php
$enregistrer = $bdd->prepare('INSERT INTO livre_journal (
	numproduit,
	numdossier,
	numitem,
	numclient,
	compte,
	etat,
	lj_date,
	inscription,
	debit,
	credit
		) VALUES(?,?,?,?,?,?,?,?,?,?)');
$enregistrer->execute(array(
	$_POST['numproduit'], 
	$_POST['numdossier'],
	$_POST['numitem'],
	$_POST['numclient'],
	$_POST['compte'],
	$_POST['etat'], 
	$_POST['lj_date'],
	$_POST['inscription'], 
	$_POST['debit'],
	$_POST['credit']
		));
header('Location: ../plan_comptable');
?>
