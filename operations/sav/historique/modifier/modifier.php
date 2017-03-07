<?php require "../../../../connexion_sql.php"; ?>
<?php

$req1 = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$req1->execute(array($position['position'],	));
			while ($position = $req1->fetch()){

$req = $bdd->prepare('UPDATE historique_emails SET
	libelle = :nv_libelle,
	lien = :nv_lien   
		WHERE position = '.$position['position'].' ');
$req->execute(array(
	'nv_libelle' => $_POST['libelle'],
	'nv_lien' => $_POST['lien']
		));
}$req1->closeCursor(); 
header('Location: ../..');
?>
