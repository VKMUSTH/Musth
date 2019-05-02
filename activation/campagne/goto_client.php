<?php require "../../../connexion_sql.php"; ?>
<?php 

$get_client = $bdd->prepare('UPDATE admin SET numclient = :nv_numclient WHERE id = \'1\'');
$get_client->execute(array('nv_numclient' => $_POST['numclient']));


header('Location: ../../../operations/facture');
?>
