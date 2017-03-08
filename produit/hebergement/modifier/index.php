	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php if (isset(
	$admin['numclient'],
	$admin['numdossier']
	) ) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<?php
		$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].'';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($name = mysql_fetch_assoc($req1)) { ?>	
			<td colspan=6>	<h1><?php echo $name['titre']; ?></h1>															</td>
		<?php } //$get_name ?>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				<form  action="supprimer.php"  method="post">
			<input type="submit" value="Supprimer"   />
				</form>
			</td>
			<td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>"  id="numcontact" />
				<form  action="modifier.php"  method="post">
				<input type="text" name="position" value="<?php echo $admin['position']  ; ?>"  id="position"  hidden/>
				<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>"  id="numcontact" hidden />
				<input type="submit" value="Enregistrer"   />
			</td>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >				<B>MODIFIER HEBERGEMENT</B>									</TD>	
		</TR>
		<TR class="niv2">
			<TD STYLE="width:10%; " >						<B>Jour</B>											</TD>
			<TD STYLE="width:40%;  " >						<B>Nom</B>											</TD>
			<TD STYLE="width:15%;" >						<B>H. arrivée</B>										</TD>
			<TD STYLE="width:5%;" >							<B>Nuitées</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Formule</B>											</TD>
			<TD STYLE="width:25%;  " >						<B>Commentaire</B>										</TD>	
		</TR>
					<?php if (isset($admin['position']) ) {?>
					<?php
					$sql2 = 'SELECT * FROM synoptique WHERE position = '.$admin['position'].' ';
					$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
					while($hebergement = mysql_fetch_assoc($req2)) { ?>	
 
					<!--$get_hebergement = $bdd->prepare('SELECT * FROM synoptique WHERE position = ? ');
					$get_hebergement->execute(array($admin['position']));
					while ($ID = $get_hebergement->fetch()){?-->
						<?php if (isset($ID['numcontact']) ) {?>	
						<?php
						$sql3 = 'SELECT * FROM contacts WHERE numcontact = '.$ID['numcontact'].'  ';
						$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
						while($contacts = mysql_fetch_assoc($req3)) { ?>	

						<!--$get_contacts = $bdd->prepare('SELECT * FROM contacts WHERE numcontact = ?  ');
						$get_contacts->execute(array($ID['numcontact']));
						while ($contacts = $get_contacts->fetch()){?-->
		<TR ALIGN=LEFT>
			<TD>						<input type="text" value="<?php echo $ID['jours']  ; ?>" name="jours" id="jours"  />					</TD>
			<TD>						<input type="text" value="<?php echo $contacts['nom_firme']  ; ?>"  disabled="disabled" />				</TD>
			<TD>						<input type="text" value="<?php echo $ID['horaire']  ; ?>" name="horaire" id="horaire"  />				</TD>
			<TD>						<input type="text" value="<?php echo $ID['nuitees']  ; ?>" name="nuitees" id="nuitees"  />				</TD>
			<TD>			
				<select name="formule" id="formule">
					<option value="<?php echo $ID['formule']; ?>"><?php echo $ID['formule']; ?></option> 
					<option value="B.B.">B.B.</option>
					<option value="D.P.">D.P.</option>
					<option value="P.C.">P.C.</option>
					<option value="Day Use">Day Use</option>
				</select>
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<input type="text" value="<?php echo $ID['commentaire']  ; ?>" name="commentaire" id="commentaire"  />			</TD>
		</TR>
				</form>
						<?php } //$get_contacts ?>
						<?php } //isset ?>
					<?php } //$get_hebergement ?>
					<?php } //isset ?>
		<TR class="niv1">
			<td COLSPAN=2 ><b>DESCRIPTIF</b>																	</td>	
			<td COLSPAN=4 ><b>PRESTATION</b>																	</td>
		</TR>
		<TR>	
			<td COLSPAN=2><textarea type="text" cols=50 rows=10 name="descriptif" id="descriptif"><?php echo $prestataire['descriptif']  ; ?></textarea>				</td>
			<td COLSPAN=4><textarea type="text" cols=50 rows=10 name="designation" id="designation"><?php echo $prestataire['prestation']  ; ?></textarea>				</td>
		</TR>
	</table>
	<?php } // isset ?>
	<?php } mysql_close(); ?>
