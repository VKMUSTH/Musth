<?php require "../../../connexion_sql.php"; ?>
<?php
$insert_commande = $bdd->prepare('INSERT INTO livre_journal (
	numproduit,
	numdossier,
	numclient,
	lj_date,
	att_cmd,
	etat,
	designation,
	quantite,
	cout_achat_unit,
	debit
		) VALUES(?,?,?,?,?,?,?,?,?,?)');
$insert_commande->execute(array(
	$_POST['numproduit'],
	$_POST['numdossier'],
	$_POST['numclient'],
	$_POST['lj_date'],
	$_POST['att_cmd'],
	$_POST['etat'],
	$_POST['designation'],
	$_POST['quantite'],
	$_POST['cout_achat_unit'],
	$_POST['debit']
		));
header('Location: ../../../achats');
?>
