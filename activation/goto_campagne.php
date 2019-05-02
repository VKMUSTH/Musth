<?php require "../../connexion_sql.php"; ?>
<?php 

$get_position = $bdd->prepare('UPDATE admin SET position = :nv_position WHERE id = \'1\'');
$get_position->execute(array('nv_position' => $_POST['position']));

$get_numcampagne = $bdd->prepare('UPDATE admin SET numcampagne = :nv_numcampagne WHERE id = \'1\'');
$get_numcampagne->execute(array('nv_numcampagne' => $_POST['position']));


header('Location: campagne');
?>
