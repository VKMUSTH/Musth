<?php require "../../connexion_sql.php"; ?>
<?php
$set_numcommande = $bdd->prepare('UPDATE admin SET numcommande = :nv_numcommande WHERE id = \'1\'');
$set_numcommande->execute(array('nv_numcommande' => $_POST['numcommande']));

$set_numcontact = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$set_numcontact->execute(array('nv_numcontact' => $_POST['numcontact']));



header('Location: ../fournisseurs');


?>
