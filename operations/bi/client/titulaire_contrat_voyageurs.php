	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<!--TITULAIRE CONTRAT VOYAGEURS-->
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD STYLE="width:50%" COLSPAN=2>		<a href="../../../communication/contact"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TITULAIRE DU CONTRAT</B></a>
			<TD ALIGN=CENTER COLSPAN=2  >			<a href="../../voyageurs"><B>VOYAGEURS</B></a>										</TD>
		</TR>
		<TR class="niv3">
			<TD STYLE="width:15%; border-left: 1px solid #b8bec3" HEIGHT=16 ALIGN=LEFT>Civilité&nbsp;:										</TD>
			<TD STYLE="width:35%; border-right: 1px solid #b8bec3" ALIGN=LEFT>				<?php echo $titulaire['civilite']; ?>					</TD>
			<TD STYLE="width:25%; border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3"  ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#eff2f7">	<B>NOM</B>			</TD>
			<TD STYLE="width:25%; border-bottom: 1px solid #b8bec3; border-right: 1px solid #b8bec3" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#eff2f7">	<B>PRENOM</B>			</TD>
		</TR>
		<TR class="niv3">
			<TD  STYLE="border-left: 1px solid #b8bec3"  >		Nom&nbsp;:													</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">		<?php echo $titulaire['nom']; ?>										</TD>
			<td rowspan=7 colspan=2 VALIGN=TOP>
	<table border=0 cellpadding=0 cellspacing=0 >
	<?php
	$sql1 = 'SELECT 
			numcontact,
			numvoyageur,
			DAY(date_voyageur) AS jour,
			MONTH(date_voyageur) AS mois,
			YEAR(date_voyageur) AS annee,
			DATE(date_voyageur) AS date 
				FROM voyageurs 
			WHERE numclient = '.$admin['numclient'].'
			AND STR_TO_DATE(DATE(date_voyageur), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND attribut =\'voyageur\' 
			ORDER BY numvoyageur ASC limit 0, 7
			';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($voyageurs = mysql_fetch_assoc($req1)) { ?>
	<?php if (isset($voyageurs['numcontact']) ) {?>	
	<?php
	$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$voyageurs['numcontact'].'  ';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($contact = mysql_fetch_assoc($req2)) { ?>
		<tr class="niv3">
			<TD  STYLE="border-left: 1px solid #b8bec3" ><?php echo $contact['nom']; ?>												</TD>
			<TD  STYLE="border-right: 1px solid #b8bec3" ><?php echo $contact['prenom']; ?>												</TD>
	<?php } //$get_contact ?>
	<?php } //isset_contact ?>
	<?php } //$get_voyageurs ?>
	</table>
		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3" >		Prénom :													</TD>
			<TD STYLE="border-right: 1px solid #b8bec3" >			<?php echo $titulaire['prenom']; ?>									</TD>
		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3" >		Firme&nbsp;:													</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">			<?php echo $titulaire['nom_firme']; ?>									</TD>
		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3" >		Adresse&nbsp;:													</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">			<?php echo $titulaire['adresse']; ?>									</TD>
		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3" >		Code postal&nbsp;:												</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">			<?php echo $titulaire['code_postal']; ?>								</TD>
		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3" >		Ville&nbsp;:													</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">			<?php echo $titulaire['ville']; ?>									</TD>
		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3" >		Tel Mobile&nbsp;:												</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">			<?php echo $titulaire['tel_mobile']; ?>									</TD>
		<TR class="niv3">			
			<TD STYLE="border-left: 1px solid #b8bec3" >		Tel Fixe&nbsp;:													</TD>
			<TD STYLE="border-right: 1px solid #b8bec3">			<?php echo $titulaire['tel_fixe']; ?>									</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		<BR>														</TD>
			<TD STYLE="border-right: 1px solid #b8bec3" >		<BR>														</TD>
		</TR>
		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3" >		eMail&nbsp;:													</TD>
			<TD>								<?php echo $titulaire['email']; ?>									</TD>
	<?php
	$sql3 = 'SELECT 
		ROUND(SUM(unit)) as somme, 
		DAY(date_voyageur) AS jour,
		MONTH(date_voyageur) AS mois,
		YEAR(date_voyageur) AS annee,
		DATE(date_voyageur) AS date 
			FROM voyageurs 
		WHERE numclient = '.$admin['numclient'].'
		AND STR_TO_DATE(DATE(date_voyageur), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
		AND attribut = \'voyageur\'
		';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($somme = mysql_fetch_assoc($req3)) { ?>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		Nombre de voyageurs :												</TD>
			<TD STYLE="border-right: 1px solid #b8bec3" >			<p><?php echo $somme['somme']; ?></p>	
	<?php } //$get_somme ?>
		</TR>
		<TR class="niv3">
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3" >	<BR>											</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3; " >				<BR>											</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3" COLSPAN=2 >
										<a href="/operations/voyageurs"><B>Liste complète des voyageurs en Annexe</B></a>			</TD>
		</TR>
		<TR>
			<TD COLSPAN=4 HEIGHT=26 ALIGN=JUSTIFY><I><FONT SIZE=1>	Ces informations sont confidentielles et destinées à votre agence qui s'engage à ne pas les 
										transmettre. Vous disposez d'un droit d'accès, de modification, de rectification et de suppression 
										des données qui vous concernent (art. 34 de la loi Informatique et Libertés du 6 janvier 1978, que 
										vous pouvez exercer à tout moment).</FONT></I>									</TD>
		</TR>
	</TABLE>
	<?php } mysql_close(); ?>
