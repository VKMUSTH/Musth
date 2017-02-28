<?php
try { $bdd = new PDO('mysql:host=localhost;dbname=Musth', 'root', 'your_password'); } catch(Exception $e) { die('Erreur : '.$e->getMessage()); } 

$set_numproduit = $bdd->prepare('UPDATE admin SET numproduit = :nv_numproduit WHERE id = \'1\'');
$set_numproduit->execute(array('nv_numproduit' => $_POST['numproduit']));
header('Location: ..');
?>
