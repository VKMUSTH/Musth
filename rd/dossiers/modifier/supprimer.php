<?php require "../../../connexion_sql.php"; ?>
<?php

$get_numdossier = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$get_numdossier->execute(array($numdossier['numdossier']	));
			while ($numdossier = $get_numdossier->fetch()){

$delete_dossier = $bdd->prepare('DELETE FROM dossiers WHERE numdossier = '.$numdossier['numdossier'].' ');
$delete_dossier->execute(array($numdossier['numdossier']	));

}$get_numdossier->closeCursor();

header('Location: ../../dossiers');
?>
