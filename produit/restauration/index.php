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
			<input type="button" onclick="location.href='ajouter'" value="Ajouter" />
		</tr>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
				<TD  COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE >	<B>RESTAURATION</B>												</TD>	
		</TR>
		<TR class="niv2">
				<TD STYLE="width:5%;  " >			<B>Jour</B>													</TD>
				<TD STYLE="width:10%;  " >			<B>Date</B>													</TD>
				<TD STYLE="width:60%;">				<B>Prestation</B>												</TD>
				<TD STYLE="width:15%;  " >			<B>Horaire</B>													</TD>
				<TD STYLE="width:10%;" class="display">		<B>Commande</B>													</TD>	
		</TR>
		<?php
		$sql3 = 'SELECT 
			position, 
			numcontact, 
			jours,
			date_arrivee,
			designation,
			horaire,
			DAY(syn_date) AS jour,
			MONTH(syn_date) AS mois,
			YEAR(syn_date) AS annee,
			DATE(syn_date) AS date
				FROM synoptique 
			WHERE numclient = '.$admin['numclient'].'
			AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND attribut = \'restauration\'  
			ORDER BY jours ASC ';
		$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
		while($restauration = mysql_fetch_assoc($req3)) { ?>
		<TR class="niv3">
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="numcontact" value="<?php echo $restauration['numcontact']  ; ?>"  id="numcontact" hidden />
				<input type="text" name="position" id="position" value="<?php echo $restauration['position']  ; ?>" HIDDEN />	
			<TD STYLE="border-left: 1px solid #b8bec3;">		<?php echo $restauration['jours']  ; ?>										</TD>
			<TD>							<?php echo $restauration['date_arrivee']  ; ?>									</TD>
			<TD>							<?php echo $restauration['designation']  ; ?>									</TD>
			<TD STYLE="border-right: 1px solid #b8bec3;">		<?php echo $restauration['horaire']  ; ?>									</TD>
			<TD STYLE="border-right: 1px solid #b8bec3;" class="display" ><button type="submit" class="button">[Modifier]</button>							</TD>
				</form>
		</TR>
		<TR>
			<td colspan=5>		<div id="filet"></div>																</TD>
		</TR>
		<?php } //$get_restauration ?>
	</table>
	<?php } //$get_client ?>
	<?php
		} //isset sql1
	    } mysql_close();
	?> 
