<?php require "../../../connexion_sql.php"; ?>
<?php
$get_numclient = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$get_numclient->execute(array($numclient['numclient']	));
			while ($numclient = $get_numclient->fetch()){
$modifier = $bdd->prepare('UPDATE clients SET 
	statut = :nv_statut,
	date_devis = :nv_date_devis,
	date_cdv = :nv_date_cdv,
	echeance_solde = :nv_echeance_solde,
	date_sav = :nv_date_sav
		WHERE numclient = '.$numclient['numclient'].' ');
$modifier->execute(array(
	'nv_statut' => $_POST['statut'],
	'nv_date_devis' => $_POST['date_devis'],
	'nv_date_cdv' => $_POST['date_cdv'],
	'nv_echeance_solde' => $_POST['echeance_solde'],
	'nv_date_sav' => $_POST['date_sav']
		));
}$get_numclient->closeCursor();

header('Location: ..');
?>
