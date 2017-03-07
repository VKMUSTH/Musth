<?php require "../../../../../connexion_sql.php"; ?>
<?php 
$get_position = $bdd->prepare('SELECT numinscription FROM admin WHERE id = \'1\'');
$get_position->execute(array($position['numinscription']	));
			while ($position = $get_position->fetch()){
	$delete = $bdd->prepare('DELETE FROM livre_journal WHERE position = '.$position['numinscription'].' ');
	$delete->execute(array($position['numinscription']	));

}$get_position->closeCursor();
header('Location: ../../../commander');
?>
