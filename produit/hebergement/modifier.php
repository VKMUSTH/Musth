<?php require "../../connexion_sql.php"; ?>
<?php

$req = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$req->execute(array('nv_position' => $_POST['position'],));

$req2 = $bdd->prepare('UPDATE admin SET numcontact = :nv_numcontact WHERE id = \'1\'');
$req2->execute(array('nv_numcontact' => $_POST['numcontact'],));


header('Location: modifier');
?>
