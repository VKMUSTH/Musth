	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php
	$sql1 = 'SELECT 
		numproduit,
		numdossier,
		numclient,
		numcontact,
		date_depart,
		date_retour,
		facturation_debut,
		facturation_fin,
		date_cdv
			FROM clients 
		WHERE numclient = '.$admin['numclient'].'
		';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req1)) { ?>

	<?php											//TITRE
		include($niv.'titre.php');
												//BARRE + CONFIRMER DEVIS			
		include($niv.'barre.php');
	?>
	<?php if (isset($client['numcontact']) ) {?>	
	<?php
	$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$client['numcontact'].'  ';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($titulaire = mysql_fetch_assoc($req2)) { ?>
	<?php											//TITULAIRE DU CONTRAT - VOYAGEURS?>
	<?php	include($niv.'titulaire_contrat_voyageurs.php');?> 
	<?php } //$get_titulaire ?>		
	<?php } //isset_titulaire ?>		
	<?php											//INFORMATION VOYAGE - DESTINATION
		include($niv.'info_voyage_destination.php');
												//TRANSPORT
		include($niv.'transport.php'); 
												//HEBERGEMENT
		include($niv.'hebergement.php'); 
												//RESTAURATION
		include($niv.'restauration.php');
												//VISITES
		include($niv.'visites.php');
												//ACTIVITES
		include($niv.'activites.php');
												//ASSURANCES CETTE PARTIE EST EN CONSTRUCTION
		//	if (isset($admin['numdossier']) ) {	
		//	$repons9 = $bdd->prepare('SELECT * FROM produitassurances WHERE numdossier = ? ');
		//	$repons9->execute(array($admin['numdossier']));
		//	while ($donnees9 = $repons9->fetch()){
		//		$niv = ''; include($niv.'assurances.php');
		//	}$repons9->closeCursor(); } else {} 
												//DECOMPTE
		include($niv.'decompte.php'); 
												//ACOMPTES
		include($niv.'acomptes.php'); 
												//CONDITIONS ANNULATION
		include($niv.'conditions_annulation.php'); 
												//FORMALITES
			//if (isset($admin['numdossier']) ) {	
			//$repons12 = $bdd->prepare('SELECT * FROM formalites WHERE numdossier = ? ');
			//$repons12->execute(array($admin['numdossier']));
			//while ($donnees12 = $repons12->fetch()){
		include($niv.'formalites.php');
			//}$repons12->closeCursor(); } else {}
												//COMMENTAIRES + SIGNATURES
		include($niv.'commentaires.php'); 
												//ANNEXE VOYAGEURS
		include($niv.'voyageurs.php'); 
												//MENTIONS LEGALES
		include($niv.'mentions_legales.php');
	?>
	<?php } //$get_client ?>
	<?php } mysql_close(); ?>
