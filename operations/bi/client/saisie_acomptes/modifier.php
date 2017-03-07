<?php require "../../../../connexion_sql.php"; ?>
<?php
$modifier = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$modifier->execute(array('nv_position' => $_POST['position'] ));

$modifier = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$modifier->execute(array('nv_numcontact' => $_POST['numcontact'] ));


header('Location: modifier');
?>
