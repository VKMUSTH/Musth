	<?php require "../../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php
	$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($dossiers = mysql_fetch_assoc($req1)) { ?>
	<?php
	$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].' ';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($contact = mysql_fetch_assoc($req2)) { ?>
	<?php											//ENTETE?>				
	<?php	$niv = '../../';include($niv.'entete.php'); ?>
	<?php	$niv = '';include($niv.'titre.php'); 						//TITRE?>
	<?php	$niv = '';include($niv.'texte-voucher/texte_voucher1.php');			//TEXTE VOUCHER?>
	<?php
	$sql3 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].'  ';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($voucher = mysql_fetch_assoc($req3)) { ?>
	<?php	$niv = '';include($niv.'texte-voucher/texte_voucher2.php');?>
	<?php }	//$getvoucher ?>
	<?php	$niv = '';include($niv.'texte-voucher/texte_voucher3.php');?>
	<br>
	<?php											//VOTRE VOYAGE?>
	<?php
	$sql4 = 'SELECT * FROM produits WHERE numproduit = '.$admin['numproduit'].'  ';
	$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
	while($produit = mysql_fetch_assoc($req4)) { ?>
	<?php	$niv = '';include($niv.'votre-voyage/votre_voyage1.php');?>
	<?php } //$getproduit ?>
	<br>
	<?php	$niv = '';include($niv.'important.php'); 					//IMPORTANT?>
	<br>
	<?php	$niv = '';include($niv.'signature.php'); 					//SIGNATURES?>
	<br>	
	<?php	$niv = '';include($niv.'../../../mentions-legales/mentions-legales.php');	//MENTIONS LEGALES?>
	<?php } //$get_identite ?>
	<?php } //$get_dossiers ?>
	<?php } mysql_close(); ?>
