<?php require "../../../../../connexion_sql.php"; ?>
<?php

$req = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$req->execute(array('nv_position' => $_POST['position'] 	));

header('Location: modifier');
?>
