	<?php require '../../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<br><br><br><br><br><br>
	<?php
	$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($contact = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR>
			<TD><h1 STYLE="text-align:center;"><?php echo $contact['nom_firme']; ?></h1>
		<TR>
			<TD><h2 STYLE="text-align:center;"><?php echo $contact['civilite']; ?> <?php echo $contact['nom']; ?> <?php echo $contact['prenom']; ?></h2>
		<TR>
			<TD><h2 STYLE="text-align:center;"><?php echo $contact['adresse']; ?></h2>
		<TR>
			<TD><h2 STYLE="text-align:center;"><?php echo $contact['cpladresse']; ?></h2>
		<TR>
			<TD><h2 STYLE="text-align:center;"><?php echo $contact['code_postal']; ?> <?php echo $contact['ville']; ?> <?php echo $contact['pays']; ?></h2>
	</table>
	<?php } //$get_contact ?>
	<?php } mysql_close(); ?>
