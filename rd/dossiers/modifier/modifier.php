<?php require "../../../connexion_sql.php"; ?>
<?php

$get_numdossier = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$get_numdossier->execute(array($numdossier['numdossier']	));
			while ($numdossier = $get_numdossier->fetch()){
$update_dossier = $bdd->prepare('UPDATE dossiers SET 
	titre 				= :nv_titre


		WHERE numdossier = '.$numdossier['numdossier'].' ');
$update_dossier->execute(array(
	'nv_titre' 			=> $_POST['titre']


		));
}$get_numdossier->closeCursor();

header('Location: ..');
?>
