<?php require "../../../header.php"; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>
				<h1>Ajouter une nouvelle référence</h1>		
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
				</form>
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				</form>
				<form  action="insert_items.php"  method="post">
				<input type="submit" value="Envoyer"   />
				<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit"  hidden/>
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier"  hidden/>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=4 ALIGN=CENTER VALIGN=MIDDLE >		<B>TITRE</B>									</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT CLASS="niv2">
			<td><b>Libellé</b>															</TD>
			<td><b>Quantité</b>															</TD>
		<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		<input type="text" value="" name="designation" id="designation"  />		</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; ">		<input type="text" value="" name="quantite" id="quantite"  />			</TD>
		</TR>
				</form>
	</table>
<?php } mysql_close(); ?>
