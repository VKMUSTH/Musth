<?php require "../../connexion_sql.php"; ?>
<?php 

$actualiser_numdossier = $bdd->prepare('UPDATE admin SET numdossier = :nv_numdossier WHERE id = \'1\'');
$actualiser_numdossier->execute(array('nv_numdossier' => $_POST['numdossier']));

header('Location: modifier');
?>
