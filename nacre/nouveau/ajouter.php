<?php require "../../connexion_sql.php"; ?>
<?php
$enregistrer = $bdd->prepare('INSERT INTO synoptique (
	numclient,
	numproduit,
	numdossier,
	syn_date,
	programme,
	detailprog
		) VALUES(?,?,?,?,?,?)');
$enregistrer->execute(array(
	$_POST['numclient'], 
	$_POST['numproduit'], 
	$_POST['numdossier'], 
	$_POST['syn_date'], 
	$_POST['programme'], 
	$_POST['detailprog']
		));
header('Location: ..');
?>
