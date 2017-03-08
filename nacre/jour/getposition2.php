<?php require "../../connexion_sql.php"; ?>
<?php
$actualiserposition2 = $bdd->prepare('UPDATE admin SET position2 = :nv_position2 WHERE id = \'1\'');
$actualiserposition2->execute(array('nv_position2' => $_POST['position2']	));

header('Location: ../jour');
?>
