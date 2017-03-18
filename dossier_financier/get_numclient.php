<?php require "../connexion_sql.php"; ?>
<?php
$setnumdossier = $bdd->prepare('UPDATE admin SET  numclient = :nv_numclient WHERE id = \'1\'');
$setnumdossier->execute(array('nv_numclient' => $_POST['numclient']));
header('Location: ../dossier_financier');
?>
