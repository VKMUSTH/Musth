	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<?php if (isset($admin['numcontact']) ) {?>
		<?php
		$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($contact = mysql_fetch_assoc($req1)) { ?>
			<td>	<h1><?php echo $contact['type']; ?> <?php echo $contact['nom_firme']; ?></h1>										</td>
			<td class=inputnum><label><a>N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />	</td>
			<td class=inputnum><label><a>N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />	
				<form name="supprimer" action="supprimer.php"  method="post">
				<input type="submit" value="Supprimer"   />
				</form>
			<td>
				<form action="getnumcontact.php" method="post" >
			<td class=inputnum><label><a>N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
				</form>
				<form  action="modifier.php"  method="post">
				<input type="submit" value="Enregistrer"   />
				<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" hidden />
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR>
			<TD STYLE="width:49%;">
				<table border=0 cellpadding=0 cellspacing=0  >
					<TR class="niv1">
						<td colspan=2 >	<B>CONTACT</B>														</TD>
					</tr>
					<TR class="niv2">
						<TD>		<B>Nom / firme</B>													</TD>
						<TD>		<input type="text" name="nom_firme" id="nom_firme" value="<?php echo $contact['nom_firme']; ?>"  />			</TD>
					</tr>
					<TR class="niv2">
						<TD>		<B>Type</B>														</TD>
						<TD>
							<select name="type" id="type">
								<option value="<?php echo $contact['type']; ?>">	<?php echo $contact['type']; ?>		</option> 
								<option value="organisation_touristique">				Organisation touristique		</option>
								<option value="to">							TO					</option>
								<option value="guide">							guide					</option>
								<option value="receptif">						receptif				</option>
								<option value="start_up">						start up				</option>
								<option value="Fournisseurs">				Fournisseurs				</option>
								<option value="Distributeurs">				Distributeurs				</option>
								<option value="Prospect">				Prospect				</option>
								<option value="Client_porteur_devis">			Client porteur du devis			</option>
								<option value="Candidature">				Candidature				</option>
								<option value="Autre">					Autre					</option>
								<option value="Associés">				Associés				</option>
							</select>
						</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Voyageur</B>														</TD>
						<TD>
							<select name="voyageur" id="voyageur">
								<option value="<?php echo $contact['voyageur']; ?>">	<?php echo $contact['voyageur']; ?>	</option> 
								<option value="voyageur">				voyageur				</option>
								<option value="non voyageur">				non voyageur				</option>
							</select>
						</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Métier</B>														</TD>
						<TD>
							<select name="metier" id="metier">
								<option value="<?php echo $contact['metier']; ?>">	<?php echo $contact['metier']; ?>	</option> 
								<option value="Aéroport">				Aéroport				</option>
								<option value="Artiste">				Artiste					</option>
								<option value="Bar">					Bar					</option>
								<option value="Camps">					Camps					</option>
								<option value="Transporteur Aerien">			Transporteur Aerien			</option>
								<option value="Hotel">					Hotel					</option>
								<option value="Musee">					Musee					</option>
								<option value="Restaurant">				Restaurant				</option>
								<option value="Transporteur autocariste">		Transporteur autocariste		</option>
								<option value="Transport individuel">			Transport individuel			</option>
								<option value="Train">					Train					</option>
							</select>
						</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Categorie</B>													</TD>
						<TD>
							<select name="categorie" id="categorie">
								<option value="<?php echo $contact['categorie']; ?>">		<?php echo $contact['categorie']; ?>	</option> 
								<option value="">						Aucun					</option> 
								<option value="1*">						1*					</option> 
								<option value="2**">						2**					</option>
								<option value="3***">						3***					</option> 
								<option value="4****">						4****					</option>
								<option value="5*****">						5*****					</option> 
								<option value="1* NL">						1* NL					</option>
								<option value="2** NL">						2** NL					</option> 
								<option value="3*** NL">					3*** NL					</option>
								<option value="4**** NL">					4**** NL				</option> 
								<option value="5***** NL">					5***** NL				</option>
							</select>
						</TD>
					</TR>
					<TR class="niv2">
						<TD class=niv2>	<B>Civilité</B>														</TD>
						<TD>
							<select name="civilite" id="civilite">
								<option value="<?php echo $contact['civilite']; ?>">		<?php echo $contact['civilite']; ?>	</option> 
								<option value="Monsieur">					Monsieur				</option> 
								<option value="Madame">						Madame					</option>
								<option value="Madame, Monsieur">				Madame, Monsieur			</option>
								<option value=""></option>
							</select>
						</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Nom</B>														</TD>
						<TD>	<input type="text" name="nom" id="nom" value="<?php echo $contact['nom']; ?>" />						</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Prenom</B>														</TD>
						<TD>	<input type="text" name="prenom" id="prenom" value="<?php echo $contact['prenom']; ?>"  />					</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Fonction</B>														</TD>
						<TD>	<input type="text" name="fonction" id="fonction" value="<?php echo $contact['fonction']; ?>" />					</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Email</B>														</TD>
						<TD>	<input type="text" name="email" id="email" value="<?php echo $contact['email']; ?>" />						</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Email2</B>														</TD>
						<TD>	<input type="text" name="email2" id="email2" value="<?php echo $contact['email2']; ?>" />					</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Web</B>														</TD>
						<TD>	<input type="text" name="web" id="web" value="<?php echo $contact['web']; ?>" />						</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Tel Fixe</B>														</TD>
						<TD>	<input type="text"  name="tel_fixe" id="tel_fixe" value="<?php echo $contact['tel_fixe']; ?>" />				</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Tel Mobile</B>													</TD>
						<TD>	<input type="text" name="tel_mobile" id="tel_mobile" value="<?php echo $contact['tel_mobile']; ?>"  />				</TD>
					</TR>
					<TR class="niv2">
						<TD>		<B>Téléfax</B>														</TD>
						<TD>	<input type="text" name="telefax" id="telefax" value="<?php echo $contact['telefax']; ?>"  />					</TD>
					</tr>			
					<TR class="niv2">
						<TD>		<B>Facebook</B>														</TD>
						<TD>	<input type="text" name="facebook" id="facebook" value="<?php echo $contact['facebook']; ?>"  />				</TD>
					</tr>			
					<TR class="niv2">
						<TD>		<B>LinkedIn</B>														</TD>
						<TD>	<input type="text" name="linkedin" id="linkedin" value="<?php echo $contact['linkedin']; ?>"  />				</TD>
					</tr>			
					<TR class="niv2">
						<TD>		<B>Viadeo</B>														</TD>
						<TD>	<input type="text" name="viadeo" id="viadeo" value="<?php echo $contact['viadeo']; ?>"  />					</TD>
					</tr>			
					<TR class="niv2">
						<TD>		<B>Google +</B>														</TD>
						<TD>	<input type="text" name="googleplus" id="googleplus" value="<?php echo $contact['googleplus']; ?>"  />				</TD>
					</tr>			

					<TR class="niv2">
						<TD>		<B>Twitter</B>														</TD>
						<TD>	<input type="text" name="twitter" id="twitter" value="<?php echo $contact['twitter']; ?>"  />					</TD>
					</tr>			
					<TR class="niv2">
						<TD>		<B>BrandedMe</B>													</TD>
						<TD>	<input type="text" name="brandedme" id="brandedme" value="<?php echo $contact['brandedme']; ?>"  />				</TD>
					</tr>			

					<TR class="niv2">
						<TD>		<B>Youtube</B>														</TD>
						<TD>	<input type="text" name="youtube" id="youtube" value="<?php echo $contact['youtube']; ?>"  />					</TD>
					</tr>			

				</table>
			</TD>
			<TD STYLE="width:2%;" ></TD>
			<TD STYLE="width:49%;" valign=top>
				<table border=0 cellpadding=0 cellspacing=0  >
					<TR class="niv1">
						<td colspan=2>		<B>REMARQUE</B>														</TD>
					</tr>
					<TR class="niv2">
						<TD colspan=2>
						<textarea  cols=50 name="remarques" id="remarques"  value="<?php echo $contact['remarques']; ?>" ><?php echo $contact['remarques']; ?></textarea>
						</TD>
					</tr>
					<tr>
						<td><br></td>
					</tr>
					<TR class="niv1">
						<TD colspan=2>		<B>DESCRIPTIF</B>													</TD>
					</tr>
					<tr>
						<TD colspan=2>
						<textarea  cols=50 name="descriptif" id="descriptif"  value="<?php echo $contact['descriptif']; ?>" ><?php echo $contact['descriptif']; ?></textarea>
						</TD>
					</tr>
					<tr>
						<td><br></td>
					</tr>
					<TR class="niv1">
						<TD COLSPAN=2 >	<B>ADRESSE</B>														</TD>
					</tr>	
					<TR class="niv2">
						<TD>		<B>Adresse</B>														</TD>
						<TD>	<input type="text" name="adresse" id="adresse" value="<?php echo $contact['adresse']; ?>"  />					</TD>
					</tr>
					<TR class="niv2">
						<TD>		<B>Complément d'Adresse</B>												</TD>
						<TD>	<input type="text" name="cpladresse" id="cpladresse" value="<?php echo $contact['cpladresse']; ?>"  />				</TD>
					</tr>
					<TR class="niv2">
						<TD>		<B>Code Postal</B>													</TD>
						<TD>	<input type="text" name="code_postal" id="code_postal" value="<?php echo $contact['code_postal']; ?>"  />			</TD>
					</tr>
					<TR class="niv2">
						<TD>		<B>Ville</B>														</TD>
						<TD>	<input type="text" name="ville" id="ville" value="<?php echo $contact['ville']; ?>"  />						</TD>
					</tr>
					<TR class="niv2">
						<TD>		<B>Pays</B>														</TD>
						<TD>	<input type="text" name="pays" id="pays" value="<?php echo $contact['pays']; ?>"  />						</TD>
					</tr>
				</table>
			</TD>
		</TR>
	</form>
	</table>
		<?php } ?>
	<?php
		} //sl1
	    } // admin
	mysql_close();
	?> 
