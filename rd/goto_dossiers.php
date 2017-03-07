<?php require "../connexion_sql.php"; ?>
<?php
$actualiser_numproduit = $bdd->prepare('UPDATE admin SET numproduit = :nv_numproduit WHERE id = \'1\'');
$actualiser_numproduit->execute(array('nv_numproduit' => $_POST['numproduit']));

$actualiser_numclient = $bdd->prepare('UPDATE admin SET numclient = :nv_numclient WHERE id = \'1\'');
$actualiser_numclient->execute(array('nv_numclient' => $_POST['numclient']));


header('Location: dossiers  ');

?>
