	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>		<h1>Modifier les indications:</h1>															</td>
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
				<form  action="supprimer.php"  method="post">
				<input type="submit" value="Supprimer"   />
				</form>
			</td>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />	</td>
			<td class=inputnum><label><a href="">N° Item</a></label><input type="text" name="numitem" value="<?php echo $admin['numitem']  ; ?>" id="numitem" />
				<form  action="modifier.php"  method="post">
				<input type="text" name="numitem" value="<?php echo $admin['numitem']  ; ?>" id="numitem" hidden/>
				<input type="submit" value="Enregistrer"   />
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr class="niv1">
			<td STYLE="width:80%;" >						<b>Libellé</b>											</td>
			<td STYLE="width:10%;" >						<b>Valeur</b>											</td>
			<TD STYLE="width:10%; " >						<B>Tx mq</B>											</TD>
		<?php
		$sql1 = 'SELECT * FROM items WHERE numitem = '.$admin['numitem'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($reference = mysql_fetch_assoc($req1)) { ?>

		<TR>
			<TD>	<input type="text" value="<?php echo $reference['designation']  ; ?>" name="designation" id="designation" >							</TD>
			<TD>	<input type="text" value="<?php echo $reference['valeur']  ; ?>" name="valeur" id="valeur"  >									</TD>
			<TD>	<input type="text" name="taux_marque" id="taux_marque" value="<?php echo $reference['taux_marque']  ; ?>" />							</TD>
		</tr>
		<?php } //$get_reference?> 
	</table>
				</form>
	<?php } mysql_close(); ?>
