<?php require "../../../connexion_sql.php"; ?>
<?php

$req = $bdd->prepare('INSERT INTO retroplanning (
devel,
date,
designation) VALUES(?,?,?)');
$req->execute(array(
$_POST['devel'], 
$_POST['date'], 
$_POST['designation'] 

));

header('Location: ..');
?>
