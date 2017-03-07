	<table border=0 cellpadding=0 cellspacing=0 >
		<TR CLASS="niv1">
			<TD COLSPAN=4 ALIGN=CENTER VALIGN=MIDDLE>		<B>INSCRIPTIONS COMPTABLES						</B>	</TD>
			<TD>			<input type="button" onclick="location.href='ajouter_ins'" value="Ajouter" />					</TD>
		</TR>
		<tr class="niv2">
			<td STYLE="width:10%;"><b>DATE</b>													</td>
			<td STYLE="width:60%;"><b>DÉSIGNATION</b>												</td>
			<td STYLE="width:10%;"><b>ÉTAT</b>													</td>
			<td STYLE="width:10%;"><b>MONTANT</b>													</td>
			<td STYLE="width:10%;"><b>COMMANDE</b>													</td>
		</tr>
		<?php
		$sql1 = 'SELECT 
			position,
			numproduit,
			numdossier,
			numitem,
			inscription,
			etat,
			debit,
			DAY(lj_date) AS jour,
			MONTH(lj_date) AS mois,
			YEAR(lj_date) AS annee,
			DATE(lj_date) AS date
				FROM livre_journal
			WHERE numcommande = ' .$admin['numcommande'] . ' 
			AND compte = \'achats-commande-ajouter-ins\'
			ORDER BY jour DESC
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($data = mysql_fetch_assoc($req1)) { ?>
		<TR class="niv3" ALIGN=LEFT>
			<TD><?php echo $data['date']  ; ?>													</TD>
			<TD><?php echo $data['inscription']  ; ?>												</TD>
			<TD><?php echo $data['etat']  ; ?>													</TD>
			<TD><?php echo $data['debit']  ; ?>													</TD>
			<form name="modifier" action="inscriptions/modifier.php"  method="post">
			<input type="text" name="numinscription" value="<?php echo $data['position']  ; ?>" id="numinscription" hidden />	
			<td STYLE="border-right: 1px solid #b8bec3;" class="display"><button type="submit" class="button">Modifier</button>			</td>
			</form>
		</TR>
		<TR>
			<TD COLSPAN=4>		<div id="filet"></div>												</TD>
		</TR>		
			<?php } //$get_data ?>
		<!-- DEBUT TOTAL ----------------------------------------------------------------------------------------------------------------------------------->	
		<tr class="niv1">
			<td>																	</td>
			<td>																	</td>
			<td>																	</td>
			<?php $sql2 = 'SELECT ROUND(SUM(debit),2) as total FROM livre_journal WHERE numcommande = ' .$admin['numcommande'] . ' AND attribut = \'ins\'';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($total = mysql_fetch_assoc($req2)) { ?>
			<TD align=left>	<b><?php echo $total['total']; ?></b>											</td>
			<?php } //$get_total  ?>
			<td>																	</td>
		</tr>
		<!-- FIN TOTAL ------------------------------------------------------------------------------------------------------------------------------------->	
	</table>
