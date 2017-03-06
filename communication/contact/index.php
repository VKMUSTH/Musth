<?php include "../../header.php"; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<?php if (isset($admin['numcontact']) ) { ?>
				<?php
				$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].' ';
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
				while($contact = mysql_fetch_assoc($req1))
				{
				?>
		<tr valign=top  >
			<td>		<h1><?php echo $contact['nom_firme']; ?></h1>

				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
				<input type="button" onclick="location.href='nouveau'" value="Ajouter" />
				</form>

				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				<br><input type="button" onclick="location.href='modifier'" value="Modifier" />
				</form>
				<form action="getnumcontact.php" method="post" >
			<td class=inputnum><label><a href="">N° Contact:<?php echo $lastcontact['numcontact']; ?></a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" /></td>
				</form>
				<?php
				$sql2 = 'SELECT * FROM contacts ORDER BY numcontact DESC LIMIT 0, 1';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($lastcontact = mysql_fetch_assoc($req2))
				{
				?>
			<td class=inputnum><label><a href="">Last Contact:<?php echo $lastcontact['numcontact']; ?></a></label>			
				<?php }  ?>
				<input type="button" onclick="location.href='recherche'" value="Recherche" />
				<form name="getmailing" action="goto_mailing.php" method="post" >
					<input type="text" name="numcontact" id="numcontact" value="<?php echo $admin['numcontact']; ?>" HIDDEN />
					<button type="submit" ><pann class=red>Mailing</span></button>
				</form>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR>
			<TD STYLE="width:49%;" >
				<table border=0 cellpadding=0 cellspacing=0  >
					<tr class="niv1">
						<td colspan=2>		<B>CONTACT</B>										</td>
					</tr>
					<TR class=niv2>
						<TD>			<B>Nom / firme</B>									</TD>
						<TD>			<input type="text" value="<?php echo $contact['nom_firme']; ?>"  />			</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Type</B>										</TD>
						<TD>			<input type="text" value="<?php echo $contact['type']; ?>" disabled />			</TD>
					</TR>
					<TR class=niv2>
						<TD>			<B>Voyageur</B>										</TD>
						<TD>			<input type="text" value="<?php echo $contact['voyageur']; ?>"  />			</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Métier</B>										</TD>
						<TD>			<input type="text" value="<?php echo $contact['metier']; ?>"  />			</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Categorie</B>									</TD>
						<TD>			<input type="text" value="<?php echo $contact['categorie']; ?>"  />			</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Civilité</B>										</TD>
						<TD>			<?php echo $contact['civilite']; ?>							</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Nom</B>										</TD>
						<TD>			<?php echo $contact['nom']; ?>								</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Prenom</B>										</TD>
						<TD>			<?php echo $contact['prenom']; ?>							</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Fonction</B>										</TD>
						<TD>			<input type="text" value="<?php echo $contact['fonction']; ?>" />			</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Email</B>										</TD>
						<TD>			<input type="text" value="<?php echo $contact['email']; ?>" />				</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Web</B>										</TD>
						<TD>			<a href="<?php echo $contact['web']; ?>" target="_blank"><?php echo $contact['web']; ?></a>	</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Tel Fixe</B>										</TD>
						<TD>			<input type="text" value="<?php echo $contact['tel_fixe']; ?>" />			</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Tel Mobile</B>									</TD>
						<TD>			<input type="text" value="<?php echo $contact['tel_mobile']; ?>"  />			</TD>
					</tr>
					<TR class=niv2>
						<TD>			<B>Téléfax</B>										</TD>
						<TD>			<input type="text" value="<?php echo $contact['telefax']; ?>"  />			</TD>
					</tr>	
				</table>
			</TD>
			<TD STYLE="width:2%;" >														</TD>
			<TD STYLE="width:49%;" VALIGN=TOP >
				<table border=0 cellpadding=0 cellspacing=0  >
					<tr class="niv1">
						<td colspan=2>		<B>REMARQUES</B>										</td>
					</tr>
					<tr class="niv3">
						<TD VALIGN=TOP colspan=2>	<?php echo $contact['remarques']; ?>							</TD>			
					</TR>
					<tr><td><br></td></tr>
					<tr class="niv1">
						<td colspan=2>		<B>DESCRIPTIF</B>									</TD>
					</TR>
					<tr class="niv3">
						<TD VALIGN=TOP colspan=2>	<?php echo $contact['descriptif']; ?>							</TD>			
					</TR>
					<tr><td><br></td></tr>
					<tr>

						<TD class=niv2 COLSPAN=2 >

					</TD>
					</TR>
					<tr><td><br></td></tr>
					<tr class="niv1">
						<TD COLSPAN=2 ><a href="map"><B>ADRESSE</B></a>									</TD>
					</TR>
					<tr class=niv2>
						<TD >				<B>Adresse</B>										</TD>
						<TD>					<input type="text" value="<?php echo $contact['adresse']; ?>"  />			</TD>
					</TR>
					<tr class=niv2>
						<TD class=niv2>				<B>Complément d'Adresse</B>								</TD>
						<TD>					<input type="text" value="<?php echo $contact['cpladresse']; ?>"  />			</TD>
					</TR>
					<tr class=niv2>
						<TD class=niv2>				<B>Code Postal</B>									</TD>
						<TD>					<input type="text" value="<?php echo $contact['code_postal']; ?>"  />			</TD>
					</TR>
					<tr class=niv2>
						<TD class=niv2>				<B>Ville</B>										</TD>
						<TD>					<input type="text" value="<?php echo $contact['ville']; ?>"  />				</TD>
					</TR>
					<tr class=niv2>
						<TD class=niv2>				<B>Pays</B>										</TD>
						<TD>					<input type="text" value="<?php echo $contact['pays']; ?>"  />				</TD>
					</tr>

				</table>
			</TD>
	<table border=0 cellpadding=0 cellspacing=0  >
		<tr ALIGN=CENTER>	
			<td>
				<a href="<?php echo $contact['facebook']; ?>" target="_blank">	<img src="../../../images/favicon/icn.facebook.hover.png" />	</a>
				<a href="<?php echo $contact['twitter']; ?>" target="_blank">	<img src="../../../images/favicon/icn.twitter.hover.png" />	</a>
				<a href="<?php echo $contact['youtube']; ?>" target="_blank">	<img src="../../../images/favicon/icn.youtube.hover.png" />	</a>
				<a href="<?php echo $contact['linkedin']; ?>" target="_blank">	<img src="../../../images/favicon/icn.linkedin.hover.png" />	</a>
				<a href="<?php echo $contact['viadeo']; ?>" target="_blank">	<img src="../../../images/favicon/icn.viadeo.hover.png" />	</a>
			</td>
		</tr>
	</table>

			<?php if (isset($admin['numcontact']) ) { ?>
				<?php
				$sql3 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].' ';
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
				while($contact = mysql_fetch_assoc($req3))
				{
				?>

		<iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
		src="https://maps.google.fr/maps?q=<?php echo $contact['adresse']; ?>,+<?php echo $contact['ville']; ?>&amp;output=embed"></iframe>
			<?php } ?>

		<?php } ///$get_contact ?>
<?php
	} //sql3
	} //sql1
    } // admin
mysql_close();
?> 
