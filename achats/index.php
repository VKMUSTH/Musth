	<?php include "../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>


	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
			<TD>					<h1>Achats</h1>												</TD>	
			<td class=inputnum><label><a href="">N° commande</a></label><input type="text" name="numcommande" value="<?php echo $admin['numcommande']  ; ?>" id="numcommande" />
			</TD>
		</TR>		
	</table>
	<br>
	<?php $niv = ''; include($niv.'preparation/admin.php');?>
	<BR>
	<?php $niv = ''; include($niv.'passees/admin.php');?>
	<BR>
	<?php $niv = ''; include($niv.'recues/admin.php');?>

	<?php } mysql_close(); ?> 
