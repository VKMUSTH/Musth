<?php require "../../connexion_sql.php"; ?>
<?php
$get_numcontact = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$get_numcontact->execute(array('nv_numcontact' => $_POST['numcontact']));

header('Location: historique');
?>
