<?php require "../../../connexion_sql.php"; ?>
<?php
$enregistrer = $bdd->prepare('INSERT INTO courrier (
	date,
	attribut,
	numcontact,
	objet,
	texte
		) VALUES(?,?,?,?,?)');
$enregistrer->execute(array(
	$_POST['date'], 
	$_POST['attribut'], 
	$_POST['numcontact'],
	$_POST['objet'], 
	$_POST['texte']));

header('Location: ../lecture_courrier');
?>
