<?php require "../../../connexion_sql.php"; ?>
<?php
$get_numvoyageur = $bdd->prepare('UPDATE admin SET numvoyageur = :nv_numvoyageur WHERE id = \'1\'');
$get_numvoyageur->execute(array('nv_numvoyageur' => $_POST['numvoyageur']));

$get_numcontact = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$get_numcontact->execute(array('nv_numcontact' => $_POST['numcontact']));

header('Location: ../../bi/client/saisie_acomptes');
?>
