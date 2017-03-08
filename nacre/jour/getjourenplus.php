<?php require "../../connexion_sql.php"; ?>
<?php
$modifier_transport = $bdd->prepare('UPDATE retroplanning SET 	 
	date = :nv_date
		WHERE position =  '.$_POST['position'].' ');

$modifier_transport->execute(array(
	'nv_date' => $_POST['date']
		));
header('Location: ../jour');
?>
