	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
		<?php if (isset($admin['position']) ) {?>
		<?php
		$sql1 = 'SELECT * FROM livre_journal WHERE position = '.$admin['position'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($produit = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<tr>
			<td><h1>Modifier</h1>	
			<td class=inputnum valign="top"><label><a>N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				<form name="supprimer" action="supprimer.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $admin['position']  ; ?>" HIDDEN />	
									<button type="submit" class=button>[Supprimer]</button>					</TD>
				</form>
			<td class=inputnum valign="top"><label><a>Position</a></label><input type="text" name="position" value="<?php echo $admin['position']  ; ?>" id="position" />
	</table>		
				</form>
				<form  action="modifier.php"  method="post">
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden/>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1"><TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >			<B>PRODUIT CONCERNÉ PAR LA MODIFICATION</B>		</TD>		</TR>
		<TR class="niv2">
			<TD STYLE="width:60%;  " >						<B>Designation</B>					</TD>
			<TD STYLE="width:10%;">							<B>Coût</B>						</TD>
			<TD STYLE="width:20%;">							<B>Lien</B>						</TD>
			<TD STYLE="width:10%;" >						<B>Commande</B>						</TD>
		</TR>
		<tr>
			<td>	<input type="text" name="designation" id="designation"  value="<?php echo $produit['designation']; ?>" />		</td>
			<td>	<input type="text" name="cout_achat_unit" id="cout_achat_unit" value="<?php echo $produit['cout_achat_unit']; ?>"  />	</td>
			<td>	<input type="text" name="lien" id="lien"  value="<?php echo $produit['lien']; ?>" />					</td>
			<td>	<input type="submit" value="Envoyer"   />										</td>
		</tr>
	</table>
		</form>
		<?php } //$get_produit ?>
		<?php } //isset ?>
	<?php } mysql_close(); ?> 
