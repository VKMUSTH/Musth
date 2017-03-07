<?php require "../../../connexion_sql.php"; ?>
<?php
$insert = $bdd->prepare('INSERT INTO actualites (
	numproduit,
	date,
	lien,
	titre
		) VALUES(?,?,?,?)');
$insert->execute(array(
	$_POST['numproduit'],
	$_POST['date'],
	$_POST['lien'],
	$_POST['titre']
		));

header('Location: ..');
?>
