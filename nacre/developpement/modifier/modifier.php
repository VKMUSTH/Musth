<?php require "../../../connexion_sql.php"; ?>
<?php

$req = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$req->execute(array($position['position']	));
			while ($position = $req->fetch()){

$modifier = $bdd->prepare('UPDATE retroplanning SET
	date = :nv_date,
	designation = :nv_designation,
	lien = :nv_lien,
	temps = :nv_temps,
	numdossier = :nv_numdossier   

		WHERE position = '.$position['position'].' ');
$modifier->execute(array(

	'nv_date' => $_POST['date'],
	'nv_designation' => $_POST['designation'],
	'nv_lien' => $_POST['lien'],
	'nv_temps' => $_POST['temps'],
	'nv_numdossier' => $_POST['numdossier']


		));

	}$req->closeCursor(); 
header('Location: ..');
?>
