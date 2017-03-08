<?php require "../../../connexion_sql.php"; ?>
<?php
$select1 = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select1->execute(array($position['position']	));
			while ($position = $select1->fetch()){
$supprimer = $bdd->prepare('DELETE FROM retroplanning WHERE position = '.$position['position'].' ');
$supprimer->execute(array($position['position']	));

}$select1->closeCursor(); 
header('Location: ..');
?>
