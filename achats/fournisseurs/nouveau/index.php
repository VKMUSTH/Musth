	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top>
		<?php 	if (isset($admin['numcontact']) ) { ?>
		<?php
		$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].'  ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($fournisseur = mysql_fetch_assoc($req1)) { ?>
			<td>		<h1>Ajouter:<?php echo $fournisseur['nom_firme']  ; ?></h1> 										</td>
		<?php } //$get_fournisseur ?>	
		<?php } //isset ?>	
			<td class=inputnum><label><a>N° Produit		</a></label><input type="text"	value="<?php echo $admin['numproduit']  ; ?>" 		/>				</td>
			<td class=inputnum><label><a>N° Contact		</a></label><input type="text"	value="<?php echo $admin['numcontact']  ; ?>" 	/>					</td>
		</TR>
	</table>
		<form  action="enregistrer.php"  method="post">
			<input type="text" name="numproduit" 		id="numproduit" 	value="<?php echo $admin['numproduit']  ; ?>" 		hidden />
			<input type="text" name="attribut" 		id="attribut" 		value="cmd" 		hidden />


	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1" >
			<TD  COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE >				<B>COMMANDES UNIQUE OU GROUPÉES</B>								</TD>	
		</TR>
		<TR class="niv2" HEIGHT=16 ALIGN=LEFT >
			<TD STYLE="width:55%;  " >						<B>Désignation</B>										</TD>
			<TD STYLE="width:15%;">							<B>Coût achat unit €</B>									</TD>
			<TD STYLE="width:20%;">							<B>Lien</B>											</TD>
			<TD STYLE="width:10%; " >						<B>Commande</B>											</TD>	
		</TR>
		<TR>
			<td>	<input type="text" name="designation" id="designation" value="" />												</TD>
			<td>	<input type="text" name="cout_achat_unit" id="cout_achat_unit" value=""  />											</TD>
			<td>	<input type="text" name="lien" id="lien" value=""  />														</TD>
			<td>	<input type="submit" value="Envoyer"   />															</TD>
		</TR>
	</table>
		</form>
	<?php } mysql_close(); ?> 
