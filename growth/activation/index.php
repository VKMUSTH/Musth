	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>	
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr>
			<td>	<h1>Landing page à créer</h1>
	</table>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE >				<B>Activation des folowers de la semaine passée</B>			</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;" >						<B>Numclient</B>							</TD>
			<TD STYLE="width:10%;" >						<B>Nom</B>								</TD>
			<TD STYLE="width:10%;" >						<B>Prénom</B>								</TD>
			<TD STYLE="width:40%; border-right: 1px solid #b8bec3" >		<B>email</B>								</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" >		<B>Commande</B>								</TD>	
		</TR>
		<?php
		$sql1 = 'SELECT  
			numproduit,
			numdossier,
			numclient,
			numcontact,
			DAY(date_cdv) AS jour,
			MONTH(date_cdv) AS mois,
			YEAR(date_cdv) AS annee,
			DATE(date_cdv) AS date
				FROM clients 
			WHERE MONTH(date_cdv) = \'09\'
			AND YEAR(date_cdv) = \'2015\'
			ORDER BY numclient DESC
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($promotion = mysql_fetch_assoc($req1)) { ?>
		<tr>
			<td><?php echo $promotion['numclient']  ; ?></td>
		</tr>	
		<?php } //$get_promotion ?>
	</table>
	<?php } mysql_close(); ?>
