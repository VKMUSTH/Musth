<?php require "../../../../../connexion_sql.php"; ?>
<?php
$get_admin = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$get_admin->execute(array($admin['numinscription']	));
			while ($admin = $get_admin->fetch()){

$modifier = $bdd->prepare('UPDATE livre_journal SET 	 
	lj_date = :nv_lj_date,
	inscription = :nv_inscription,
	etat = :nv_etat,
	debit = :nv_debit,
	credit = :nv_credit
		WHERE position = '.$admin['numinscription'].' ');
$modifier->execute(array(
	'nv_lj_date' => $_POST['lj_date'],
	'nv_inscription' => $_POST['inscription'],
	'nv_etat' => $_POST['etat'],
	'nv_debit' => $_POST['debit'],
	'nv_credit' => $_POST['credit']
		));
}$get_admin->closeCursor();

header('Location: ../..');
?>
