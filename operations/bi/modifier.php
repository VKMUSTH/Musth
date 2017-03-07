<?php require "../../connexion_sql.php"; ?>
<?php
$set_admin = $bdd->prepare('UPDATE admin SET 
	numproduit = :nv_numproduit,
	numdossier = :nv_numdossier,
	numclient = :nv_numclient
		 WHERE id = \'1\'');
$set_admin->execute(array(
	'nv_numproduit' => $_POST['numproduit'],
	'nv_numdossier' => $_POST['numdossier'],
	'nv_numclient' => $_POST['numclient']

		));


header('Location: modifier');
?>
