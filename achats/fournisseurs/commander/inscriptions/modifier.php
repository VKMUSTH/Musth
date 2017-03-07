<?php require "../../../../connexion_sql.php"; ?>
<?php
$actualiser_numinscription = $bdd->prepare('UPDATE admin SET numinscription = :nv_numinscription WHERE id = \'1\'');
$actualiser_numinscription->execute(array('nv_numinscription' => $_POST['numinscription']));
header('Location: modifier');
?>
