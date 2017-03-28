<?php require "../../connexion_sql.php"; ?>
<?php 

$get_numclient = $bdd->prepare('UPDATE admin SET numclient = :nv_numclient WHERE id = \'1\'');
$get_numclient->execute(array('nv_numclient' => $_POST['numclient']));

/** Actualiser le numcontact pour l'attribution de client **/
$get_numcontact = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$get_numcontact->execute(array('nv_numcontact' => $_POST['numcontact']));

header('Location: ../../operations/facture');
?>
