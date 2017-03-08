		<?php
		$sql1 = 'SELECT ROUND(SUM(pdv_tot),2) as tarif FROM livre_journal WHERE numclient = '.$admin['numclient'].' AND attribut =\'cmd\' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($votretarif = mysql_fetch_assoc($req1)) { ?>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1" ALIGN=LEFT VALIGN=MIDDLE>
			<TD STYLE="width:40%" ><a href="../../../achats/items"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VOTRE TARIF </B></a><TD STYLE="width:60%" >
		<B>: <?php echo $votretarif['tarif']  ; ?> €</B>
	</table>
	<br>
	<?php } //$votretarif->closeCursor(); ?>
