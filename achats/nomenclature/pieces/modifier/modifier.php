<?php require "../../../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){
	$modifier = $bdd->prepare('UPDATE livre_journal SET 
		designation = :nv_designation,
		quantite_nomenclature = :nv_quantite_nomenclature,
		taux_marque = :nv_taux_marque,
		lien = :nv_lien                
			WHERE position = '.$position['position'].' ');
	$modifier->execute(array(
		'nv_designation' => $_POST['designation'],
		'nv_quantite_nomenclature' => $_POST['quantite_nomenclature'],
		'nv_taux_marque' => $_POST['taux_marque'],
		'nv_lien' => $_POST['lien']
			));
}$select->closeCursor();

header('Location: ..');
?>
