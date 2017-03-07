<?php require "../../../connexion_sql.php"; ?>
<?php
$get_position = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$get_position->execute(array($position['position']	));
			while ($position = $get_position->fetch()){
$modifier_lj = $bdd->prepare('UPDATE livre_journal SET
	designation = :nv_designation,

	cout_achat_unit = :nv_cout_achat_unit,
	lien = :nv_lien

		WHERE position = '.$position['position'].' ');
$modifier_lj->execute(array(
	'nv_designation' => $_POST['designation'],

	'nv_cout_achat_unit' => $_POST['cout_achat_unit'],
	'nv_lien' => $_POST['lien']
		));
}$get_position->closeCursor(); 
header('Location: ..');
?>
