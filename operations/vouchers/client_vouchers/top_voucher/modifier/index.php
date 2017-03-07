	<?php require "../../../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
	<?php
	$sql1 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($devis = mysql_fetch_assoc($req1)) { ?>
			<td>	<h1>Modifier </h1>
			<td class=inputnum><label><a>N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				<form  action="modifier.php"  method="post">
				<input type="submit" value="Enregistrer"   />
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class=niv1 >
			<TD COLSPAN=3 ><B>INFORMATIONS IMPORTANTES CONCERNANT LES PRÉPARATIFS</B>						</TD>
		</TR>
		<TR class=niv2 >
			<TD colspan=2 rowspan=3 ><textarea  cols=110 rows=15 name="voucher" id="voucher"  value="<?php echo $devis['voucher']; ?>" ><?php echo $devis['voucher']; ?></textarea></TD>
		</TR>
	</form>
	</table>
	<?php } //$getdevis ?>
	<?php } mysql_close(); ?>
