	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >

			<td>	<h1>Etape Growth</h1>																		</td>
			<td class=inputnum><label><a href="">Date</a></label><input type="text" name="" value="<?php echo strftime('%d-%m-%Y',strtotime($admin['date_en_cours'])); ?>" id="" />		
			</td>

		</tr>
	</table>
			<form  action="enregistrer.php"  method="post">
			<input type="text" name="devel" value="1" id="devel" hidden/>
			<input type="text" name="categorie" value="GROWTH" id="categorie" hidden/>
			<input type="text" name="attribut" value="EN COURS" id="attribut" hidden/>
			<input type="text" name="date" id="date" value="<?php echo strftime('%Y-%m-%d',strtotime($admin['date_en_cours'])); ?>" hidden/>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >						<B>NOUVEL ÉVÈNEMENT</B>								</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:70%; border-left: 1px solid #b8bec3; " >				<B>Désignation</B>								</TD>
			<TD STYLE="width:10%;">									<B>Type action</B>								</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" >				<B>Commande</B>									</TD>	
		</TR>
		<tr>


			<td>	<input type="text" name="designation" id="designation" value=""  />												</td>
			<TD>
				<select name="type_action" id="type_action">
					<option value="PROSPECTION">PROSPECTION</option>
					<option value="PUBLICITAIRE">PUBLICITAIRE</option>
					<option value="PROMOTION">PROMOTION</option>
				</select>
			</TD>
			<td>	<input type="submit" value="Envoyer"   />															</td>
		</tr>	
	</table>
			</form>
	<?php } mysql_close(); ?> 
