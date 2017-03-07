<?php require "../../../connexion_sql.php"; ?>
<?php
$set_numvoyageur = $bdd->prepare('UPDATE admin SET numvoyageur = :nv_numvoyageur WHERE id = \'1\'');
$set_numvoyageur->execute(array('nv_numvoyageur' => $_POST['numvoyageur']));

$set_numcontact = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$set_numcontact->execute(array('nv_numcontact' => $_POST['numcontact']));

header('Location: ../../../communication/contact');
?>
