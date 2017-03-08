	<?php require '../../header.php'; ?>
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>

	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=7>		<h1>Développement</h1> 	

			<td class="inputnum">
				<input type="button" onclick="location.href='nouveau'" value="Nouveau" />
		</tr>
	</table>

	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >		<B>RÉTROPLANNING SPÉCIFIQUE DÉVELOPPEMENT</B>			</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>					</TD>
			<TD STYLE="width:70%;">							<B>Désignation</B>				</TD>
			<TD STYLE="width:10%;">							<B>Temps</B>					</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" colspan=3>	<B>Commande</B>					</TD>	
		</TR>
		<?php
		$sql1 = 'SELECT * FROM retroplanning WHERE devel=1 ORDER BY position DESC  limit 0, 20 ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($retroplanning = mysql_fetch_assoc($req1)) { ?>
		<TR class="niv3">
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>" hidden />	
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $retroplanning['numcontact']  ; ?>" hidden />	
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<?php echo $retroplanning['date']  ; ?>									</TD>
			<TD><input type="submit" href="<?php echo $retroplanning['lien']  ; ?>" hidden/>
					<a href="<?php echo $retroplanning['lien']  ; ?>"><span class=green><b><?php echo $retroplanning['designation']  ; ?></span></b></a>	</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<?php echo $retroplanning['temps']  ; ?>								</TD>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>" HIDDEN />
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $retroplanning['numcontact']  ; ?>" hidden />		
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<button type="submit"  class=button>[Modifier]</button>							</TD>
				</form>
		</TR>
		<?php } //$get_retroplanning 	?>
	</table>
	<?php } mysql_close(); ?> 
