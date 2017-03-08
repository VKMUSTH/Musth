	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php if (isset(
	$admin['numdossier']
	) ) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<?php
		$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].'';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($name = mysql_fetch_assoc($req1)) { ?>	
			<td colspan=6>	<h1><?php echo $name['titre']; ?></h1>															</td>
		<?php } //$get_name ?>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
			<form  action="enregistrer.php"  method="post">
				<input type="submit" value="Envoyer"   />
		<?php
		$sql2 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].'';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($date = mysql_fetch_assoc($req2)) { ?>	
			<input		type="text"	name="syn_date"		id="syn_date"		value="<?php echo $date['date_depart']; ?>"   		hidden 				/>
		<?php } //$get_date ?>
				<input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient"  hidden/>
				<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact"  hidden/>
				<input type="text" name="attribut" value="restauration" id="attribut"  hidden/>
				<input type="text" name="jours" value="0" id="jours" hidden />
			</td>
		</tr>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=3 ALIGN=CENTER VALIGN=MIDDLE >		<B>RESTAURATION</B>												</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
				<TD STYLE="width:80%;  " >			<B>Prestation</B>												</TD>
		</TR>
		<TR ALIGN=LEFT>

			<TD>							<input type="text" value="" name="designation" id="designation"  />						</TD>
		</TR>
				</form>
	</table>
	<?php } // isset ?>
	<?php } mysql_close(); ?>
