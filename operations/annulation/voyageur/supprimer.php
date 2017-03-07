<?php require "../../../connexion_sql.php"; ?>
<?php
$set_numvoyageur = $bdd->prepare('UPDATE admin SET numvoyageur = :nv_numvoyageur WHERE id = \'1\'');
$set_numvoyageur->execute(array('nv_numvoyageur' => $_POST['numvoyageur']));

$get_numvoyageur = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$get_numvoyageur->execute(array($numvoyageur['numvoyageur']	));
			while ($numvoyageur = $get_numvoyageur->fetch()){
	$supprimer = $bdd->query('DELETE FROM voyageurs WHERE numvoyageur = '.$numvoyageur['numvoyageur'].' ');
	$supprimer->execute(array($numvoyageur['numvoyageur'],	));

}$get_numvoyageur->closeCursor();

header('Location: ..');
?>
