<?php require "../../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){

$modifier = $bdd->prepare('UPDATE retroplanning SET
	date = :nv_date,
	attribut = :nv_attribut,
	designation = :nv_designation,
	lien = :nv_lien,
	temps = :nv_temps,
	numdossier = :nv_numdossier   
		WHERE position = '.$position['position'].' ');
$modifier->execute(array(
	'nv_date' => $_POST['date'],
	'nv_attribut' => $_POST['attribut'],
	'nv_designation' => $_POST['designation'],
	'nv_lien' => $_POST['lien'],
	'nv_temps' => $_POST['temps'],
	'nv_numdossier' => $_POST['numdossier']
		));
}$select->closeCursor(); 
header('Location: ..');
?>
