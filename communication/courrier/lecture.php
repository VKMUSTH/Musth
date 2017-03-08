<?php require "../../connexion_sql.php"; ?>
<?php
$set_position = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$set_position->execute(array('nv_position' => $_POST['position'],));

header('Location: lecture_courrier');
?>
