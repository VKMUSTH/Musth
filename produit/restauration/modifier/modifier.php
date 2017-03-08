<?php require "../../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){
$modifier = $bdd->prepare('UPDATE synoptique SET 
	jour = :nv_jour, 
	designation = :nv_designation,
	horaire = :nv_horaire
		WHERE position = '.$position['position'].' ');
$modifier->execute(array(
	'nv_jour' => $_POST['jour'],
	'nv_designation' => $_POST['designation'],
	'nv_horaire' => $_POST['horaire']
		));
}$select->closeCursor();
header('Location: ..');
?>
