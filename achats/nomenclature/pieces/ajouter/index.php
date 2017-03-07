	<?php include "../../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=1>	<h1>Ajouter produit / prestation:  </h1>														</td>	

			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		
			<td class=inputnum><label><a href="">N° Commande</a></label><input type="text" name="numcommande" value="<?php echo $admin['numcommande']  ; ?>" id="numcommande" />		
			<td class=inputnum><label><a href="">N° Item</a></label><input type="text" name="numitem" value="<?php echo $admin['numitem']  ; ?>" id="numitem" />		

				<form  action="enregistrer.php"  method="post">
				<input type="submit" value="Envoyer"   />
			</td>
				<input type="text" name="numitem" value="<?php echo $admin['numitem']  ; ?>" id="numitem"  hidden/>
				<input type="text" name="numcommande" value="<?php echo $admin['numcommande']  ; ?>" id="numcommande"  hidden/>
				<input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient"  hidden/>
				<input type="text" name="etat" value="prevision" id="etat"  hidden/>
				<input type="text" name="attribut" value="cot" id="attribut" hidden />
				<input type="text" name="compte" value="achats-commande-ajouter" id="compte" hidden />
				<?php
				// Les délimiteurs peuvent être des tirets, points ou slash: 'SELECT * FROM cotation ORDER BY id_cotation DESC LIMIT 0, 1'
				$date = date("Y-m-d");
				list($day, $month, $year) = split('[/.-]', $date);
				?>
				<input type="text" name="lj_date" value="<?php echo $date  ; ?>" id="lj_date"  hidden/>
		</tr>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=4 ALIGN=CENTER VALIGN=MIDDLE >		<B>AJOUTER COTATION</B>												</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<td>Désignation																				</td>
			<td>Qt																					</td>
		<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		<input type="text" value="" name="designation" id="designation"  />						</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		<input type="text" value="" name="quantite" id="quantite"  />							</TD>

		</TR>
				</form>
	</table>
	<?php } mysql_close();?>
