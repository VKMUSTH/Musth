<?php require "../../../connexion_sql.php"; ?>
<?php
$get_position = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$get_position->execute(array($position['position'],	));
			while ($position = $get_position->fetch()){
	$modifier_actualites = $bdd->prepare('UPDATE actualites SET
		date = :nv_date,
		lien = :nv_lien,
		titre = :nv_titre   
			WHERE id = '.$position['position'].' ');
	$modifier_actualites->execute(array(
		'nv_date' => $_POST['date'],
		'nv_lien' => $_POST['lien'],
		'nv_titre' => $_POST['titre']
			));
}$get_position->closeCursor();

header('Location: ..');
?>
