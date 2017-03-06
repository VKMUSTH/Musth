<?php require "../../../header.php"; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
	<?php // if (isset($admin['numclient']) ) {?>
		<?php
		$sql1 = 'SELECT 
		numdossier,
		numcontact,
		date_depart,
		date_retour,
		date_devis,
		devis
			FROM clients
		WHERE numclient = '.$admin['numclient'].'
		';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($client = mysql_fetch_assoc($req1)) { ?>
		<?php if (isset($client['numcontact']) ) { ?>
		<?php
		$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$client['numcontact'].'  ';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($contacts = mysql_fetch_assoc($req2)) { ?>

	<?php//BARRE?>			
			<?php $niv = ''; include($niv.'barre.php');?> 
	<?php//ENTÊTE?>			
			<?php $niv = ''; include($niv.'entete/entete1.php');?> 
	<?php//TEXTE?>
			<?php $niv = ''; include($niv.'texte/texte1.php');?> 

		<?php } //$get_contacts ?>
		<?php } //isset ?>


	<?php//VOTRE VOYAGE?>
			<?php $niv = '';include($niv.'votre_voyage.php');?>
	<?php//TARIFICATION?>
			<?php $niv = ''; include($niv.'tarification.php');?>
	<?php//PROGRAMME?>			
			<?php $niv = ''; include($niv.'programme/programme1.php');?>
	<?php//EXTENSIONS?>		
			<?php $niv = ''; include($niv.'prestations-complementaires-supplements/prestation-complementaires-supplements1.php');?> 

	<?php//REMARQUE SUR LES PRIX?>			
				<?php $niv = ''; include($niv.'remarque_prix/remarque-prix1.php');?>
	<?php//CACHET ET SIGNATURE	?>		
				<?php $niv = ''; include($niv.'cachet-signature.php');?> 
	<?php//MENTIONS LEGALES?>
				<?php $niv = '';include($niv.'../../mentions_legales/admin.php');?>
	<?php } //$get_client ?>
	<?php //}  ?>
<?php } mysql_close(); ?>
