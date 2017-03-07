<?php require "../../../../connexion_sql.php"; ?>
<?php
$insert_commande = $bdd->prepare('INSERT INTO livre_journal (
	numproduit,
	numdossier,
	numitem,
	numcommande,
	numclient,
	compte,
	attribut,
	lj_date,
	inscription,
	etat,
	debit
		) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
$insert_commande->execute(array(
	$_POST['numproduit'],
	$_POST['numdossier'],
	$_POST['numitem'],
	$_POST['numcommande'],
	$_POST['numclient'],
	$_POST['compte'],
	$_POST['attribut'],
	$_POST['lj_date'],
	$_POST['inscription'],
	$_POST['etat'],
	$_POST['debit']

		));
header('Location: ..');
?>
