	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Modifier dossier client</h1>																</td>
		        <td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				<form  action="modifier.php"  method="post">
				<input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" hidden/>
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden/>
				<input type="submit" value="Enregistrer"   />
			</td>
		</tr>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0  >
		<?php
		$sql1 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($dossier_client = mysql_fetch_assoc($req1)) { ?>
		<TR class=niv1>
			<TD STYLE="width:100%;"  colspan=3 >	<B>DATES DOSSIER</B>														</TD>
		</tr>
		<TR class=niv2>
			<TD  STYLE="width:10%;">		<B>Statut</B>															</TD>
			<TD  STYLE="width:10%;">		<B>Date sav</B>															</TD>
			<TD  STYLE="width:10%;">		<B>Échéance solde</B>														</TD>
		<TR>
			<TD>
				<select name="statut" id="statut">
					<option value="<?php echo $dossier_client['statut']; ?>"><?php echo $dossier_client['statut']; ?></option> 
					<option value="OPTIONS">OPTIONS</option>
					<option value="DEVIS">DEVIS</option>
					<option value="BI">BI</option>
					<option value="RÉSERVATIONS">RÉSERVATIONS</option>
					<option value="SAV">SAV</option>
				</select>
			</td>
			<TD>	<input type="text" name="date_sav" value="<?php echo $dossier_client['date_sav']  ; ?>" id="date_sav" />							</TD>
			<TD>	<input type="text" name="echeance_solde" value="<?php echo $dossier_client['echeance_solde']  ; ?>" id="echeance_solde" />					</TD>
		</tr>
		<?php } //$get_dossier_client ?>
	</table>
				</form>
	<?php } mysql_close(); ?>
