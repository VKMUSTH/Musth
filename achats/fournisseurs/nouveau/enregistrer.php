<?php require "../../connexion_sql.php"; ?>
<?php
$set_produit_presta = $bdd->prepare('INSERT INTO livre_journal (
	numproduit,
	designation,
	lien,
	attribut,
	cout_achat_unit
		) VALUES(?,?,?,?,?)');
$set_produit_presta->execute(array(
	$_POST['numproduit'], 
	$_POST['designation'], 
	$_POST['lien'],
	$_POST['attribut'],
	$_POST['cout_achat_unit'] 
		));

header('Location: ..');
?>
