<?php require "../../../connexion_sql.php"; ?>
<?php
$actualiser_numcontact = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$actualiser_numcontact->execute(array('nv_numcontact' => $_POST['numcontact']));

header('Location: ../../../communication/contact');
?>
