<?php require "../../../../../../connexion_sql.php"; ?>
<?php
$enregistrer = $bdd->prepare('INSERT INTO remarques_prix (
	numdossier,
	attribut,
	remarque
		) VALUES(?,?,?)');
$enregistrer->execute(array(
	$_POST['numdossier'],
	$_POST['attribut'],
	$_POST['remarque'] 
		));
header('Location: ..');
?>
