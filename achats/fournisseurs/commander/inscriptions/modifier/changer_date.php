<?php require "../../../../../connexion_sql.php"; ?>
<?php 
$update_var_date = $bdd->prepare('UPDATE admin SET 	 
	var_jour = :nv_var_jour,
	var_mois = :nv_var_mois,
	var_annee = :nv_var_annee

		WHERE id = \'1\' ');
$update_var_date->execute(array(
	'nv_var_jour' => $_POST['var_jour'],
	'nv_var_mois' => $_POST['var_mois'],
	'nv_var_annee' => $_POST['var_annee']

		));
header('Location: index2.php');
?>
