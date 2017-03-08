<?php require "../../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){

$modifier = $bdd->prepare('UPDATE synoptique SET 	 
	numcontact = :nv_numcontact,
	horaire = :nv_horaire,
	jours = :nv_jours,
	nuitees = :nv_nuitees,
	formule = :nv_formule,
	commentaire = :nv_commentaire
		WHERE position = '.$position['position'].' ');
$modifier->execute(array(
	'nv_numcontact' => $_POST['numcontact'],
	'nv_horaire' => $_POST['horaire'],
	'nv_jours' => $_POST['jours'],
	'nv_nuitees' => $_POST['nuitees'],
	'nv_formule' => $_POST['formule'],
	'nv_commentaire' => $_POST['commentaire']
		));
}$select->closeCursor(); 

header('Location: ..');
?>
