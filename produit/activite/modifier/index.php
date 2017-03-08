	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php// if (isset(
	//$admin['numdossier'],
	//$admin['position'],
	//$admin['numcontact']
	//) ) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<?php $sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].'';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($name = mysql_fetch_assoc($req1)) { ?>	
			<td colspan=6>	<h1><?php echo $name['titre']; ?></h1>															</td>
		<?php } //$get_name ?>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				<form  action="supprimer.php"  method="post">
			<input type="submit" value="Supprimer"   />
				</form>
			</td>
			<td class=inputnum><label><a href="/communication/contact">N° contact</a></label>
				<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>"  id="numcontact"  />
				</form>
		<?php
		$sql2 = 'SELECT position, numcontact, jours, date_arrivee, designation,horaire FROM synoptique WHERE position = '.$admin['position'].' ';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($visite = mysql_fetch_assoc($req2)) { ?>	
			<form  action="modifier.php"  method="post">
			<input type="submit" value="Enregistrer"   />
			<input type="text"  value="<?php echo $visite['numcontact']  ; ?>" name="numcontact" id="numcontact" hidden />
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=4 ALIGN=CENTER VALIGN=MIDDLE >				<B>VISITES</B>											</TD>	
		</TR>
		<TR class="niv2" HEIGHT=16 ALIGN=LEFT >
			<TD STYLE="width:5%;  " >						<B>Jour</B>											</TD>
			<TD STYLE="width:15%;  " >						<B>Date</B>											</TD>
			<TD STYLE="width:70%;  " >						<B>Prestation</B>										</TD>
			<TD STYLE="width:10%;  " >						<B>Horaire</B>											</TD>
		</TR>
		<TR ALIGN=LEFT>
			<TD>	<input type="text" value="<?php echo $visite['jours']  ; ?>" name="jours" id="jours"  />									</TD>
			<TD>	<input type="text" value="<?php echo $visite['date_arrivee']  ; ?>" name="date_arrivee" id="date_arrivee"  />							</TD>
			<TD>	<input type="text" value="<?php echo $visite['designation']  ; ?>" name="designation" id="designation"  />							</TD>
			<TD>	<input type="text" value="<?php echo $visite['horaire']  ; ?>" name="horaire" id="horaire"  />									</TD>
		</TR>
			</form>
		<?php } //$get_visite ?>
	</table>
	<?php //} // isset ?>
	<?php } mysql_close(); ?>
