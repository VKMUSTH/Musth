<?php require "../connexion_sql.php"; ?>
<?php
$actualiser = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$actualiser->execute(array('nv_position' => $_POST['position']));

header('Location: modifier');
?>
