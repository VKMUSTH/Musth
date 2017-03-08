<?php require "../../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select->execute(array($position['position']	));
			while ($position = $select->fetch()){
$supprimer = $bdd->prepare('DELETE FROM synoptique WHERE position = '.$position['position'].' ');
$supprimer->execute(array($position['position']	));

}$select->closeCursor(); 

header('Location: ..');
?>
