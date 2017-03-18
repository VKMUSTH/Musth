<?php require "../../../connexion_sql.php"; ?>
<?php

$enregistrer = $bdd->prepare('INSERT INTO dossiers (
	numproduit,
	titre

		) VALUES(?,?)');
$enregistrer->execute(array(
	$_POST['numproduit'],
	$_POST['titre']

		));
header('Location: ..');
?>
