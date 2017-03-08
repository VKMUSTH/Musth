<?php require "../../../../connexion_sql.php"; ?>
<?php
$acompte = $bdd->prepare('INSERT INTO livre_journal (
	numcontact,
	numclient,
	designation,
	numpiece,
	categorie,
	etat,
	attribut,
	lj_date,
	mode_reglement,
	credit
		) VALUES(?,?,?,?,?,?,?,?,?,?)');
$acompte->execute(array(
	$_POST['numcontact'],
	$_POST['numclient'],
	$_POST['designation'],
	$_POST['numpiece'],
	$_POST['categorie'],
	$_POST['etat'],
	$_POST['attribut'],
	$_POST['lj_date'],
	$_POST['mode_reglement'],
	$_POST['credit']
		));
header('Location: ../../../../bi/client');
?>
