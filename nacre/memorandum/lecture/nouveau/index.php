	<?php require '../../../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>		<h1>Nouvelle annexe</h1>											</TD>
	</table>
		<form  action="enregistrer.php"  method="post">


		<input type="text" name="attribut" value="<?php echo $admin['position']; ?>" id="attribut" hidden/>

	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >				<B>NOUVELLE ANNEXE</B>				</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:45%; border-left: 1px solid #b8bec3; " >		<B>Désignation</B>					</TD>
			<TD STYLE="width:45%;">							<B>Lien</B>						</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3">			<B>Commande</B>						</TD>
		</TR>
		<tr>
			<td><input type="text" name="titre" id="titre" value=""  />								</TD>
			<td><input type="text" name="lien" id="lien" value=""  />									</TD>
			<td><input type="submit" value="Envoyer"   />											</TD>
	</table>
				</form>
	<?php } mysql_close(); ?>
