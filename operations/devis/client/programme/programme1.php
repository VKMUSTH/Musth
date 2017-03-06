	<table border=0 cellpadding=0 cellspacing=0 >
		<TR STYLE="width:100%" class="niv1">
			<TD  ALIGN=LEFT VALIGN=MIDDLE COLSPAN=2  ><a href="../../../produit"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROGRAMME</B></a> 						</TD>
		</TR>
		<?php
		$sql1 = 'SELECT 
			jours,
			programme,
			detailprog,
			DAY(syn_date) AS jour,
			MONTH(syn_date) AS mois,
			YEAR(syn_date) AS annee,
			DATE(syn_date) AS date
				FROM synoptique
			WHERE numclient = '.$admin['numclient'].'
			AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND attribut = \'programme\'
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($programme = mysql_fetch_assoc($req1)) { ?>


		<tr>
			<td  STYLE="border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3" class="niv2" colspan=2>
			<A HREF=""><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JOUR <?php echo $programme['jours']  ; ?>: <?php echo $programme['programme']  ; ?> </B></A>
			</TD>
		<TR>
			<TD STYLE="width:50%; border-left: 1px solid #b8bec3; text-align:justify; "><?php echo $programme['detailprog']; ?>							</TD>
			<td STYLE="border-right: 1px solid #b8bec3"><BR>															</TD>
		</TR>
		<tr>
			<td STYLE="border-left: 1px solid #b8bec3;"><br>															</TD>
			<td STYLE="border-right: 1px solid #b8bec3"><br>															</TD>
		</TR>
			<?php } //$get_programme ?>
		<TR>
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3" HEIGHT=16 ALIGN=LEFT COLSPAN=2 ><B></B>			</TD>
		</TR>
	</table>
