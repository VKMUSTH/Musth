<?php require "../../../connexion_sql.php"; ?>
<?php

$req1 = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$req1->execute(array($numclient['numclient'],	));
			while ($numclient = $req1->fetch()){
	$annulation_client = $bdd->prepare('DELETE FROM clients WHERE numclient = '.$numclient['numclient'].' ');
	$annulation_client->execute(array($numclient['numclient'],	));
}$req1->closeCursor();
header('Location: ../index.php');
?>
