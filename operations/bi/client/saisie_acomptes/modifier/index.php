	<?php require "../../../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php
	$sql1 = 'SELECT nom_firme, nom, prenom FROM contacts WHERE numcontact = '.$admin['numcontact'].'  ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($contact = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>		<h1>Modifier acompte: <?php echo $contact['nom']; ?> <?php echo $contact['prenom']; ?></h1>
		        <td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		
				<form  action="supprimer.php"  method="post">
					<input type="submit" value="Supprimer"   />
				</form>
			</td>
		        <td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $client['numcontact']  ; ?>" id="numcontact" />	
				<form  action="modifier.php"  method="post">
				<input type="submit" value="Enregistrer"   />
			</td>
		</tr>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE >	<B>MODIFIER ACOMPTE</B>													</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; " >			<B>DATE</B>														</TD>
			<TD STYLE="width:20%;" >			<B>MODE DE REGLEMENT</B>												</TD>
			<TD STYLE="width:10%;" >			<B>MONTANT</B>														</TD>
			<TD STYLE="width:60%;" >			<B>NOM - RAISON SOCIALE</B>												</TD>
		</TR>
	<?php
	$sql2 = 'SELECT * FROM livre_journal WHERE position = '.$admin['position'].' ';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($lj = mysql_fetch_assoc($req2)) { ?>
	        <TR class="niv3">
				<input type="text" value="<?php echo $admin['position']; ?>" name="position" id="position" hidden />
			<TD>	<input type="text" value="<?php echo $lj['lj_date']; ?>" name="" id=""  />	
			<TD>
						<select name="mode_reglement" id="mode_reglement">
							<option value="<?php echo $lj['mode_reglement']; ?>"><?php echo $lj['mode_reglement']; ?></option> 
							<option value="ESPECES">ESPECES</option>
							<option value="CHEQUE">CHEQUE</option>
							<option value="CB">CB</option>
							<option value="EN LIGNE">EN LIGNE</option>
						</select>
			</TD>
			<TD>	<input type="text" value="<?php echo $lj['credit']; ?>" name="credit" id="credit"  />
			<TD STYLE="width:8%;">
				<input type="text" value="<?php echo $contact['nom_firme']; ?>" name="<?php echo $client['numcontact']; ?>" id="<?php echo $client['numcontact']; ?>"  />
			</TD>
		</TR>
	<?php } //$get_lj ?>
				</form>
	</table>
	<?php } //$get_contact ?>
	<?php } mysql_close(); ?>
