	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
		<?php if (isset($admin['numclient']) ) {?>
		<?php
		$sql1 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($client = mysql_fetch_assoc($req1))
		{
		?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR valign=top>
			<TD>	<H1>Modifier statut</H1>																	</TD>
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
			<TD STYLE="width:100%;"  colspan=6 >		<B>STATUTS DOSSIER</B>													</TD>
		</tr>
		<TR class=niv2>
			<TD STYLE="width:50%;">				<B>Statut</B>														</TD>
			<TD STYLE="width:10%;">				<B>Date départ</B>													</TD>
			<TD STYLE="width:10%;">				<B>Date retour</B>													</TD>
			<TD STYLE="width:10%;">				<B>Date devis</B>													</TD>
			<TD STYLE="width:10%;">				<B>Date cdv</B>														</TD>
			<TD STYLE="width:10%;">				<B>Échéance solde</B>													</TD>
		</TR>
		<TR>
			<TD>
				<select name="statut" id="statut">
					<option value="<?php echo $client['statut']; ?>"><?php echo $client['statut']; ?></option> 
					<option value="EXPÉDIÉ">EXPÉDIÉ</option>
					<option value="DEVIS">DEVIS</option>
					<option value="BI">BI</option>
					<option value="SAV">SAV</option>
					<option value="OPTIONS">OPTIONS</option>
					<option value="RÉSERVATIONS">RÉSERVATIONS</option>
					<option value="VOUCHERS">VOUCHERS</option>
				</select>
			</td>
			<TD>	<input type="text" name="date_depart" value="<?php echo $client['date_depart']  ; ?>" id="date_depart" />							</TD>
			<TD>	<input type="text" name="date_retour" value="<?php echo $client['date_retour']  ; ?>" id="date_retour" />							</TD>
			<TD>	<input type="text" name="date_devis" value="<?php echo $client['date_devis']  ; ?>" id="date_devis" />								</TD>
			<TD>	<input type="text" name="date_cdv" value="<?php echo $client['date_cdv']  ; ?>" id="date_cdv" />								</TD>
			<TD>	<input type="text" name="echeance_solde" value="<?php echo $client['echeance_solde']  ; ?>" id="echeance_solde" />						</TD>
		</tr>
	</table>
		<?php } //$get_client	?>
				</form>
	<?php
		} //isset sql1
	    } mysql_close();
	?> 
