<?php
// on se connecte à MySQL
$db = mysql_connect('localhost', 'root', 'votre_mdp');

// on sélectionne la base
mysql_select_db('Musth',$db);
?>
<?php try {$bdd = new PDO('mysql:host=localhost;dbname=Musth', 'root', 'votre_mdp');} catch(Exception $e) {die('Erreur : '.$e->getMessage());} ?>
