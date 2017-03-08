	<?php require "../../../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php
	$sql1 = 'SELECT numcontact FROM clients WHERE numclient = '.$admin['numclient'].'';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req1)) { ?>
	<?php
	$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].'   ';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($contact = mysql_fetch_assoc($req2)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
 			<td>	<h1>Nouvel acompte: <?php echo $contact['nom']  ; ?> <?php echo $contact['prenom']  ; ?></h1>									</td>
		        <td class=inputnum><label><a href="">N° Voyageur</a></label><input type="text" name="numvoyageur" value="<?php echo $admin['numvoyageur']  ; ?>" id="numvoyageur" />	</td>
			<td class=inputnum><label><a href="dossier">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />	
				<?php
				// Les délimiteurs peuvent être des tirets, points ou slash: 'SELECT * FROM cotation ORDER BY id_cotation DESC LIMIT 0, 1'
				$date = date("Y-m-d");
				list($day, $month, $year) = split('[/.-]', $date);
				?>
				<form  action="enregistrer.php"  method="post">
				<input type="text" name="numcontact"	id="numcontact"		value="<?php echo $admin['numcontact']  ; ?>"	hidden/>
				<input type="text" name="numclient"	id="numclient"		value="<?php echo $admin['numclient']  ; ?>"	hidden/>
				<input type="text" name="designation"	id="designation"	value="ACOMPTE CLIENT"				hidden/>
				<input type="text" name="categorie"	id="categorie"		value="RECETTES CLIENTS"			hidden/>
				<input type="text" name="lj_date"	id="lj_date"		value="<?php echo $date  ; ?>"			hidden/>
				<input type="text" name="etat"		id="etat"		value="prevision"				hidden/>
				<input type="text" name="attribut"	id="attribut"		value="aco"					hidden/>
				<input type="submit" value="Envoyer"   />
			</td>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >				<B>AJOUTER UN ACOMPTE</B>									</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>											</TD>
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Numpièce</B>											</TD>
			<TD STYLE="width:20%; border-left: 1px solid #b8bec3; " >		<B>Mode Règlement</B>										</TD>
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Montant</B>											</TD>
			<TD STYLE="width:50%; border-left: 1px solid #b8bec3; " >		<B>NOM PRENOM - RAISON SOCIALE</B>								</TD>
		</TR>      
	  	<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >				<input type="text" name="" id="" value="<?php echo $date; ?>" />				</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >				<input type="text" name="numpiece" id="numpiece" value="" />					</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >				<input type="text" name="mode_reglement" id="mode_reglement" value="CHEQUE" />			</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >				<input type="text" name="credit" id="credit"  />						</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >				<input type="text" name="" id="" value="<?php echo $contact['nom_firme']; ?>" />		</TD>
		</TR>
				</form>
	</table>
	<?php } //$get_contact ?>
	<?php } //$get_client ?>
	<?php } mysql_close(); ?>
