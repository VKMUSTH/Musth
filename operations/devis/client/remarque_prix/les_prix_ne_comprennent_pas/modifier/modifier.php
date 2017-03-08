<?php require "../../../../../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){

$modifier = $bdd->prepare('UPDATE remarques_prix SET 
	remarque = :nv_remarque
		WHERE position = '.$position['position'].' ');
$modifier->execute(array(
	'nv_remarque' => $_POST['remarque']
			));

}$select->closeCursor();
header('Location: ..');
?>
