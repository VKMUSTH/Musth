	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top>
			<td>	<h1>Formalités administratives</h1>
				<form action="getnumitem.php" method="post" >
			<td class=inputnum><label><a href="">N° Position</a></label><input type="text" name="position" value="<?php echo $admin['position']  ; ?>" id="position" />
				</form>
			<input type="button"  onclick="location.href='documentation'" value="documentation" />
			</TD>
	</table>
	<br>
	<?php $niv = ''; include($niv.'retroplanning.php');?>
	<?php } mysql_close(); ?>
