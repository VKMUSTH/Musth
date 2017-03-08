<?php require "../../../../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){

$modifier = $bdd->prepare('UPDATE livre_journal SET 
	mode_reglement = :nv_mode_reglement,
	credit = :nv_credit,
	designation = :nv_designation
		WHERE position = '.$position['position'].' ');
$modifier->execute(array(
	'nv_mode_reglement' => $_POST['mode_reglement'],
	'nv_credit' => $_POST['credit'],
	'nv_designation' => $_POST['designation']
		));

}$select->closeCursor();

header('Location: ../../saisie_acomptes');
?>
