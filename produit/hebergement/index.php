	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php if (isset($admin['numclient']) ) {?>
	<?php
	$sql1 = 'SELECT 
	numproduit,
	numdossier,	
	date_depart,
	date_retour
		FROM clients
	WHERE numclient = '.$admin['numclient'].'
	';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<?php
		$sql2 = 'SELECT * FROM dossiers WHERE numdossier = '.$client['numdossier'].'';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($name = mysql_fetch_assoc($req2)) { ?>
			<td colspan=6>	<h1><?php echo $name['titre']; ?></h1>															</td>
		<?php } //$get_name ?>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
			<input type="button" onclick="location.href='nouveau_hebergement'" value="Ajouter" />
		</tr>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD COLSPAN=10 ALIGN=CENTER VALIGN=MIDDLE >		<B>HEBERGEMENT</B>												</TD>	
		</TR>
		<TR class="niv2">
			<TD STYLE="width:5%;">					<B>Jour</B>													</TD>
			<TD STYLE="width:10%; ">				<B>Localité</B>													</TD>
			<TD STYLE="width:5%;">					<B>Nuitées</B>													</TD>
			<TD STYLE="width:10%;">					<B>Type</B>													</TD>
			<TD STYLE="width:9%;">					<B>Formule</B>													</TD>
			<TD STYLE="width:20%; " >				<B>Nom</B>													</TD>
			<TD STYLE="width:9%;">					<B>D. arrivée</B>												</TD>
			<TD STYLE="width:9%;">					<B>H. arrivée</B>												</TD>
			<TD STYLE="width:9%;">					<B>Commentaire</B>												</TD>
			<TD STYLE="width:10%; " class="display" >		<B>Commande</B>													</TD>
		</TR>

			<?php
			$sql3 = 'SELECT 
				position,
				numcontact,
				jours,
				nuitees,
				formule,
				date_arrivee,
				horaire,
				commentaire,
				DAY(syn_date) AS jour,
				MONTH(syn_date) AS mois,
				YEAR(syn_date) AS annee,
				DATE(syn_date) AS date
					FROM synoptique 
				WHERE numclient = '.$admin['numclient'].'
				AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
				AND attribut = \'hebergement\' 
				ORDER BY jours ASC 
				';
			$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
			while($hebergement = mysql_fetch_assoc($req3)) { ?>

				<?php if (isset($hebergement['numcontact']) ) {	?>
				<?php
				$sql4 = 'SELECT * FROM contacts WHERE numcontact = '.$hebergement['numcontact'].'  ';
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				while($contacts = mysql_fetch_assoc($req4)) { ?>
		<TR class="niv3">
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $hebergement['position']  ; ?>"  hidden  />
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $hebergement['numcontact']  ; ?>"  hidden  />
			<TD STYLE="border-left: 1px solid #b8bec3;"><?php echo $hebergement['jours']  ; ?>											</TD>
			<TD>	<?php echo $contacts['ville']  ; ?>																</TD>
			<TD>	<?php echo $hebergement['nuitees']  ; ?>															</TD>
			<TD>	<?php echo $contacts['metier']  ; ?>																</TD>
			<TD>	<?php echo $hebergement['formule']  ; ?>															</TD>
			<TD>	<?php echo $contacts['nom_firme']  ; ?>																</TD>
			<TD>	<?php echo $hebergement['date_arrivee']  ; ?>															</TD>
			<TD>	<?php echo $hebergement['horaire']  ; ?>															</TD>
			<TD>	<?php echo $hebergement['commentaire']  ; ?>															</TD>
			<TD STYLE="border-right: 1px solid #b8bec3;border-left: 1px solid #b8bec3;" class="display"><button type="submit" class="button">[Modifier]</button>			</TD>
				</form>
		</TR>
		<tr>
			<td colspan=10>		<div id="filet"></div>	</td>		
		</tr>
				<?php } //$get_contacts ?>
				<?php } //isset sql4 ?>
		<?php } //$get_hebergement ?>
	</table>
	<?php
		}} //isset sql1
	    } mysql_close();
	?> 
