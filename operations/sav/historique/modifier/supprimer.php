<?php require "../../../../connexion_sql.php"; ?>
<?php

$req = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$req->execute(array('nv_position' => $_POST['position']));

$req1 = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$req1->execute(array($position['position']	));
			while ($position = $req1->fetch()){
$req2 = $bdd->prepare('DELETE FROM historique_emails WHERE position = '.$position['position'].' ');
$req2->execute(array($position['position']	));

}$req1->closeCursor();
header('Location: ../..');
?>
