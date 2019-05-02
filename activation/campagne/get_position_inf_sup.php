<?php require "../../../connexion_sql.php"; ?>
<?php

$set_position_en_moins = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$set_position_en_moins->execute(array('nv_position' => $_POST['position'],	));

header('Location: ../campagne');
?>
