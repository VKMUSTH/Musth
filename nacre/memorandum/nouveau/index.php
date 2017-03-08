	<?php require '../../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
				<?php
				$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].' ';
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
				while($contact = mysql_fetch_assoc($req1)) { ?>


			<td>	<h1><?php echo $contact['nom_firme']; ?></h1>
				<form action="getnumcontact.php" method="post" >
			<td class=inputnum><label><a>N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
				</form>
				<form  action="enregistrer.php"  method="post">
				<?php $date = date("Y-m-d");?>
				<input type="text" name="date" id="date" value="<?php echo ''.$date.''?>" hidden/>
				<input type="text" name="memorandum" id="memorandum" value="1" hidden/>
				<input type="submit" value="Envoyer"   />
			</td>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0  >
	<tr>
		<td style="width:10%">Objet: 
		<td style="width:90%"><input type="text" name="objet" id="objet" value="<?php echo $courrier['objet']; ?>"  />
	<tr>
		<td colspan=5><textarea cols=110 rows=8 name="texte" id="texte"  value="<?php echo $courrier['texte']; ?>"></textarea><?php echo $courrier['texte']; ?>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0  >
		<tr align=justify>
			<td>			<select name="attribut" id="attribut">
							<option value="none">&lt; choisir s&#39;il vous pla&icirc;t &gt;</option> 
							<option value="block">Ajouter des pieces jointes</option> 
						</select>
		<tr>
			<td><input type="text" name="attribut" id="attribut" value="none"  />
			<td><input type="text" name="piece_jointe" id="piece_jointe" value="Insérer une nouvelle piece jointe"  />
			<td style="width:20%;"><input type="submit" value="[Ajouter une pièce jointe]" />
	</table>
	<br>
				<?php
				$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].' ';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($contact = mysql_fetch_assoc($req2)) { ?>

	<table border=0 cellpadding=0 cellspacing=0  >
		<tr>
			<td rowspan=9>
				KEMPF VALERY<br>
				9B Rue de Wissembourg<br>
				67210 OBERNAI<br>
				valerykempf@gmail.com<br>
				Mobile: 06 72 97 73 00<br>
				<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" hidden/>
			<td>civilite<br>			<td><input type="text" name="civilite" id="civilite" value="<?php echo $contact['civilite']; ?>"  />
		<tr>	<td>nom<br>				<td><input type="text" name="nom" id="nom" value="<?php echo $contact['nom']; ?>"  />
		<tr>	<td>prenom<br>			<td><input type="text" name="prenom" id="prenom" value="<?php echo $contact['prenom']; ?>"  />
		<tr>	<td>firme<br>			<td><input type="text" name="nom_firme" id="nom_firme" value="<?php echo $contact['nom_firme']; ?>"  />
		<tr>	<td>adresse<br>			<td><input type="text" name="adresse" id="adresse" value="<?php echo $contact['adresse']; ?>"  />
		<tr>	<td>complément d'adresse<br>	<td><input type="text" name="cpladresse" id="cpladresse" value="<?php echo $contact['cpladresse']; ?>"  />
		<tr>	<td>ville<br>			<td><input type="text" name="ville" id="ville" value="<?php echo $contact['ville']; ?>"  />
		<tr>	<td>codepostal<br>			<td><input type="text" name="code_postal" id="code_postal" value="<?php echo $contact['code_postal']; ?>"  />
		<tr>	<td>pays<br>			<td><input type="text" name="pays" id="pays" value="<?php echo $contact['pays']; ?>"  />
	</table>
				</form>
					<?php } //$getcontact1 ?>
					<?php } //$getcontact ?>
	<?php } mysql_close(); ?>
