<?php require "../../../connexion_sql.php"; ?>
<?php $req1 = $bdd->prepare('SELECT numinscription FROM admin WHERE id = \'1\'');
$req1->execute(array($numproduit['numinscription']	));
			while ($numproduit = $req1->fetch()){

$produit = $bdd->prepare('DELETE FROM livre_journal WHERE position = '.$numproduit['numinscription'].' ');
$produit->execute(array($numproduit['numinscription']	));

	}$req1->closeCursor(); 
header('Location: ..');
?>
