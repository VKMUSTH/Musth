	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
	<?php
	$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].'   ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($titre = mysql_fetch_assoc($req1)) { ?>
			<td>
					<h1>Annulation de Client:<?php echo $titre['titre']; ?> </h1>
				<?php } //$get_titre ?>
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
				</form>
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				</form>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=8 ALIGN=CENTER VALIGN=MIDDLE >				<B>CLIENT</B>			</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;" >						<B>Numclient</B>		</TD>
			<TD STYLE="width:10%;" >						<B>Civilité</B>			</TD>
			<TD STYLE="width:10%;" >						<B>Nom</B>			</TD>
			<TD STYLE="width:10%;" >						<B>Prénom</B>			</TD>
			<TD STYLE="width:10%;" >						<B>Age</B>			</TD>
			<TD STYLE="width:10%;" >						<B>Chambre</B>			</TD>
			<TD STYLE="width:30%;" >						<B>Commentaire</B>		</TD>
			<TD STYLE="width:10%;" >						<B>Commande</B>			</TD>
		</TR>

	<?php
	$sql2 = 'SELECT * FROM clients WHERE numdossier = '.$admin['numdossier'].'  ';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($voyageurs = mysql_fetch_assoc($req2)) { ?>
		<?php if (isset($voyageurs['numcontact']) ) {?>	
	<?php
	$sql3 = 'SELECT * FROM contacts WHERE numcontact = '.$voyageurs['numcontact'].' ';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($contacts = mysql_fetch_assoc($req3)) { ?>
		<TR class="niv3">
				<form name="goto" action="goto_contact.php" method="post" >
				<input type="text" name="numclient" id="numclient" value="<?php echo $voyageurs['numclient']  ; ?>" hidden />	
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $voyageurs['numcontact']  ; ?>" hidden />	
			<TD align=center  STYLE="border-left: 1px solid #b8bec3; ">	<button type="submit" class="button"><?php echo $voyageurs['numclient']; ?></button>	</td>
				</form>
				<form name="supprimer" action="supprimer.php" method="post" >
				<input type="text" name="numclient" id="numclient" value="<?php echo $voyageurs['numclient']  ; ?>" hidden />	
			<TD>	<?php echo $contacts['civilite']  ; ?>														</TD>
			<TD>	<?php echo $contacts['nom']  ; ?>														</TD>
			<TD>	<?php echo $contacts['prenom']  ; ?>														</TD>
			<TD>	<?php echo $contacts['age']  ; ?>														</TD>
			<TD>	<?php echo $contacts['chambre']  ; ?>														</TD>
			<TD>	<?php echo $contacts['commentaire']  ; ?>													</TD>
			<TD STYLE="border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3" class="display"><button type="submit" class="button">[Annulation]</button>	</TD>
				</form>
		</TR>
		<?php } //$get_contacts ?>
		<?php } //isset_contacts ?>
		<?php } //$get_voyageurs ?>
	</table>
	<?php } mysql_close(); ?>
