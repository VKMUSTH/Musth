<?php require "../../../../connexion_sql.php"; ?>
<?php
$select_id = $bdd->prepare('SELECT position FROM admin WHERE id = \'1\'');
$select_id->execute(array($position['position']	));
	while ($position = $select_id->fetch()){
$livre_journal = $bdd->prepare('DELETE FROM livre_journal WHERE position = '.$position['position'].' ');
$livre_journal->execute(array($position['position']	));

}$select_id->closeCursor(); 

header('Location: ../../commande');
?>
