<?php require "../../../../connexion_sql.php"; ?>
<?php
$insert_cotation = $bdd->prepare('INSERT INTO livre_journal (
	numclient,
	numcommande,
	numitem,
	etat,
	compte,
	attribut,
	lj_date,
	designation,
	quantite
		) VALUES(?,?,?,?,?,?,?,?,?)');
$insert_cotation->execute(array(
	$_POST['numclient'],
	$_POST['numcommande'],
	$_POST['numitem'],
	$_POST['etat'],
	$_POST['compte'],
	$_POST['attribut'],
	$_POST['lj_date'],
	$_POST['designation'],
	$_POST['quantite']
		));
header('Location: ..');
?>
