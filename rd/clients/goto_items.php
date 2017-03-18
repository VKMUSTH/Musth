<?php require "../../connexion_sql.php"; ?>
<?php

$req = $bdd->prepare('UPDATE admin SET numclient = :nv_numclient WHERE id = \'1\'');
$req->execute(array('nv_numclient' => $_POST['numclient']));

$req = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$req->execute(array('nv_numcontact' => $_POST['numcontact']));


header('Location: ../descriptif_long');
?>
