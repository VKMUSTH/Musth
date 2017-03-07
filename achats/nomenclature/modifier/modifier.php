<?php require "../../../connexion_sql.php"; ?>
<?php
$get_position = $bdd->prepare('SELECT numitem FROM admin WHERE id = \'1\'');
$get_position->execute(array($position['numitem']	));
			while ($position = $get_position->fetch()){
$modifier_item = $bdd->prepare('UPDATE items SET 
	designation = :nv_designation,
	valeur = :nv_valeur,
	taux_marque = :nv_taux_marque

		WHERE numitem = '.$position['numitem'].' ');
$modifier_item->execute(array(
	'nv_designation' => $_POST['designation'],
	'nv_valeur' => $_POST['valeur'],
	'nv_taux_marque' => $_POST['taux_marque']

		));
}$get_position->closeCursor();





//attribuer le taux de marque à toutes les lignes produit

$select = $bdd->prepare('SELECT numitem FROM admin WHERE id = \'1\'');
$select->execute(array($position['numitem']	));
			while ($position = $select->fetch()){
	$modifier = $bdd->prepare('UPDATE livre_journal SET 
		taux_marque = :nv_taux_marque
			WHERE numitem = '.$position['numitem'].' ');
	$modifier->execute(array(
		'nv_taux_marque' => $_POST['taux_marque']
			));
}$select->closeCursor();



header('Location: ..');
?>
