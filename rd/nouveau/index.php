	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=6><h1>Création de produit</h1>
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a>N° Produit</a></label><input type="text"  name="numproduit" value="<?php echo $admin['numproduit']  ; ?>"  id="numproduit" />
				</form>
	</table>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=4 ALIGN=CENTER VALIGN=MIDDLE >			<B>NOUVEAU PRODUIT</B>				</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:20%;">						<B>Domaine d'activité</B>			</TD>
			<TD STYLE="width:70%;">						<B>Produit</B>					</TD>
			<TD STYLE="width:10%;">						<B>Commande</B>					</TD>		
		</TR>
				<form  action="nouveau.php"  method="post">
				<input type="text" name="afficher" value="oui" id="afficher" hidden />
		<TR ALIGN=LEFT>
			<TD>
				<select name="nature" id="nature">
					<option value="none">&lt; choisir s&#39;il vous pla&icirc;t &gt;</option> 
					<option value="2">NICHES</option>
					<option value="1">MADAGASCAR</option>
					<option value="3">AUTRES CIRCUITS SEJOURS</option>
					<option value="4">AUTRES PRODUITS</option> 
				</select>
			</TD>
			<TD>							<input type="text" name="produit" id="produit"  />	</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; " >		<button type="submit" class=button >ENVOYER</button>	</TD>	
		</TR>
				</form>
	</table>
	<?php } mysql_close(); ?>
