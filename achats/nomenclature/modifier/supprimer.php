<?php require "../../../connexion_sql.php"; ?>
<?php

$get_position = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$get_position->execute(array($position['position']	));
			while ($position = $get_position->fetch()){

$delete_item = $bdd->prepare('DELETE FROM items WHERE numitem = '.$position['position'].' ');
$delete_item->execute(array($position['position']	));

}$get_position->closeCursor();

header('Location: ../..');
?>
