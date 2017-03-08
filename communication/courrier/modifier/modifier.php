<?php require "../../../connexion_sql.php"; ?>
<?php

$req1 = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$req1->execute(array($position['position']	));
			while ($position = $req1->fetch()){


$req = $bdd->prepare('UPDATE courrier SET
	objet = :nv_objet,
	date = :nv_date,
	texte = :nv_texte,
	numcontact = :nv_numcontact   
		WHERE position = '.$position['position'].' ');
$req->execute(array(
	'nv_objet' => $_POST['objet'],
	'nv_date' => $_POST['date'],
	'nv_texte' => $_POST['texte'],
	'nv_numcontact' => $_POST['numcontact']
		));
}$req1->closeCursor(); 
header('Location: ../lecture_courrier');
?>
