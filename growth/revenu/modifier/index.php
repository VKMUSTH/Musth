
	<?$get_admin = $bdd->query('SELECT * FROM admin WHERE id =\'1\'');
	while ($admin = $get_admin->fetch()){?>
		<?if (isset($admin['numclient']) ) {
 		$get_client = $bdd->prepare('SELECT * FROM clients WHERE numclient = ? ');
		$get_client->execute(array($admin['numclient']));
		while ($client = $get_client->fetch()){?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR valign=top>
			<TD>	<H1>Modifier statut</H1>																	</TD>
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />	</TD>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />	</TD>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />	
				<form  action="modifier.php"  method="post">
				<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" hidden/>
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden/>
				<input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" hidden/>
				<input type="text" name="date_sav" value="<?php echo $date  ; ?>" id="date_sav" hidden/>
				<input type="submit" value="Enregistrer"   />
			</TD>
	</table>
		<?php
		$date = date("Y-m-d");
		list($year, $month, $day) = split('[/.-]', $date);
		?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class=niv1>
			<TD STYLE="width:100%;"  colspan=4 ><B>STATUTS DOSSIER</B>														</TD>
		</tr>
		<TR class=niv2>
			<TD STYLE="width:25%;"><B>Statut</B>																	</TD>
			<TD  STYLE="width:25%;"><B>Date devis</B>																</TD>
			<TD  STYLE="width:25%;"><B>Date cdv</B>																	</TD>
			<TD  STYLE="width:25%;"><B>Échéance solde</B>																</TD>
		</TR>
		<TR>
			<TD>
				<select name="statut" id="statut">
					<option value="<?php echo $client['statut']; ?>"><?php echo $client['statut']; ?></option> 
					<option value="DEVIS">DEVIS</option>
					<option value="EXPEDITION">EXPEDITION</option>
					<option value="BI">BI</option>
					<option value="COURRIER SOLDE">COURRIER SOLDE</option>
					<option value="OPTIONS">OPTIONS</option>
					<option value="RÉSERVATIONS">RÉSERVATIONS</option>
					<option value="VOUCHERS">VOUCHERS</option>
					<option value="SAV">SAV</option>
				</select>
			</td>
			<TD><input type="text" name="date_devis" value="<?php echo $client['date_devis']  ; ?>" id="date_devis" />								</TD>
			<TD><input type="text" name="date_cdv" value="<?php echo $client['date_cdv']  ; ?>" id="date_cdv" />									</TD>
			<TD><input type="text" name="echeance_solde" value="<?php echo $client['echeance_solde']  ; ?>" id="echeance_solde" />							</TD>
		</tr>
	</table>
		<? }$get_client->closeCursor();  } else {}	?>
				</form>
	<?}$get_admin->closeCursor();?>
