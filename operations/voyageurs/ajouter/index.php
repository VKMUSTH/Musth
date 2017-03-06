	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Ajouter voyageur</h1>																	</td>
				<form action="getnumclient.php" method="post" >
		        <td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
				<form  action="enregistrer.php"  method="post">
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier"  hidden/>
				<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit"  hidden/>
				<input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient"  hidden/>
		<?php
		$sql1 = 'SELECT * FROM contacts ORDER BY numcontact DESC LIMIT 0, 1';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($lastcontact = mysql_fetch_assoc($req1)) { ?>
				<input type="text" name="numcontact" value="<?php echo $lastcontact['numcontact']+1  ; ?>" id="numcontact" hidden />
		<?php } //$getlastcontact ?>
				<input type="text" name="unit" id="unit" value="1"  hidden/>
				<input type="text" name="attribut" id="attribut" value="voyageur"  hidden/>
				<input type="submit" value="Envoyer"   /> 
			</td>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
			<TR class="niv1">
				<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >				<B>AJOUTER UN VOYAGEUR</B>								</TD>
			</TR>
			<TR HEIGHT=16 ALIGN=LEFT class="niv2">
				<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Civilité</B>										</TD>
				<TD STYLE="width:10%;" >						<B>Nom</B>										</TD>
				<TD STYLE="width:10%;" >						<B>Prénom</B>										</TD>
				<TD STYLE="width:10%;" >						<B>Date de naissance</B>								</TD>
				<TD STYLE="width:10%;" >						<B>Chambre</B>										</TD>
				<TD STYLE="width:50%; border-right: 1px solid #b8bec3"  >		<B>Commentaire</B>									</TD>
			</TR>
	        	<TR ALIGN=LEFT>
				<TD STYLE="border-left: 1px solid #b8bec3"  >		
					<select name="civilite" id="civilite">
						<option value="none">&lt; choisir &gt;</option> 
						<option value="Monsieur">Monsieur</option> 
						<option value="Madame">Madame</option>
					</select>												
				</TD>
				<TD>	<input type="text" name="nom" id="nom"  />														</TD>
				<TD>	<input type="text" name="prenom" id="prenom"  />													</TD>
				<TD>	<input type="text" name="naissance" id="naissance"  />													</TD>
				<TD>
					<select name="chambre" id="chambre">
						<option value="none">&lt; choisir &gt;</option> 
						<option value="Individuelle">Individuelle</option> 
						<option value="1/2 double">1/2 double</option>
						<option value="Triple">Triple</option>
						<option value="Quadruple">Quadruple</option>
					</select>								
				</TD>
				<TD STYLE="border-right: 1px solid #b8bec3; ">		<input type="text" name="commentaire" id="commentaire"  />						</TD>
			</TR>
				</form>
	</table>
	<?php } mysql_close(); ?>
