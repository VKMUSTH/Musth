	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >

			<td>	<h1>Etape développement systeme</h1>												</td>
		</tr>
	</table>
			<form  action="enregistrer.php"  method="post">
			<input type="text" name="devel" value="1" id="devel" hidden/>
			<input type="text" name="attribut" value="EN COURS" id="attribut" hidden/>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >						<B>NOUVEL ÉVÈNEMENT</B>				</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >				<B>Date</B>					</TD>
			<TD STYLE="width:70%;">									<B>Désignation</B>				</TD>
			<TD STYLE="width:10%;">									<B>Catégorie</B>				</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" >				<B>Commande</B>					</TD>	
		</TR>
		<tr>
			<?php $date = date("Y-m-d");?>
			<td>	<input type="text" name="date" id="date" value="<?php echo ''.$date.''?>" />
			<td>	<input type="text" name="designation" id="designation" value=""  />									</td>
			<TD>
				<select name="categorie" id="categorie">
					<option value="OPÉRATIONS">OPÉRATIONS</option>
					<option value="DEVELOPPEMENT">DEVELOPPEMENT</option>
					<option value="GROWTH">GROWTH</option>
				</select>
			</TD>
			<td>	<input type="submit" value="Envoyer"   />										</td>
		</tr>	
	</table>
			</form>
	<?php } mysql_close(); ?> 
