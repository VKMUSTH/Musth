	<?php require "../../../../header.php"; ?>
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<TD>	<H1>Ajouter Inscription</H1>																	</TD>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		</TD>
			<td class=inputnum><label><a href="">N° Commande</a></label><input type="text" name="numcommande" value="<?php echo $admin['numcommande']  ; ?>" id="numcommande" />	</TD>
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />	</TD>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />	</TD>
			<td class=inputnum><label><a href="">N° Item</a></label><input type="text" name="numitem" value="<?php echo $admin['numitem']  ; ?>" id="numitem" />			
				<?php 
				$date = date("Y-m-d");
				list($year, $month, $day) = split('[/.-]', $date);
				?>
				<form  action="enregistrer.php"  method="post">
				<input type="submit" value="Envoyer"   />
			</td>
				<input type="text" name="numproduit"	id="numproduit"	value="<?php echo $admin['numproduit']  ; ?>"					hidden />
				<input type="text" name="numdossier"	id="numdossier"	value="<?php echo $admin['numdossier']  ; ?>"					hidden />
				<input type="text" name="numitem"	id="numitem"	value="<?php echo $admin['numitem']  ; ?>"					hidden />
				<input type="text" name="numcommande"	id="numcommande"value="<?php echo $admin['numcommande']  ; ?>"					hidden />
				<input type="text" name="numclient"	id="numclient"	value="<?php echo $admin['numclient']  ; ?>"					hidden />
				<input type="text" name="compte"	id="compte"	value="achats-commande-ajouter-ins"						hidden />
				<input type="text" name="attribut"	id="attribut"	value="ins"									hidden />
				<input type="text" name="etat"		id="etat"	value="prevision"								hidden />
				<input type="text" name="lj_date"	id="lj_date"	value="<?php echo $date ; ?>"							hidden />
		</TR>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE >		<B>AJOUTER UNE INSCRIPTION										</B>	</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT CLASS="niv2">
			<td STYLE="width:10%;" 				>	<b>Date													</b>	</TD>
			<td STYLE="width:80%;" 				>	<b>Désignation												</b>	</TD>
			<td STYLE="width:10%;" 				>	<b>Montant												</b>	</TD>
		</TR>
		<TR ALIGN=LEFT>
			<TD>	<input type="text" 					value="<?php echo $date ; ?>"				/>						</TD>
			<TD>	<input type="text" name="inscription"	id="inscription"value="<?php echo $produit['inscription']  ; ?>" 	/>						</TD>
			<TD>	<input type="text" name="debit"		id="debit" 								/>						</TD>
		</TR>
				</form>
	</table>
	<?php } mysql_close(); ?>
