<?php require "../../../connexion_sql.php"; ?>
<?php
$insertion = $bdd->prepare('INSERT INTO voyageurs (
	numclient,
	numcontact,
	attribut,
	unit
		) VALUES(?,?,?,?)');
$insertion->execute(array(
	$_POST['numclient'],
	$_POST['numcontact'],
	$_POST['attribut'], 
	$_POST['unit']
		));

header('Location: ..');
?>
