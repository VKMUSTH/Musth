	<?php require '../../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>

				<?php
				$sql1 = 'SELECT * FROM courrier WHERE position = '.$admin['position'].' ';
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
				while($courrier = mysql_fetch_assoc($req1)) { ?>

				<?php
				$sql2 = 'SELECT numcontact FROM admin WHERE id =\'1\'';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($numcontact = mysql_fetch_assoc($req2)) { ?>
			<form action="getnumcontact.php" method="post" >

				<?php if (isset($numcontact['numcontact']) ) {	?>
				<?php
				$sql3 = 'SELECT * FROM contacts WHERE numcontact = '.$numcontact['numcontact'].'';
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
				while($contact = mysql_fetch_assoc($req3)) { ?>
		<table border=0 cellpadding=0 cellspacing=0  >
			<tr>
				<td><h1><?php echo $contact['nom_firme']; ?></h1>	
				<td class=inputnum valign="top"><label><a>N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $numcontact['numcontact']  ; ?>" id="numcontact" />
		</table>		
				<?php } //$getcontact ?>
				<?php } //isset_contact ?>
			</form>


				<form action="getposition.php" method="post" >
					<input type="text" name="position" value="<?php echo $position['position']  ; ?>" id="position" hidden/>
				</form>
	<form  action="modifier.php"  method="post">
<!---->
	<table border=0 cellpadding=0 cellspacing=0  >
	<tr>
		<td style="width:10%">Objet: <td><input type="text" name="objet" id="objet" value="<?php echo $courrier['objet']; ?>"  />
		<td style="width:10%"><input type="text" name="date" id="date"  value="<?php echo $courrier['date']; ?>" />
		<td style="width:10%"><input type="submit" value="Envoyer"   />
	<tr><td colspan=5><textarea cols=109 rows=20 name="texte" id="texte"  value="<?php echo $courrier['texte']; ?>"><?php echo $courrier['texte']; ?></textarea>

	</table>
<br>
		<input type="text" name="numcontact" value="<?php echo $numcontact['numcontact']  ; ?>" id="numcontact" hidden />
	</form>
<!---->

	</table>


			<form name="supprimer" action="supprimer-courrier.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $courrier['position']  ; ?>" HIDDEN />	
	<TD> 							<button type="submit" ><pann class=red>[Supprimer]</span></button>					</TD>
			</form>
				<?php } //$getnumcontact ?>
				<?php } //$getcourrier ?>
	<?php } mysql_close(); ?>
