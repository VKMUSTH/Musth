<?php require "../../connexion_sql.php"; ?>
<?php

$get_numproduit = $bdd->prepare('UPDATE admin SET numproduit = :nv_numproduit WHERE id = \'1\'');
$get_numproduit->execute(array('nv_numproduit' => $_POST['numproduit']));

$get_numdossier = $bdd->prepare('UPDATE admin SET numdossier = :nv_numdossier WHERE id = \'1\'');
$get_numdossier->execute(array('nv_numdossier' => $_POST['numdossier']));

$get_numclient = $bdd->prepare('UPDATE admin SET numclient = :nv_numclient WHERE id = \'1\'');
$get_numclient->execute(array('nv_numclient' => $_POST['numclient']));

$get_numcontact = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$get_numcontact->execute(array('nv_numcontact' => $_POST['numcontact']));


header('Location: client_vouchers');
?>
