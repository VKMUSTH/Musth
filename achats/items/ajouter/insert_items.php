<?php require "../../../connexion_sql.php"; ?>
<?php
$insert_item = $bdd->prepare('INSERT INTO items (
	numproduit,
	numdossier,
	designation,
	quantite
		) VALUES(?,?,?,?)');
$insert_item->execute(array(
	$_POST['numproduit'],
	$_POST['numdossier'],
	$_POST['designation'],
	$_POST['quantite']
		));
header('Location: ..');
?>
