<?php require "../../../connexion_sql.php"; ?>
<?php

$req = $bdd->prepare('UPDATE admin SET 
	position = :nv_position,
	numproduit = :nv_numproduit
		 WHERE id = \'1\'');
$req->execute(array(
	'nv_position' => $_POST['position'],
	'nv_numproduit' => $_POST['numproduit']
		));


header('Location: modifier');
?>
