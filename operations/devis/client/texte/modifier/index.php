	<?php require "../../../../../header.php"; ?>
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Modifier:</h1>																		</td>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a>N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
				<form  action="modifier.php"  method="post">
				<input type="submit" value="Enregistrer"   />
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class=niv1>
			<TD  COLSPAN=3 ><B>INFORMATIONS IMPORTANTES À COMMUNIQUER AU CLIENT</B>													</TD>
		</TR>
		<?php //if (isset($admin['numclient']) ) { ?>
		<?php
		$sql1 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].'';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($devis = mysql_fetch_assoc($req1)) { ?>
		<TR class=niv2>
			<TD  colspan=2 rowspan=3 ><textarea  cols=100% rows=15 name="devis" id="devis"  value="<?php echo $devis['devis']; ?>" ><?php echo $devis['devis']; ?></textarea>	</TD>
		</TR>
				</form>
		<?php } //$get_devis ?>
	</table>
	<?php } mysql_close(); ?>
