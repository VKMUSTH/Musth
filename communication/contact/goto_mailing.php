<?php require "../../connexion_sql.php"; ?>
<?php
$select = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$select->execute(array('nv_numcontact' => $_POST['numcontact'],));

header('Location: ../../operations/facture/mailing');
?>
