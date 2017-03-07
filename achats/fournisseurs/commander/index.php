	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>							<h1>Passer la commande</h1>						</TD>	
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
				</form>
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				</form>
				<?php 
				$date = date("Y-m-d");
				list($year, $month, $day) = split('[/.-]', $date);
				?>
				<form  action="enregistrer.php"  method="post">
				<input type="submit" value="Envoyer"   />
				<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" hidden />
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden />
				<input type="text" name="numclient" value="1" id="numclient" hidden />
				<input type="text" value="<?php echo $date ; ?>" name="lj_date" id="lj_date" hidden />
				<input type="text" value="CMD" name="att_cmd" id="att_cmd" hidden />
				<input type="text" value="prevision" name="etat" id="etat" hidden />
		</TR>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE >		<B>AJOUTER UNE COMMANDE							</B>	</TD>			
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT CLASS="niv2">
			<td STYLE="width:10%;" 				>	<b>Date									</b>	</TD>
			<td STYLE="width:50%;" 				>	<b>Désignation								</b>	</TD>
			<td STYLE="width:10%;" 				>	<b>Quantite								</b>	</TD>
			<td STYLE="width:10%;"				>	<b>Cout achat unit							</b>	</TD>
			<td STYLE="width:10%;" 				>	<b>Débit								</b>	</TD>
		<?php 	if (isset($admin['position']) ) { ?>
		<?php
		$sql1 = 'SELECT * FROM livre_journal WHERE position = '.$admin['position'].'  ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($produit = mysql_fetch_assoc($req1)) { ?>
		<TR ALIGN=LEFT>
			<TD><input type="text" name=""		id=""	value="<?php echo $date ; ?>"	/>							</TD>
			<TD><input type="text" name="designation"	id="designation" value="<?php echo $produit['designation']  ; ?>" />			</TD>
			<TD><input type="text" name="quantite"	id="quantite"		/>									</TD>
			<TD><input type="text" name="cout_achat_unit" id="cout_achat_unit" value="<?php echo $produit['cout_achat_unit']  ; ?>"/>		</TD>
			<TD><input type="text" name="debit"	id="debit" 	/>										</TD>
		</TR>
		<?php } //$get_produit ?>
		<?php } //isset ?>
				</form>
	</table>
	<br>
	<?php include($niv.'inscriptions/admin.php');?>
	<?php } mysql_close(); ?> 
