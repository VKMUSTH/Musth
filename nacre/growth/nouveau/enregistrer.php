<?php require "../../../connexion_sql.php"; ?>
<?php
$insert = $bdd->prepare('INSERT INTO retroplanning (
	devel,
	attribut,
	categorie,
	type_action,
	date,
	designation
		) VALUES(?,?,?,?,?,?)');
$insert->execute(array(
	$_POST['devel'], 
	$_POST['attribut'],
	$_POST['categorie'], 
	$_POST['type_action'], 
	$_POST['date'], 
	$_POST['designation'] 
		));
header('Location: ..');
?>
