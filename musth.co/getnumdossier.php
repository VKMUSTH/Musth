<?php
try { $bdd = new PDO('mysql:host=localhost;dbname=Musth', 'root', 'your_password'); } catch(Exception $e) { die('Erreur : '.$e->getMessage()); } 

$set_numdossier = $bdd->prepare('UPDATE admin SET  numdossier = :nv_numdossier WHERE id = \'1\'');
$set_numdossier->execute(array('nv_numdossier' => $_POST['numdossier']));
header('Location: ..');
?>
