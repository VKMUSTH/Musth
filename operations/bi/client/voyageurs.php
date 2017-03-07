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
			<TD COLSPAN=7 HEIGHT=16 ALIGN=CENTER VALIGN=MIDDLE ><a href="../../voyageurs">	<B>ANNEXE - LISTE DES VOYAGEURS – REPARTITION DES CHAMBRES</B></a>			</td>
		</TR>
		<TR ALIGN=LEFT class="niv2">
			<TD STYLE="width:5%" class="display" align=center>		<B>#</B>												</TD>
			<TD STYLE="width:10%" >						<B>Civilité</B>												</TD>
			<TD STYLE="width:10%" >						<B>Nom</B>												</TD>
			<TD STYLE="width:10%" >						<B>Prénom</B>												</TD>
			<TD STYLE="width:10%" >						<B>Age</B>												</TD>
			<TD STYLE="width:10%" >						<B>Chambre</B>												</TD>
			<TD STYLE="width:45%" >						<B>Commentaire</B>											</TD>
		</TR>
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
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($voyageurs = mysql_fetch_assoc($req1)) { ?>
			<?php if (isset($voyageurs['numcontact']) ) { ?>	
			<?php
			$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$voyageurs['numcontact'].'';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($contacts = mysql_fetch_assoc($req2)) { ?>

		<TR ALIGN=LEFT  class="niv3" >
				<form name="client" action="goto_acomptes.php" method="post" >
				<input type="text" name="numvoyageur"	id="numvoyageur"		value="<?php echo $voyageurs['numvoyageur']  ; ?>" 	hidden />
				<input type="text" name="numcontact"	id="numcontact"		value="<?php echo $contacts['numcontact']  ; ?>" 	hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; " class="display">	<button type="submit" class="button"><?php echo $voyageurs['numvoyageur']  ; ?></button>		</td>	
				</form>
			<TD>								<?php echo $contacts['civilite']; ?>									</TD>
			<TD>								<?php echo $contacts['nom']; ?>										</TD>
			<TD>								<?php echo $contacts['prenom']; ?>									</TD>
			<TD>								<?php echo $contacts['naissance']; ?>									</TD>
			<TD>								<?php echo $contacts['chambre']; ?>									</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; " >			<?php echo $contacts['commentaire']; ?>									</TD>
		</TR>
		<TR>
			<td colspan=7>							<div id="filet"></div>											</td>
		</TR>
			<?php } //$get_contacts ?>
			<?php } //isset_contacts ?>
		<?php } //$get_voyageurs ?>
	</table>
	<br>	
	<?php } //$get_client ?>
	<?php } mysql_close(); ?>
