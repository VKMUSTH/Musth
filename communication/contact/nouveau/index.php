	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td >	<h1>Ajouter un nouveau contact</h1>		
		<form  action="enregistrer.php"  method="post">
		<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" hidden />
		<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden />
		<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" hidden />
			<td class=inputnum><input type="submit" value="Envoyer"   />
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR>
			<TD STYLE="width:49%;" class=niv1 COLSPAN=2 >
				<table border=0 cellpadding=0 cellspacing=0  >
					<tr class=niv1 >
						<td COLSPAN=2> 	<B>CONTACT</B> 														</td>
					</tr>
					<tr class=niv2>
						<TD>	<B>Nom / firme</B>														</TD>
						<TD>	<input type="text" name="nom_firme" id="nom_firme"  />										</TD>
					</tr>
					<tr class=niv2>
						<TD>	<B>Type</B></TD>
						<TD>
							<select name="type" id="type">
								<option value="<?php echo $contact['type']; ?>">			<?php echo $contact['type']; ?>		</option> 
								<option value="organisation_touristique">				Organisation touristique		</option>
								<option value="to">							TO					</option>
								<option value="guide">							guide					</option>
								<option value="receptif">						receptif				</option>
								<option value="start_up">						start up				</option>


								<option value="Fournisseurs">						Fournisseurs				</option>
								<option value="Distributeurs">						Distributeurs				</option>
								<option value="Client">							Client					</option>
								<option value="Autre">							Autre					</option>
							</select>
						</TD>
					</tr>
					<tr class=niv2>
						<TD><B>Voyageur</B></TD>
						<TD>
							<select name="voyageur" id="voyageur">
								<option value="<?php echo $contact['voyageur']; ?>">			<?php echo $contact['voyageur']; ?>	</option> 
								<option value="voyageur">						voyageur				</option>
								<option value="prospect">						prospect				</option>
							</select>
						</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Métier</B></TD>
						<TD>
							<select name="metier" id="metier">
								<option value="<?php echo $contact['metier']; ?>">			<?php echo $contact['metier']; ?>	</option> 
								<option value="Aéroport">						Aéroport				</option>
								<option value="Bar">							Bar					</option>
								<option value="Transporteur Aerien">					Transporteur Aerien			</option>
								<option value="Hotel">							Hotel					</option>
								<option value="Illustrateur">						Illustrateur				</option>
								<option value="Musee">							Musee					</option>
								<option value="Photographe">						Photographe				</option>
								<option value="Presse">							Presse					</option>
								<option value="Restaurant">						Restaurant				</option>
								<option value="Realisation video">					Realisation video			</option>
								<option value="Transporteur autocariste">				Transporteur autocariste		</option>
								<option value="Transport individuel">					Transport individuel			</option>
							</select>
						</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Civilité</B></TD>
						<TD>	
							<select name="civilite" id="civilite">
								<option value="Madame, Monsieur">					&lt; choisir s&#39;il vous pla&icirc;t &gt;</option> 
								<option value="Monsieur">						Monsieur				</option> 
								<option value="Madame">							Madame					</option>
							</select>
						</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Nom</B>															</TD>
						<TD>	<input type="text" name="nom" id="nom"  />											</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Prenom</B>															</TD>
						<TD>	<input type="text" name="prenom" id="prenom"  />										</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Fonction</B>															</TD>
						<TD>	<input type="text" name="fonction" id="fonction"  />										</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Email</B>															</TD>
						<TD>	<input type="text" name="email" id="email"  />											</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Web</B>															</TD>
						<TD>	<input type="text" name="web" id="web"  />											</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Tel Fixe</B>															</TD>
						<TD>	<input type="text" name="tel_fixe" id="tel_fixe"  />										</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Tel Mobile</B>														</TD>
						<TD>	<input type="text" name="tel_mobile" id="tel_mobile"  />									</TD>
					</TR>
					<tr class=niv2>
						<TD>	<B>Téléfax</B>															</TD>
						<TD>	<input type="text" name="telefax" id="telefax"  />										</TD>
					</TR>
				</table>
			</TD>
			<TD STYLE="width:2%;" >																		</TD>
			<TD STYLE="width:49%;" valign=top>
				<table border=0 cellpadding=0 cellspacing=0  >	
					<tr class=niv1 >
						<td COLSPAN=2>	<B>REMARQUE</B>														</TD>
					</tr>	
					<TR class=niv2  >
						<TD COLSPAN=2>	<textarea  cols=50  name="remarques" id="remarques" ></textarea>							</TD>
					</TR>
					<tr>
						<td><br></td>
					</tr>
					<TR class=niv1>
						<TD COLSPAN=2>	<B>ADRESSE</B>														</TD>
					</TR>
					<TR class=niv2>
						<TD>	<B>Adresse</B>															</TD>
						<TD>	<input type="text" name="adresse" id="adresse"  />										</TD>
					</TR>
					<TR class=niv2>
						<TD>	<B>Complément d'Adresse</B>													</TD>
						<TD>	<input type="text" name="cpladresse" id="cpladresse"  />									</TD>
					</TR>
					<TR class=niv2>
						<TD>	<B>Code Postal</B>														</TD>
						<TD>	<input type="text" name="code_postal" id="code_postal"  />									</TD>
					</TR>
					<TR class=niv2>
						<TD>	<B>Ville</B>															</TD>
						<TD>	<input type="text" name="ville" id="ville"  />											</TD>
					</TR>
					<TR class=niv2>
						<TD>	<B>Pays</B>															</TD>
						<TD>	<input type="text" name="pays" id="pays"  />											</TD>
					</TR>
				</table>
			</TD>
		</TR>
	</form>
	</table>
	<?php } mysql_close(); ?> 
