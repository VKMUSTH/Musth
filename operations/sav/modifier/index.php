	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php
	$sql1 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR valign=top>
			<TD>	<H1>Modifier statut</H1>																</TD>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />	
				<form  action="modifier.php"  method="post">
				<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" hidden/>
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden/>
				<input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" hidden/>
				<input type="submit" value="Enregistrer"   />
			</TD>
	</table>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class=niv1>
			<TD STYLE="width:100%;"  colspan=4 ><B>STATUTS DOSSIER</B>													</TD>
		</tr>
		<TR class=niv2>
			<TD STYLE="width:25%;"><B>Statut</B>																</TD>
		</TR>
		<TR>
			<TD>
				<select name="statut" id="statut">
					<option value="<?php echo $client['statut']; ?>"><?php echo $client['statut']; ?></option> 
					<option value="SAV">SAV</option>
					<option value="RÉSOLU">RÉSOLU</option>
					<option value="VOUCHERS">VOUCHERS</option>
				</select>
			</td>
		</tr>
	</table>
		<?php } //$get_client ?>
				</form>
	<?php } mysql_close(); ?>
