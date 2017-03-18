	<?php require '../../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=6><h1>Création de dossier</h1>
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a>N° Produit</a></label><input type="text"  name="numproduit" value="<?php echo $admin['numproduit']  ; ?>"  id="numproduit" />
				</form>
	</table>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=4 ALIGN=CENTER VALIGN=MIDDLE >			<B>NOUVEAU DOSSIER</B>				</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:90%;">						<B>Titre</B>					</TD>
			<TD STYLE="width:10%;">						<B>Commande</B>					</TD>		
		</TR>
				<form  action="nouveau.php"  method="post">
				<input type="text"  name="numproduit" value="<?php echo $admin['numproduit']  ; ?>"  id="numproduit" hidden/>
		<TR ALIGN=LEFT>
			<TD>							<input type="text" name="titre" id="titre"  />	</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; " >		<button type="submit" class=button >ENVOYER</button>	</TD>	
		</TR>
				</form>
	</table>
	<?php } mysql_close(); ?>
