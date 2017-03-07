	<?php require '../../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<?php if (isset($admin['numcontact']) ) { ?>
		<?php
		$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($contact = mysql_fetch_assoc($req1)) { ?>
			<td>	<h1><?php echo $contact['nom_firme']; ?></h1>															</td>
			<td class=inputnum class="display"><label><a href="">N° Commande</a></label><input type="text" value="<?php echo $admin['numcommande']  ; ?>"  />
			<form action="getnumcontact.php" method="post" >
				<td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
			</form>
			<form action="enregistrer.php" method="post">
			<button type="submit" class=button>[Enregistrer]</button>
			<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" hidden/>
			</form>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR>
			<TD STYLE="width:49%;" class="niv1" COLSPAN=2 >				<B>CONTACT</B>											</TD>
			<TD STYLE="width:2%;" >																			</TD>
			<TD class=niv1 COLSPAN=3 >						<B>REMARQUES</B>										</TD>
		</TR>
		<TR>
			<TD class=niv2><B>Nom / firme</B>					</TD><TD><input type="text" value="<?php echo $contact['nom_firme']; ?>"  />			</TD>
			<TD>																					</TD>
			<TD class=niv2 rowspan=4 colspan=2 VALIGN=TOP><?php echo $contact['remarques']; ?>											</TD>	


		</TR>
		<TR>
			<TD class=niv2><B>Type</B></TD><TD><input type="text" value="<?php echo $contact['type']; ?>"  />									</TD>
			<TD></TD>
			<TD></TD>
		</TR>
		<TR>
			<TD class=niv2><B>Voyageur</B></TD><TD><input type="text" value="<?php echo $contact['voyageur']; ?>"  />								</TD>
			<TD></TD>
			<TD></TD>
		</TR>

		<TR>
			<TD class=niv2><B>Métier</B></TD><TD><input type="text" value="<?php echo $contact['metier']; ?>"  />									</TD>
			<TD></TD>
			<TD></TD>
		</TR>
		<tr>
			<TD class=niv2><B>Categorie</B></TD><TD><input type="text" value="<?php echo $contact['categorie']; ?>"  />								</TD>
			<TD></TD>
			<TD class=niv1 COLSPAN=3 ><B>DESCRIPTIF</B></TD>
		<TR>
			<TD class=niv2><B>Civilité</B></TD><TD><input type="text" value="<?php echo $contact['civilite']; ?>"  />								</TD>
			<TD>
			<TD class=niv2 rowspan=2 colspan=2 VALIGN=TOP><?php echo $contact['descriptif']; ?></TD>			

		</TR>
		<TR>
			<TD class=niv2><B>Nom</B></TD><TD><input type="text" value="<?php echo $contact['nom']; ?>" />										</TD>
			<TD></TD>

		</TR>
		<TR>
			<TD class=niv2><B>Prenom</B></TD><TD><input type="text" value="<?php echo $contact['prenom']; ?>"  />									</TD>
		</TR>
		<TR>
			<TD class=niv2><B>Fonction</B></TD><TD><input type="text" value="<?php echo $contact['fonction']; ?>" />								</TD>
			<TD></TD>
			<TD class=niv1 COLSPAN=2 ><B>ADRESSE</B></TD>
		</TR>
		<TR>
			<TD class=niv2><B>Email</B></TD><TD><input type="text" value="<?php echo $contact['email']; ?>" /></TD>
			<TD></TD>
			<TD class=niv2><B>Adresse</B></TD><TD><input type="text" value="<?php echo $contact['adresse']; ?>"  /></TD>
		</TR>
		<TR>
			<TD class=niv2><B>Web</B></TD><TD><a href="http://<?php echo $contact['web']; ?>" target="_blank"><?php echo $contact['web']; ?></a></TD>
			<TD></TD>
			<TD class=niv2><B>Complément d'Adresse</B></TD><TD><input type="text" value="<?php echo $contact['cpladresse']; ?>"  /></TD>
		</TR>
		<TR>
			<TD class=niv2><B>Tel Fixe</B></TD><TD><input type="text" value="<?php echo $contact['tel_fixe']; ?>" /></TD>
			<TD></TD>
			<TD class=niv2><B>Code Postal</B></TD><TD><input type="text" value="<?php echo $contact['code_postal']; ?>"  /></TD>
		</TR>
		<TR>
			<TD class=niv2><B>Tel Mobile</B></TD><TD><input type="text" value="<?php echo $contact['tel_mobile']; ?>"  />								</TD>
			<TD></TD>
			<TD class=niv2><B>Ville</B></TD><TD><input type="text" value="<?php echo $contact['ville']; ?>"  /></TD>
		</TR>
		<TR>
			<TD class=niv2><B>Téléfax</B></TD><TD><input type="text" value="<?php echo $contact['telefax']; ?>"  /></TD>
			<TD></TD>
			<TD class=niv2><B>Pays</B></TD><TD>		<input type="text" value="<?php echo $contact['pays']; ?>"  />								</TD>

	</table>
		<?php } //$get_contact ?>
		<?php } //isset_contact ?>
	<?php } mysql_close(); ?>
