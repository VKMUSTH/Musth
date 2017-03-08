<?php require "../../connexion_sql.php"; ?>
<?php
$modifier_position = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$modifier_position->execute(array('nv_position' => $_POST['position']));

$modifier_numcontact = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$modifier_numcontact->execute(array('nv_numcontact' => $_POST['numcontact']	));

header('Location: modifier');
?>
