<?php require "../../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){
$modifier = $bdd->prepare('UPDATE synoptique SET 
	jours = :nv_jours,
	date_arrivee = :nv_date_arrivee, 
	designation = :nv_designation,
	horaire = :nv_horaire
		WHERE position = '.$position['position'].' ');
$modifier->execute(array(
	'nv_jours' => $_POST['jours'],
	'nv_date_arrivee' => $_POST['date_arrivee'],
	'nv_designation' => $_POST['designation'],
	'nv_horaire' => $_POST['horaire']
		));
}$select->closeCursor();
header('Location: ..');
?>
