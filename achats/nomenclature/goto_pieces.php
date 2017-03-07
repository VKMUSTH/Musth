<?php require "../../connexion_sql.php"; ?>
<?php
$set_donnees = $bdd->prepare('UPDATE admin SET 
	numitem = :nv_numitem
		 WHERE id = \'1\'');
$set_donnees->execute(array(
	'nv_numitem' => $_POST['numitem']
		));

header('Location: pieces');
?>
