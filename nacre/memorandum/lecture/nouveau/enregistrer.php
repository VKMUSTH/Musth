<?php require "../../../../connexion_sql.php"; ?>
<?php
$set_retroplanning = $bdd->prepare('INSERT INTO annexes (
	attribut,
	titre,
	lien
		) VALUES(?,?,?)');
$set_retroplanning->execute(array(
	$_POST['attribut'], 
	$_POST['titre'],
	$_POST['lien']  
	));
header('Location: ../../lecture');
?>
