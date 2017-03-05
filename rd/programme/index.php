
	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
		<img class=banniere src="../../../images/bannieres/<?php echo $admin['numproduit']; ?>/<?php echo $admin['numdossier']; ?>/banniere.png" alt="Musth" width="100%" />



	<br>	
	<?php
	$sql1 = 'SELECT
		numdossier,
		date_depart,
		date_retour
		FROM clients WHERE numclient = '.$admin['numclient'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0>
		<tr valign=top  >
		<?php if (isset($client['numdossier']) ) { ?>	
			<?php
			$sql2 = 'SELECT * FROM dossiers WHERE numdossier = '.$client['numdossier'].' ';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($dossier = mysql_fetch_assoc($req2)) { ?>
			<td>	<h1><?php echo $dossier['titre']  ; ?></h1>															</td>	
			<td align="right"><?//WIDGET WEEZEVENT
				$niv = '';include($niv.'weezevent.php');?>
			</td>
		</tr>
	</table>
	<table border=0 cellpadding=0 cellspacing=0>
		<tr>
			<td style="width:48%;text-align:justify;"><?php echo $dossier['descriptif']  ; ?>											<td>
		<tr>
			<td><br>																				</td>
		</tr>	
		<tr>
			<td><a><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OFFRES DE PROGRAMME</h4></a>													</td>
	</table>
		<?php } //$get_dossier ?>
		<?php } //isset_dossier ?>
	<?php
	$sql3 = 'SELECT  
					numclient,	
					numcontact,
					jours,
					programme,
					detailprog,
					DAY(syn_date) AS jour,
					MONTH(syn_date) AS mois,
					YEAR(syn_date) AS annee,
					DATE(syn_date) AS date
						FROM synoptique
					WHERE numclient = '.$admin['numclient'].'
					AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
					AND attribut = \'programme\' 
					ORDER BY jours ASC 

					';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($synoptique = mysql_fetch_assoc($req3)) { ?>
 
	<table border=0 cellpadding=0 cellspacing=0>
		<tr>
			<td style="width:48%;text-align:justify;" valign=top><b style="color: #214d7e;"><?php echo $synoptique['jours']; ?> : <?php echo $synoptique['programme']; ?> &#8250;</b>     
					 <?php echo $synoptique['detailprog']; ?>
					<br><br>
			</td>
			<td style="width:4%;">	
			<td style="width:48%;" valign=top>
	<?php if (isset($synoptique['numcontact'] ) ) { ?>
	<?php
	$sql4 = 'SELECT * FROM contacts WHERE numcontact = '.$synoptique['numcontact'].'  ';
	$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
	while($contact = mysql_fetch_assoc($req4)) { ?>
				<a href="hebergement"><b style="color: #214d7e;"><?php echo $contact['nom_firme'] ; ?> &#8250;</b></a>
	<?php } //$get_contact ?>			
	<?php } //isset_contact ?>			
			</td>
		</tr>
		<tr>	
			<td>			<div id="filet" ></div>																</td>	
		</tr>	
	</table>
	<?php } //$get_synoptique  ?>

	<?php } //$get_client ?>

	<?php $niv = ''; include($niv.'mentions-legales.php');?>
	<?php } mysql_close(); ?>
