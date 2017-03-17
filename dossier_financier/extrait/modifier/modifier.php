<?php require "../../../connexion_sql.php"; ?>
<?php
$get_admin = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$get_admin->execute(array($admin['numinscription']	));
			while ($admin = $get_admin->fetch()){
$modifier = $bdd->prepare('UPDATE livre_journal SET 	 
	increment = :nv_increment
		WHERE position = '.$admin['numinscription'].' ');
$modifier->execute(array(
	'nv_increment' => $_POST['increment']
		));
}$get_admin->closeCursor();

header('Location: ..');
?>
