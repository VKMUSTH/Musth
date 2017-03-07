	<?php require '../../../connexion_sql.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>	
	<?php
	$sql6 = 'SELECT 
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
	$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req6)) { ?>
	<?php if (isset($client['numproduit']) ) {?>	
	<?php
	$sql3 = 'SELECT * FROM produits WHERE numproduit = '.$client['numproduit'].' ';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($infoproduit = mysql_fetch_assoc($req3)) { ?>
	<?php if (isset($client['numdossier']) ) {?>	
	<?php
	$sql4 = 'SELECT * FROM dossiers WHERE numdossier = '.$client['numdossier'].' ';
	$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
	while($dossier = mysql_fetch_assoc($req4)) { ?>

<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1" ALIGN=CENTER VALIGN=MIDDLE>
			<TD STYLE="width:50%" COLSPAN=2 >				<a href="../../../rd/video"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INFORMATIONS VOYAGE</B></a>
			<TD STYLE="width:50%" COLSPAN=2 >				<a href="../../../rd/programme"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DESTINATION</B>
		</TR>
		<TR class="niv3" HEIGHT=20>
			<TD STYLE="width:13%; border-left: 1px solid #b8bec3">		<B>Organisateur :		</B>								</TD>
			<TD STYLE="border-right: 1px solid #b8bec3;">			<B>Musth services touristiques	</B>								</TD>
			<TD STYLE="width:13%; border-left: 1px solid #b8bec3">		<B>Destination			</B>								</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">				<?php echo $infoproduit['destination']; ?>		</TD>
		</TR>
		<TR class="niv3" HEIGHT=20>
			<TD STYLE="border-left: 1px solid #b8bec3">			<B>Statut : 			</B>								</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">				<?php echo $dossier['statut']; ?>		</TD>
			<TD STYLE="border-left: 1px solid #b8bec3">			<B>Nature :			</B>								</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">				<?php echo $infoproduit['nature']; ?>		</TD>
		</TR>
		<TR class="niv3" HEIGHT=20>
			<TD STYLE="border-left: 1px solid #b8bec3">			<B>Type de contrat :		</B>								</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">				<?php echo $dossier['type_contrat']; ?>		</TD>
			<TD STYLE="border-left: 1px solid #b8bec3">			<B>Produit :			</B>								</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">				<?php echo $infoproduit['produit']; ?>		</TD>
		</TR>
	<?php } //$get_dossier ?>
	<?php } //isset_dossier ?>
	<?php } //$get_infoproduit ?>
	<?php } //isset_infoproduit ?>
	<!--DATES-->
		<TR ALIGN=LEFT class="niv2" >
			<TD STYLE="border-left: 1px solid #b8bec3 ; border-bottom: 1px solid #b8bec3;" >	<B>Date de départ : </B>					</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3;border-right: 1px solid #b8bec3;" >
				<span class=red><?php echo $client['date_depart']; ?></span></TD>

			<TD style="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3" >		<B>Date de retour :</B>							</TD>
			<TD STYLE="border-right: 1px solid #b8bec3 ; border-bottom: 1px solid #b8bec3;" >
				<span class=red><?php echo $client['date_retour']; ?></span></TD>

	</table>
	<?php } //$get_client ?>
	<?php } mysql_close(); ?>
