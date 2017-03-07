<?php require "../../../../connexion_sql.php"; ?>
<?php

$set_question = $bdd->prepare('INSERT INTO historique_emails (
	numclient,
	libelle,
	lien
		) VALUES(?,?,?)');
$set_question->execute(array(
	$_POST['numclient'],
	$_POST['libelle'],
	$_POST['lien']
	));
header('Location: ../..');
?>
