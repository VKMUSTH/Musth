	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top class="niv1"  >
			<td><B>QUESTIONS CLIENT</B>
			<TD class="inputnum">	<input type="button" onclick="location.href='historique/ajouter'" value="Ajouter" /></TD>

	<?php
	$sql1 = 'SELECT * FROM historique_emails WHERE numclient = '.$admin['numclient'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($affichage = mysql_fetch_assoc($req1)) { ?>
		<TR class="niv3">
			<TD><input type="submit" href="<?php echo $affichage['lien']  ; ?>" hidden/><a href="<?php echo $affichage['lien']  ; ?>">
					<span class=green><b><?php echo $affichage['libelle']  ; ?></span></b></a>	</TD>
				<form name="modifier" action="historique/modifier.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $affichage['position']  ; ?>"  hidden />
			<td><button type="submit" class="button">[Modifier]</button></TD>
				</form>
		</TR>
		<?php } //$get_affichage ?>
	</table>
