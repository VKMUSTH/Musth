	<?php include "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<?php 	if (isset($admin['numcontact']) ) {?>
		<?php
		$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].'  ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($fournisseur = mysql_fetch_assoc($req1)) { ?>
			<td>		<h1>Préparation de commande <?php echo $fournisseur['nom_firme']  ; ?></h1> 
		<?php } //$get_fournisseur ?>	
		<?php } //isset ?>	

			<td class=inputnum><label><a>N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
			<input type="button" onclick="location.href='nouveau'" value="Nouveau" />
			<td class=inputnum><label><a>N° Commande </a></label><input type="text" value="<?php echo $admin['numcommande']  ; ?>" />

				<form action="goto_attribuer.php" method="post" >
				<input type="text" name="numcommande" value="<?php echo $admin['numcommande']  ; ?>" id="numcommande" hidden/>
				<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" hidden/>
				<button type="submit" class="button">[Attribuer]</button>	
				</form>


		</tr>
	</table>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >				<B>COMMANDE UNIQUE OU GROUPÉE</B>			</TD>	
		</TR>
		<TR class="niv2">
			<TD STYLE="width:10%; " >						<B>N° commande</B>					</TD>
			<TD STYLE="width:10%; " >						<B>N° contact</B>					</TD>
			<TD STYLE="width:50%; " >						<B>Désignation</B>					</TD>
			<TD STYLE="width:10%;">							<B>Coût</B>						</TD>
			<TD STYLE="width:10%; " >						<B>Modifier</B>						</TD>		
			<TD STYLE="width:10%; " >						<B>Commander</B>					</TD>		
		</TR>
		<?php 	if (isset($admin['numproduit']) ) { ?>
		<?php
		$sql2 = 'SELECT * FROM livre_journal WHERE numproduit = '.$admin['numproduit'].' AND attribut = \'cmd\'  ORDER BY position ASC ';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($produits_presta = mysql_fetch_assoc($req2)) { ?>
		<TR class="niv3">
				<form action="goto_groupage.php" method="post" >
					<input type="text" name="numcommande" id="numcommande" value="<?php echo $produits_presta['position']  ; ?>" hidden />	
					<input type="text" name="numcontact" id="numcontact" value="<?php echo $produits_presta['numcontact']  ; ?>" hidden />	
			<TD><button type="submit" class="button"><?php echo $produits_presta['position']  ; ?></button>
				</form>

				<form name="positioncontact" action="goto_contact.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $produits_presta['numcontact']; ?>" HIDDEN />
			<TD align=center><button type="submit" class="button"><?php echo $produits_presta['numcontact']; ?></button>								</TD>
				</form>

				<form action="goto_detail.php" method="post" >
					<input type="text" name="numcommande" id="numcommande" value="<?php echo $produits_presta['position']  ; ?>" hidden />	
			<TD><button type="submit" class="button"><?php echo $produits_presta['designation'] ;?></button>
				</form>

				<form name="modifier" action="modifier.php" method="post" >
					<input type="text" name="position" id="position" value="<?php echo $produits_presta['position']  ; ?>" hidden />	


			<TD><?php echo $produits_presta['cout_achat_unit']  ; ?>										</TD>
			<TD><button type="submit" class=button>[Modifier]</button>								</TD>
				</form>
				<form name="commander" action="commander.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $produits_presta['position']  ; ?>" hidden />	
			<TD><button type="submit" class=button>[Commander]</button></TD>
				</form>
		</TR>
		<?php } //$get_produits_presta ?>
		<?php } //isset ?>
	</table>

	<?php } mysql_close(); ?> 
