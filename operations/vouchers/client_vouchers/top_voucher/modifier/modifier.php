<?php require "../../../../../connexion_sql.php"; ?>
<?php

$req1 = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$req1->execute(array($numclient['numclient'],	));
			while ($numclient = $req1->fetch()){

$req = $bdd->prepare('UPDATE clients SET 
	voucher = :nv_voucher 
		WHERE numclient = '.$numclient['numclient'].' ');
$req->execute(array(
	'nv_voucher' => $_POST['voucher']
		));
}$req1->closeCursor();


header('Location: ../index.php');
?>
