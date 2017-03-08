<?php require "../../../../../../connexion_sql.php"; ?>
<?php

$req = $bdd->prepare('INSERT INTO remarques_prix (
	numdossier,
	attribut,
	remarque
		) VALUES(?,?,?)');
$req->execute(array(
	$_POST['numdossier'],
	$_POST['attribut'],
	$_POST['remarque'] 
		));

header('Location: ..');
?>
