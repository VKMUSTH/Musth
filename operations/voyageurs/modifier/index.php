	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>
		<?php
		$sql1 = 'SELECT * FROM contacts WHERE numdossier = '.$admin['numdossier'].' AND type =\'Target\'';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($titre = mysql_fetch_assoc($req1)) { ?>
			<h1>Modifier voyageur: <?php echo $titre['nom']; ?> <?php echo $titre['prenom']; ?> <?php echo $titre['statut']; ?></h1>				</td>
				<?php } //$gettitre ?>
				<form action="getnumclient.php" method="post" >
		        <td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
				<form action="getnumvoyageur.php" method="post" >
		        <td class=inputnum><label><a href="">N° Voyageur</a></label><input type="text" name="numvoyageur" value="<?php echo $admin['numvoyageur']  ; ?>" id="numvoyageur" />
				</form>
				<form action="getnumcontact.php" method="post" >
		        <td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
				</form>
				<form  action="modifier.php"  method="post">
				<input type="text" value="<?php echo $admin['numcontact']; ?>" name="numcontact" id="numcontact" HIDDEN />	
				<input type="submit" value="Enregistrer"   />
			</td>
		</tr>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE >				<B>MODIFIER UN VOYAGEUR</B>									</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:20%; border-left: 1px solid #b8bec3;" >		<B>Civilité</B>											</TD>
			<TD STYLE="width:15%;" >						<B>Nom</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Prénom</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Age</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Chambre</B>											</TD>
			<TD STYLE="width:35%; border-right: 1px solid #b8bec3"  >		<B>Commentaire</B>										</TD>
		</TR>


		<?php
		$sql2 = 'SELECT * FROM voyageurs WHERE numvoyageur = '.$admin['numvoyageur'].' ';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($numvoyageur = mysql_fetch_assoc($req2)) { ?>
			<?php if (isset($numvoyageur['numcontact']) ) { ?>
			<?php
			$sql3 = 'SELECT * FROM contacts WHERE numcontact = '.$numvoyageur['numcontact'].' ';
			$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
			while($numcontact = mysql_fetch_assoc($req3)) { ?>



        	<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		
				<select name="civilite" id="civilite">
					<option value="<?php echo $numcontact['civilite']; ?>"><?php echo $numcontact['civilite']; ?></option> 
					<option value="Monsieur">Monsieur</option> 
					<option value="Madame">Madame</option>
				</select>								
			</TD>
			<TD>	<input type="text" value="<?php echo $numcontact['nom']; ?>" name="nom" id="nom"  />										</TD>
			<TD>	<input type="text" value="<?php echo $numcontact['prenom']; ?>" name="prenom" id="prenom"  />									</TD>
			<TD>	<input type="text" value="<?php echo $numcontact['naissance']; ?>" name="naissance" id="naissance"  />								</TD>
			<TD>
				<select name="chambre" id="chambre">
					<option value="<?php echo $numcontact['chambre']; ?>"><?php echo $numcontact['chambre']; ?></option> 
					<option value="none">none</option> 
					<option value="Individuelle">Individuelle</option> 
					<option value="1/2 double">1/2 double</option>
					<option value="Triple">Triple</option>
					<option value="Quadruple">Quadruple</option>
				</select>								
			</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; "><input type="text" value="<?php echo $numcontact['commentaire']; ?>" name="commentaire" id="commentaire"  />		</TD>
		</TR>
		<?php } //$get_numcontact ?>
		<?php } //isset_numcontact ?>
		<?php } //$get_numvoyageur ?>
				</form>
	</table>
	<?php } mysql_close(); ?>
