<?php require "../../../connexion_sql.php"; ?>
<?php
$get_numclient = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$get_numclient->execute(array($admin['numclient']));
			while ($admin = $get_numclient->fetch()){
$modif_statut_client = $bdd->prepare('UPDATE clients SET 
	statut = :nv_statut,
	date_sav = :nv_date_sav,
	echeance_solde = :nv_echeance_solde
		WHERE numclient = '.$admin['numclient'].' ');
$modif_statut_client->execute(array(
	'nv_statut' => $_POST['statut'],
	'nv_date_sav' => $_POST['date_sav'],
	'nv_echeance_solde' => $_POST['echeance_solde']
		));
}$get_numclient->closeCursor();
header('Location: ..');
?>
