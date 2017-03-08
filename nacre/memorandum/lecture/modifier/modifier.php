<?php require "../../../../connexion_sql.php"; ?>
<?php
$req = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$req->execute(array($position['position']	));
			while ($position = $req->fetch()){

$modifier = $bdd->prepare('UPDATE retroplanning SET
	date = :nv_date,
	echeance = :nv_echeance,
	numcontact = :nv_numcontact,
	designation = :nv_designation,
	lien = :nv_lien   
		WHERE position = '.$position['position'].' ');
$modifier->execute(array(
	'nv_date' => $_POST['date'],
	'nv_echeance' => $_POST['echeance'],
	'nv_numcontact' => $_POST['numcontact'],
	'nv_designation' => $_POST['designation'],
	'nv_lien' => $_POST['lien']
		));
	}$req->closeCursor(); 


header('Location: ../../formalites');
?>
