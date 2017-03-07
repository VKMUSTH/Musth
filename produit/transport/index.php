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
				<input type="button" onclick="location.href='nouveau_transport'" value="Ajouter" />
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >		<B>TRANSPORT</B>												</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:3%; ">					<B>Jour</B>													</TD>
			<TD STYLE="width:15%;">					<B>Départ de</B>												</TD>
			<TD STYLE="width:5%;">					<B>Date</B>													</TD>
			<TD STYLE="width:4%;">					<B>Heure*</B>													</TD>
			<TD STYLE="width:15%;">					<B>Arrivée à</B>												</TD>
			<TD STYLE="width:5%;">					<B>Date</B>													</TD>
			<TD STYLE="width:4%;">					<B>Heure*</B>													</TD>	
			<TD STYLE="width:20%;">					<B>Cie. / Commentaire</B>											</TD>
			<TD STYLE="width:5%; " class="display" >		<B>Commande</B>													</TD>	
		</TR>
		<?php
		$sql3 = 'SELECT 
			position, 
			numcontact,
			jours,
			departde,
			date_depart,
			heuredepart,
			arriveea,
			date_arrivee,
			heurearrivee,
			lien, 
			commentaire,
			DAY(syn_date) AS jour,
			MONTH(syn_date) AS mois,
			YEAR(syn_date) AS annee,
			DATE(syn_date) AS date
				FROM synoptique 
			WHERE numclient = '.$admin['numclient'].' 
			AND attribut = \'transport\'
			AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			ORDER BY jours ASC
			';
		$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
		while($transport = mysql_fetch_assoc($req3))
		{
		?>



		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3;" >		<?php echo $transport['jours']  ; ?>										</TD>
			<TD>							<?php echo $transport['departde']  ; ?>										</TD>
			<TD>							<?php echo $transport['date_depart']  ; ?>									</TD>
			<TD>							<?php echo $transport['heuredepart']  ; ?>									</TD>
			<TD>							<?php echo $transport['arriveea']  ; ?>										</TD>
			<TD>							<?php echo $transport['date_arrivee']  ; ?>									</TD>
			<TD>							<?php echo $transport['heurearrivee']  ; ?>									</TD>
				<form name="modifier" action="goto_recherchevol.php" method="post" >
				<input type="text" name="position" value="<?php echo $transport['position']  ; ?>"  id="position" HIDDEN />
			<TD STYLE="border-right: 1px solid #b8bec3;">	<span class=red><a href="<?php echo $transport['lien']; ?>"><?php echo $transport['commentaire']; ?></a></span>		</TD>
				</form>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="position" value="<?php echo $transport['position']  ; ?>"  id="position" HIDDEN />
				<input type="text" name="numcontact" value="<?php echo $transport['numcontact']  ; ?>"  id="numcontact" HIDDEN />
			<TD STYLE="border-right: 1px solid #b8bec3;" class="display">	<button type="submit" class="button">[Modifier]</button>						</TD>
				</form>
		</TR>
		<TR>
			<td colspan=9>		<div id="filet"></div>																</TD>
		</TR>			

		<?php } //$get_transport ?>
	</table>
	<?php } //$get_client ?>
	<?php
		} //isset sql1
	    } mysql_close();
	?> 
