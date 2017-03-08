<?php require "../connexion_sql.php"; ?>
<?php

$set_date = $bdd->prepare('UPDATE admin SET date_en_cours = :nv_date_en_cours WHERE id = \'1\'');
$set_date->execute(array('nv_date_en_cours' => $_POST['date_en_cours']));

$set_jour = $bdd->prepare('UPDATE admin SET jour_en_cours = :nv_jour_en_cours WHERE id = \'1\'');
$set_jour->execute(array('nv_jour_en_cours' => $_POST['jour_en_cours']));

header('Location: jour');
?>
