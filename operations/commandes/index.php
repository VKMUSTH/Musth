<?php require "../../header.php"; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
	<!--? if (isset(
	$admin['numclient']
	) ) {?-->
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
			<TD>					<h1>Gestion des Commandes - Options et réservations</h1>													</TD>	
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
			<input type="button"  onclick="location.href='prevues/ajouter'" value="Ajouter" />
			</TD>
		</TR>		
	</table>
	<br>
	<? $niv = ''; include($niv.'prevues/admin.php');?>
	<BR>
	<? $niv = ''; include($niv.'passees/admin.php');?>
	<BR>
	<? $niv = ''; include($niv.'recues/admin.php');?>
	<?php //}?>
<?php } mysql_close(); ?>
