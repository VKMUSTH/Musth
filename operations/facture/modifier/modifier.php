<?php require "../../../connexion_sql.php"; ?>
<?php

$req1 = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$req1->execute(array($numclient['numclient'],	));
			while ($numclient = $req1->fetch()){

$req = $bdd->prepare('UPDATE clients SET 
	facture = :nv_facture 
		WHERE numclient = '.$numclient['numclient'].' ');
$req->execute(array(
	'nv_facture' => $_POST['facture']
	));
}$req1->closeCursor();


header('Location: ..');
?>
