<?php require "../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){
$modifier = $bdd->prepare('UPDATE synoptique SET 	 
			jours = :nv_jours,
			attribut = :nv_attribut,
			programme = :nv_programme,
			detailprog = :nv_detailprog,
			nomhebergement = :nv_nomhebergement,
			hebergement = :nv_hebergement,
			designation = :nv_designation
				WHERE position = '.$position['position'].' ');
$modifier->execute(array(
			'nv_jours' => $_POST['jours'],
			'nv_attribut' => $_POST['attribut'],
			'nv_programme' => $_POST['programme'],
			'nv_detailprog' => $_POST['detailprog'],
			'nv_nomhebergement' => $_POST['nomhebergement'],
			'nv_hebergement' => $_POST['hebergement'],
			'nv_designation' => $_POST['designation']
			));
}$select->closeCursor();
header('Location: ..');
?>
