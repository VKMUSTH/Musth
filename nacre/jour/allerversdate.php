<?php require "../../connexion_sql.php"; ?>
<?php
$modifier = $bdd->prepare('UPDATE admin SET 	 
	date_en_cours = :nv_date_en_cours,
	jour_en_cours = :nv_jour_en_cours
		WHERE id =  \'1\' ');

$modifier->execute(array(
	'nv_date_en_cours' => $_POST['date_en_cours'],
	'nv_jour_en_cours' => $_POST['jour_en_cours']
		));
header('Location: ../jour');
?>
