	<?php require "../../../connexion_sql.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php
	$sql3 = 'SELECT 
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
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req3)) { ?>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=8 ALIGN=CENTER VALIGN=MIDDLE >				<a href="../../../produit/transport"><B>TRANSPORT</B></a>					</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:20%; border-left: 1px solid #b8bec3; " >		<B>Type</B>											</TD>
			<TD STYLE="width:15%;" >						<B>Départ de</B>										</TD>
			<TD STYLE="width:10%;" >						<B>Date</B>											</TD>
			<TD STYLE="width:5%;" >							<B>Heure*</B>											</TD>
			<TD STYLE="width:15%;" >						<B>Arrivée à</B>										</TD>
			<TD STYLE="width:10%;" >						<B>Date</B>											</TD>
			<TD STYLE="width:5%;" >							<B>Heure*</B>											</TD>	
			<TD STYLE="width:20%; border-right: 1px solid #b8bec3" >		<B>Compagnie/Commentaire</B>									</TD>
		</TR>
		<?php
		$sql1 = 'SELECT 
			departde,
			DAY(date_depart) AS jour,
			MONTH(date_depart) AS mois,
			YEAR(date_depart) AS annee,
			DATE(date_depart) AS date_depart, 
			heuredepart,
			arriveea, 
			date_arrivee,
			heurearrivee, 
			commentaire 
				FROM synoptique 
			WHERE numclient = '.$client['numclient'].'
			AND STR_TO_DATE(DATE(date_depart), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND attribut = \'transport\'  
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($transport = mysql_fetch_assoc($req1)) { ?>
				<?php if (isset($client['numcontact']) ) { ?>	
				<?php
				$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$client['numcontact'].' ';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($contacts = mysql_fetch_assoc($req2)) { ?>
		<TR ALIGN=LEFT class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3"  >				<?php echo $contacts['metier']; ?>								</TD>
			<TD>									<?php echo $transport['departde']; ?>								</TD>
			<TD>									<?php echo $transport['date_depart']; ?>							</TD>
			<TD>									<?php echo $transport['heuredepart']; ?>							</TD>
			<TD>									<?php echo $transport['arriveea']; ?>								</TD>
			<TD>									<?php echo $transport['date_arrivee']; ?>							</TD>
			<TD>									<?php echo $transport['heurearrivee']; ?>							</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; " >				<?php echo $transport['commentaire']; ?>							</TD>
		</TR>	
		<tr>
			<td colspan=8>		<div id="filet"></div>	
				<?php } //$get_contacts ?>
				<?php } //isset_contacts ?>
		<?php } //$get_transport  ?>
		<TR ALIGN=LEFT >
			<TD STYLE="border-top: 1px solid #b8bec3; " ><B></B>															</TD>
			<TD STYLE="border-top: 1px solid #b8bec3; " ><B></B>															</TD>
			<TD STYLE="border-top: 1px solid #b8bec3; " ><B></B>															</TD>
			<TD STYLE="border-top: 1px solid #b8bec3; " ><B></B>															</TD>
			<TD STYLE="border-top: 1px solid #b8bec3; " ><B></B>															</TD>
			<TD STYLE="border-top: 1px solid #b8bec3; " ><B></B>															</TD>
			<TD STYLE="border-top: 1px solid #b8bec3; " ><B></B>															</TD>
			<TD STYLE="border-top: 1px solid #b8bec3; " ><B></B>															</TD>
		</TR>
		<TR>
			<TD COLSPAN=8 HEIGHT=16 ALIGN=LEFT VALIGN=MIDDLE><I><FONT SIZE=1>
			*Les horaires sont donnés à titre indicatif. Les horaires définitifs seront connus environ une semaine avant le départ.					
			</FONT></I>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=8 HEIGHT=16 ALIGN=JUSTIFY VALIGN=MIDDLE><I><FONT SIZE=1>
			*Vols spéciaux : Les prix sont calculés de façon forfaitaire et basés sur un certain nombre de nuits. De ce fait, si en raison des horaires imposés par les compagnies 
			aériennes, la première et la dernière journée se trouvaient écourtées par une arrivée tardive ou un départ matinal, aucun remboursement ne pourrait avoir lieu.
			</FONT></I>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=8 HEIGHT=16 ALIGN=JUSTIFY VALIGN=MIDDLE><I><FONT SIZE=1>
			*Vols réguliers : Sous réserve de la modification des horaires de la compagnie. En cas de non-respect de l'obligation d'information prévue au 14ème alinéa de l'article 
			R. 211-6, l'acheteur peut résilier le présent contrat et obtenir le remboursement sans pénalités des sommes versées.</FONT></I>
			</TD>
		</TR>
	</TABLE>
	<?php } //$get_client ?>
	<?php } mysql_close(); ?>
