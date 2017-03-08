<?php require "../../../connexion_sql.php"; ?>
<?php
$modifier = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$modifier->execute(array('nv_position' => $_POST['position']));

$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){

$supprimer = $bdd->prepare('DELETE FROM retroplanning WHERE position = '.$position['position'].' ');
$supprimer->execute(array($position['position']	));

}$select->closeCursor();

header('Location: ..');
?>
