<?php require "../../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){
$modifier = $bdd->prepare('UPDATE synoptique SET 
	numcontact = :nv_numcontact, 
	jours = :nv_jours, 
	departde = :nv_departde, 
	date_depart = :nv_date_depart, 
	heuredepart = :nv_heuredepart, 
	arriveea = :nv_arriveea, 
	date_arrivee = :nv_date_arrivee, 
	heurearrivee = :nv_heurearrivee, 
	commentaire = :nv_commentaire,
	lien = :nv_lien
		WHERE position = '.$position['position'].' ');
$modifier->execute(array(
	'nv_numcontact' => $_POST['numcontact'],
	'nv_jours' => $_POST['jours'],
	'nv_departde' => $_POST['departde'],
	'nv_date_depart' => $_POST['date_depart'],
	'nv_heuredepart' => $_POST['heuredepart'],
	'nv_arriveea' => $_POST['arriveea'],
	'nv_date_arrivee' => $_POST['date_arrivee'],
	'nv_heurearrivee' => $_POST['heurearrivee'],
	'nv_commentaire' => $_POST['commentaire'],
	'nv_lien' => $_POST['lien']
		));

}$select->closeCursor();
header('Location: ..');
?>
