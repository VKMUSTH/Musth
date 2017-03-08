	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<tr>
			<td>	<h1>Modifier objectif de développement</h1>															</td>

			<td class=inputnum valign="top"><label><a>N° Position</a></label><input type="text" name="" value="<?php echo $admin['position']  ; ?>" id="" />
				<form  action="supprimer.php"  method="post">
				<input type="text" value="<?php echo $admin['position']  ; ?>" name="position" id="position" HIDDEN/>
				<input type="submit" value="Supprimer"   />
				</form>
			</TD>
	</table>
				<form  action="modifier.php"  method="post">
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden/>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >				<B>MODIFIER ÉVÈNEMENT</B>									</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>											</TD>
			<TD STYLE="width:50%;">							<B>Désignation</B>										</TD>
			<TD STYLE="width:10%;">							<B>Lien</B>											</TD>
			<TD STYLE="width:10%;">							<B>Temps</B>											</TD>
			<TD STYLE="width:10%;">							<B>Attribut</B>											</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" colspan=3>	<B>Commande</B>											</TD>	
		</TR>
		<?php
		$sql1 = 'SELECT position, date, designation, lien, attribut, temps FROM retroplanning WHERE position = '.$admin['position'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($retroplanning = mysql_fetch_assoc($req1)) { ?>
		<tr>
			<td>	<input type="text" name="date" id="date"  value="<?php echo $retroplanning['date']; ?>" />									</td>
			<td>	<input type="text" name="designation" id="designation" value="<?php echo $retroplanning['designation']; ?>"  />							</td>
			<td>	<input type="text" name="lien" id="lien" value="<?php echo $retroplanning['lien']; ?>"  />									</td>
			<td>	<input type="text" name="temps" id="temps" value="<?php echo $retroplanning['temps']; ?>"  />									</td>
			<TD>
				<select name="attribut" id="attribut">
					<option value="<?php echo $retroplanning['attribut']; ?>">		<?php echo $retroplanning['attribut']; ?>	</option> 
					<option value="RESOLU">							RESOLU					</option> 
				</select>
			</TD>
			<td>	<input type="submit" value="Envoyer"   />															</td>
		</tr>
		<?php } //$get_retroplanning ?>
	</table>
				</form>
	<?php } mysql_close(); ?> 
