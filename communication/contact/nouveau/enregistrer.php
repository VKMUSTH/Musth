<?php require "../../../connexion_sql.php"; ?>
<?php
$enregistrer = $bdd->prepare('INSERT INTO contacts (
	numproduit,
	numdossier,
	nom_firme,
	remarques,
	type,
	voyageur,
	metier,
	civilite,
	nom,
	prenom,
	fonction,
	email,
	web,
	tel_fixe,
	tel_mobile,
	telefax,
	adresse,
	cpladresse,
	code_postal,
	ville,
	pays
		) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$enregistrer->execute(array(
	$_POST['numproduit'],
	$_POST['numdossier'],
	$_POST['nom_firme'],
	$_POST['remarques'], 
	$_POST['type'],
	$_POST['voyageur'],
	$_POST['metier'],
	$_POST['civilite'],
	$_POST['nom'],
	$_POST['prenom'],
	$_POST['fonction'],
	$_POST['email'],
	$_POST['web'],
	$_POST['tel_fixe'],
	$_POST['tel_mobile'],
	$_POST['telefax'],
	$_POST['adresse'],
	$_POST['cpladresse'],
	$_POST['code_postal'],
	$_POST['ville'],
	$_POST['pays']
		));

$actualiser = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$actualiser->execute(array('nv_numcontact' => $_POST['numcontact']+1));

header('Location: ..');
?>
