<?php require "../../../connexion_sql.php"; ?>
<?php
$hebergement = $bdd->prepare('INSERT INTO synoptique (
	numclient,
	numcontact,
	attribut,
	syn_date,
	jours,
	activite,
	nuitees,
	formule,
	commentaire
		) VALUES(?,?,?,?,?,?,?,?,?)');
$hebergement->execute(array(
	$_POST['numclient'],
	$_POST['numcontact'],
	$_POST['attribut'],
	$_POST['syn_date'],
	$_POST['jours'],
	$_POST['activite'],
	$_POST['nuitees'], 
	$_POST['formule'], 
	$_POST['commentaire']
		));

header('Location: ../../hebergement');
?>
