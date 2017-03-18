<?php require "../connexion_sql.php"; ?>
<?php

$set_annee_en_moins = $bdd->prepare('UPDATE admin SET annee_en_cours = :nv_annee_en_cours WHERE id = \'1\'');
$set_annee_en_moins->execute(array('nv_annee_en_cours' => $_POST['annee_en_cours'],	));

header('Location: ../dossier_financier');
?>
