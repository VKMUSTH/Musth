<?php require "../../../connexion_sql.php"; ?>
<?php
$get_numcommande = $bdd->prepare('SELECT numcommande FROM admin WHERE id = \'1\'');
$get_numcommande->execute(array($numcommande['numcommande']	));
			while ($numcommande = $get_numcommande->fetch()){
$modifier_lj = $bdd->prepare('UPDATE livre_journal SET
	numcontact = :nv_numcontact
		WHERE position = '.$numcommande['numcommande'].' ');
$modifier_lj->execute(array(
	'nv_numcontact' => $_POST['numcontact']

		));
}$get_numcommande->closeCursor(); 
header('Location: ..');
?>
