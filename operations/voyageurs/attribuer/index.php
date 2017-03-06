	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
		<?php
		$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].'  ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($titre = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Attribuer voyageur: <?php echo $titre['nom']; ?> <?php echo $titre['prenom']; ?></h1>									</td>
				<form action="getnumclient.php" method="post" >
		        <td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		</td>
				</form>
				<form action="getnumcontact.php" method="post" >
		        <td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
				</form>
				<form  action="enregistrer.php"  method="post">
				<input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" hidden />
				<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact"  hidden/>
				<input type="text" name="unit" id="unit" value="1"  hidden/>
				<input type="text" name="attribut" id="attribut" value="voyageur"  hidden/>
				<input type="submit" value="Envoyer"   /> 
			</td>
		</tr>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
			<TR class="niv1">
				<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >				<B>ATTRIBUER UN VOYAGEUR</B>								</TD>
			</TR>
			<TR HEIGHT=16 ALIGN=LEFT class="niv2">
				<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Civilité</B>										</TD>
				<TD STYLE="width:10%;" >						<B>Nom</B>										</TD>
				<TD STYLE="width:10%;" >						<B>Prénom</B>										</TD>
				<TD STYLE="width:10%;" >						<B>Age</B>										</TD>
				<TD STYLE="width:10%;" >						<B>Chambre</B>										</TD>
				<TD STYLE="width:50%; border-right: 1px solid #b8bec3"  >		<B>Commentaire</B>									</TD>
			</TR>
	        	<TR ALIGN=LEFT>
				<TD>				<input type="text" value="<?php echo $titre['civilite']  ; ?>" name="civilite" id="civilite"  />				</TD>	
				<TD>				<input type="text" value="<?php echo $titre['nom']  ; ?>" name="nom" id="nom"  />						</TD>
				<TD>				<input type="text" value="<?php echo $titre['prenom']  ; ?>" name="prenom" id="prenom"  />					</TD>
				<TD>				<input type="text" value="<?php echo $titre['naissance']  ; ?>" name="naissance" id="naissance"  />				</TD>
				<TD>				<input type="text" value="<?php echo $titre['chambre']  ; ?>" name="chambre" id="chambre"  />					</TD>
				<TD>				<input type="text" value="<?php echo $titre['commentaire']  ; ?>" name="commentaire" id="commentaire"  />			</TD>
			</TR>
			</form>
	</table>
		<?php } //$get_titre ?>
	<?php } mysql_close(); ?>
