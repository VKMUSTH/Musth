<?php require "../../connexion_sql.php"; ?>
<?php
$set_donnees = $bdd->prepare('UPDATE admin SET 
	mois_en_cours = :nv_mois_en_cours,
	annee_en_cours = :nv_annee_en_cours
		 WHERE id = \'1\'');
$set_donnees->execute(array(
	'nv_mois_en_cours' => $_POST['mois_en_cours'],
	'nv_annee_en_cours' => $_POST['annee_en_cours']
		));

header('Location: ../extrait');
?>
