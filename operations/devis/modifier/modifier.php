<?php require "../../../connexion_sql.php"; ?>
<?php
$get_numclient = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$get_numclient->execute(array($admin['numclient']));
			while ($admin = $get_numclient->fetch()){
$modif_statut_client = $bdd->prepare('UPDATE clients SET 
	statut = :nv_statut,
	date_devis = :nv_date_devis,
	facturation_debut = :nv_facturation_debut,
	facturation_fin = :nv_facturation_fin,
	echeance_devis = :nv_echeance_devis,
	echeance_solde = :nv_echeance_solde,
	titre = :nv_titre
		WHERE numclient = '.$admin['numclient'].' ');
$modif_statut_client->execute(array(
	'nv_statut' => $_POST['statut'],
	'nv_date_devis' => $_POST['date_devis'],
	'nv_facturation_debut' => $_POST['facturation_debut'],
	'nv_facturation_fin' => $_POST['facturation_fin'],
	'nv_echeance_devis' => $_POST['echeance_devis'],
	'nv_echeance_solde' => $_POST['echeance_solde'],
	'nv_titre' => $_POST['titre']
		));
}$get_numclient->closeCursor();
header('Location: ..');
?>
