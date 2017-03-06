	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Ajouter Client</h1>																		</td>
			<form  action="enregistrer.php"  method="post">
			<input type="text" name="numproduit" value="1" id="numproduit" hidden />
			<input type="text" name="numdossier" value="1" id="numdossier" hidden />
			<input type="text" name="statut" value="EXPEDITION" id="statut" hidden />
			<?php $date = date("Y-m-d");?>
			<input type="text" name="date_ctct" id="date_ctct" value="<?php echo ''.$date.''?>" HIDDEN/>
			<input type="text" name="date_cdv" id="date_cdv" value="<?php echo ''.$date.''?>" HIDDEN/>
			<input type="text" name="date_depart" id="date_depart" value="<?php echo ''.$date.''?>" HIDDEN/>
			<input type="text" name="date_retour" id="date_retour" value="<?php echo ''.$date.''?>"HIDDEN />
			<input type="text" name="facturation_debut" id="facturation_debut" value="<?php echo ''.$date.''?>"HIDDEN />
			<input type="text" name="facturation_fin" id="facturation_fin" value="<?php echo ''.$date.''?>"HIDDEN />
					<?php
					$sql1 = 'SELECT * FROM clients ORDER BY numclient DESC LIMIT 0, 1';
					$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
					while($last_numclient = mysql_fetch_assoc($req1))
					{
					?>
		        <td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $last_numclient['numclient']+1  ; ?>" id="numclient" />	</td>
					<?php } //$getlast_numclient  ?>

					<?php
					$sql2 = 'SELECT * FROM contacts ORDER BY numcontact DESC LIMIT 0, 1';
					$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
					while($last_numcontact = mysql_fetch_assoc($req2))
					{
					?>
			<td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $last_numcontact['numcontact']+1  ; ?>" id="numcontact" />
					<?php } //$getlast_numcontact  ?>
			<input type="submit" value="Envoyer"   /> 
			</td>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE >				<B>AJOUTER UN CLIENT</B>									</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Civilité</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Nom</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Prénom</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Nom Firme</B>										</TD>
			<TD STYLE="width:10%;" >						<B>Email</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Web</B>											</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3"  >		<B>Trigger</B>											</TD>
		</TR>
        	<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		
					<select name="civilite" id="civilite">
						<option value="none">Choisir</option> 
						<option value="Madame">Madame</option>
						<option value="Monsieur">Monsieur</option>
					</select>												
			</TD>
			<TD>							<input type="text" name="nom" 		id="nom" 	value="" />						</TD>
			<TD>							<input type="text" name="prenom" 	id="prenom"	value="" />						</TD>
			<TD>							<input type="text" name="nom_firme"	id="nom_firme"	value="" />						</TD>
			<TD>							<input type="text" name="email"		id="email"	value="" />						</TD>
			<TD>							<input type="text" name="web"		id="web"	value="" />						</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; ">		
					<select name="trigger_ctct" id="trigger_ctct">
						<option value="ebay">Ebay</option> 
						<option value="autre">Autre</option>
					</select>												
			</TD>
		</TR>
		<tr><td><br>
		<TR class="niv1">
			<TD COLSPAN=4 ALIGN=CENTER VALIGN=MIDDLE >		<B>ADRESSE</B>													</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD COLSPAN=2 STYLE="border-left: 1px solid #b8bec3; " ><B>Adresse</B>													</TD>
			<TD COLSPAN=2 >						<input type="text" name="adresse"	id="adresse"	value="" />						</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD COLSPAN=2 STYLE="border-left: 1px solid #b8bec3; " ><B>Complément d'Adresse</B>											</TD>
			<TD COLSPAN=2>						<input type="text" name="cpladresse"	id="cpladresse"	value="" />						</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD COLSPAN=2 STYLE="border-left: 1px solid #b8bec3; " ><B>Code Postal</B>												</TD>
			<TD COLSPAN=2>						<input type="text" name="code_postal"	id="code_postal"value="" />						</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD COLSPAN=2 STYLE="border-left: 1px solid #b8bec3; " ><B>Ville</B>													</TD>
			<TD COLSPAN=2>						<input type="text" name="ville"		id="ville"	value="" />						</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD COLSPAN=2 STYLE="border-left: 1px solid #b8bec3; " ><B>Pays</B>													</TD>
			<TD COLSPAN=2  ">					<input type="text" name="pays"		id="pays"	value="" />						</TD>
		</TR>
				</form>
	</table>
	<?php } mysql_close(); ?> 
