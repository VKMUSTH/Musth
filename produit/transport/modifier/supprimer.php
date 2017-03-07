<?php require "../../../connexion_sql.php"; ?>
<?php 

$req1 = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$req1->execute(array($position['position'],	));
			while ($position = $req1->fetch()){
$transport = $bdd->prepare('DELETE FROM synoptique WHERE position = '.$position['position'].' ');
$transport->execute(array($position['position'],	));


	}$req1->closeCursor();
header('Location: ../index.php');
?>
