<?php require "../../../connexion_sql.php"; ?>
<?php

$req1 = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$req1->execute(array($position['position']	));
			while ($position = $req1->fetch()){

$req2 = $bdd->prepare('DELETE FROM actualites WHERE id = '.$position['position'].' ');
$req2->execute(array($position['position'],	));

}$req1->closeCursor();

header('Location: ../..');
?>
