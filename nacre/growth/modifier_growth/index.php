	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
		<?php// if (isset($admin['position']) ) { ?>
		<?php
		$sql1 = 'SELECT * FROM retroplanning WHERE position = '.$admin['position'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($courrier = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<tr>
			<td>	<h1>Modifier opération</h1>																	</td>
			<td class=inputnum valign="top"><label><a>N° Position</a></label><input type="text" name="position" value="<?php echo $courrier['position']  ; ?>" id="position" />
				<form name="supprimer" action="supprimer.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $courrier['position']  ; ?>" HIDDEN />	
				<button type="button" >[Supprimer]</button>				
				</form>
			</TD>
	</table>
				<form  action="modifier.php"  method="post">
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden/>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD  COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE >				<B>MODIFIER OPÉRATION</B>									</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>											</TD>
			<TD STYLE="width:50%;">							<B>Désignation</B>										</TD>
			<TD STYLE="width:10%;">							<B>Lien</B>											</TD>
			<TD STYLE="width:10%;">							<B>Temps</B>											</TD>
			<TD STYLE="width:10%;">							<B>Type action</B>										</TD>
			<TD STYLE="width:10%;">							<B>Attribut</B>											</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" colspan=3>	<B>Commande</B>											</TD>	
		</TR>
		<tr>
			<td>	<input type="text" name="date" id="date"  value="<?php echo $courrier['date']; ?>" />										</td>
			<td>	<input type="text" name="designation" id="designation" value="<?php echo $courrier['designation']; ?>"  />							</td>
			<td>	<input type="text" name="lien" id="lien" value="<?php echo $courrier['lien']; ?>"  />										</td>
			<td>	<input type="text" name="temps" id="temps" value="<?php echo $courrier['temps']; ?>"  />									</td>
			<TD>
				<select name="type_action" id="type_action">
					<option value="<?php echo $courrier['type_action']; ?>">		<?php echo $courrier['type_action']; ?>	</option> 
					<option value="PROSPECTION">						PROSPECTION					</option> 
					<option value="PUBLICITAIRE">						PUBLICITAIRE					</option> 
					<option value="PROMOTION">						PROMOTION					</option> 
				</select>
			</TD>

			<TD>
				<select name="attribut" id="attribut">
					<option value="<?php echo $courrier['attribut']; ?>">		<?php echo $courrier['attribut']; ?>	</option> 
					<option value="RESOLU">						RESOLU					</option> 
				</select>
			</TD>
			<td>	<input type="submit" value="Envoyer"   />															</td>
	</table>
				</form>
		<?php } //$get_courrier ?>
	<?php } mysql_close(); ?> 
