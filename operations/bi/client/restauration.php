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
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR COLSPAN=5 class="niv1"  VALIGN=MIDDLE>
			<TD STYLE="width:100%" COLSPAN=2 ALIGN=CENTER >				<a href="../../../produit/restauration"><B>RESTAURATION</B></a>					</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3"  >	<B>Date</B>												</TD>
			<TD STYLE="width:90%; border-right: 1px solid #b8bec3" >	<B>Prestation</B>											</TD>
		</TR>
		<?php
		$sql2 = 'SELECT
			DAY(date_arrivee) AS jour,
			MONTH(date_arrivee) AS mois,
			YEAR(date_arrivee) AS annee,
			DATE(date_arrivee) AS date_arrivee,
			attribut,
			designation	 
				FROM synoptique 
			WHERE numclient = '.$admin['numclient'].'
			AND STR_TO_DATE(DATE(date_arrivee), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"			
			AND attribut = \'restauration\' 
			ORDER BY date_arrivee ASC 
			';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($restauration = mysql_fetch_assoc($req2)) { ?>
		<TR ALIGN=LEFT class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3" ><?php echo $restauration['date_arrivee']; ?>										</TD>
			<TD STYLE="border-right: 1px solid #b8bec3"><?php echo $restauration['designation']; ?>											</TD>
		</TR>
		<TR>
			<td colspan=2>		<div id="filet"></div>																</td>
		</TR>
		<?php } //$get_restauration ?>
		<TR ALIGN=LEFT>
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3" >		<BR>										</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-right: 1px solid #b8bec3" >		<BR>										</TD>
		</TR>
	</TABLE>
	<?php } //$get_client ?>
	<?php } mysql_close(); ?>
