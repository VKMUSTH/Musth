	<?php require "../../../connexion_sql.php"; ?>
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
	<br>
	<!--HÉBERGEMENT-->
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD STYLE="width:100%" COLSPAN=16 ALIGN=CENTER VALIGN=MIDDLE >		<a href="../../../produit/hebergement"><B>HEBERGEMENT</B></a>					</TD>
		</TR>
		<TR ALIGN=LEFT class="niv2">
			<TD STYLE="width:26%; border-left: 1px solid #b8bec3" >			<B>Nom</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Date arrivée</B>										</TD>
			<TD STYLE="width:7%;"  >						<B>Nuitées</B>											</TD>
			<TD STYLE="width:15%;" >						<B>Type héberg.</B>										</TD>
			<TD STYLE="width:7%;"  >						<B>Cat.</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Formule</B>											</TD>
			<TD STYLE="width:25%; border-right: 1px solid #b8bec3" >		<B>Commentaire</B>										</TD>
		</TR>
		<?php
		$sql2 = 'SELECT 
			DAY(date_arrivee) AS jour,
			MONTH(date_arrivee) AS mois,
			YEAR(date_arrivee) AS annee,
			DATE(date_arrivee) AS date_arrivee,
			nuitees,
			formule,
			commentaire	 
				FROM synoptique 
			WHERE numclient = '.$admin['numclient'].' 
			AND STR_TO_DATE(DATE(date_arrivee), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"			
			AND attribut = \'hebergement\'  
			ORDER BY date_arrivee ASC  
			';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($hebergement = mysql_fetch_assoc($req2)) { ?>
				<?php if (isset($client['numcontact']) ) { ?>	
				<?php
				$sql3 = 'SELECT * FROM contacts WHERE numcontact = '.$client['numcontact'].'  ';
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
				while($contacts = mysql_fetch_assoc($req3)) { ?>
		<TR STYLE="width:100%" ALIGN=LEFT class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3" >	<?php echo $contacts['nom_firme']; ?>											</TD>
			<TD>						<?php echo $hebergement['date_arrivee']; ?>										</TD>
			<TD>						<?php echo $hebergement['nuitees']; ?>											</TD>
			<TD>						<?php echo $contacts['metier']; ?>											</TD>
			<TD>						<?php echo $contacts['categorie']; ?>											</TD>
			<TD>						<?php echo $hebergement['formule']; ?>											</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">	<?php echo $hebergement['commentaire']; ?>										</TD>
		</TR>
		<TR>
			<td colspan=7>		<div id="filet"></div>																</td>
		</TR>
				<?php } //$get_contacts ?>
				<?php } //isset_contacts ?>
			<?php } //$get_hebergement ?>
		<TR STYLE="width:100%" ALIGN=LEFT>
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3" >		<BR>										</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3" >						<BR>										</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3" >						<BR>										</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3" >						<BR>										</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3" >						<BR>										</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3" >						<BR>										</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-right: 1px solid #b8bec3" >		<BR>										</TD>
		</TR>
	</TABLE>
	<?php } //$get_client ?>
	<?php } mysql_close(); ?>
