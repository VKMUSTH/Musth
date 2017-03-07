<?php require "../../connexion_sql.php"; ?>
<?php
$set_admin = $bdd->prepare('UPDATE admin SET 
	numclient = :nv_numclient
		 WHERE id = \'1\'');
$set_admin->execute(array(
	'nv_numclient' => $_POST['numclient']
		));

header('Location: modifier');
?>
