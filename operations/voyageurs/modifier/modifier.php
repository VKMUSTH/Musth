<?php require "../../../connexion_sql.php"; ?>
<?php
$req1 = $bdd->prepare('SELECT * FROM admin WHERE id = \'1\'');
$req1->execute(array($admin['numcontact'],	));
			while ($admin = $req1->fetch()){

$req = $bdd->prepare('UPDATE contacts SET 
	civilite = :nv_civilite,
	nom = :nv_nom,
	prenom = :nv_prenom,
	naissance = :nv_naissance,
	chambre = :nv_chambre,
	commentaire = :nv_commentaire 
		WHERE numcontact = '.$admin['numcontact'].' ');
$req->execute(array(
	'nv_civilite' => $_POST['civilite'],
	'nv_nom' => $_POST['nom'],
	'nv_prenom' => $_POST['prenom'],
	'nv_naissance' => $_POST['naissance'],
	'nv_chambre' => $_POST['chambre'],
	'nv_commentaire' => $_POST['commentaire']
		));
}$req1->closeCursor();

header('Location: ..');
?>
