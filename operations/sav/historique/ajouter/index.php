	<?php require "../../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=1>
				<h1>Ajouter une question client</h1>		
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
				<form  action="insert.php"  method="post">
				<input type="text" value="<?php echo $admin['numclient']  ; ?>" name="numclient" id="numclient" hidden />
			<input type="submit" value="Envoyer"   />
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE >		<B>AJOUTER UNE QUESTION CLIENT</B>					</TD>		
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<td>Libelle
			<td>Lien
		<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		<input type="text" value="" name="libelle" id="libelle"  />		</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		<input type="text" value="" name="lien" id="lien"  />			</TD>
		</TR>
				</form>
	</table>
	<?php } mysql_close(); ?>
