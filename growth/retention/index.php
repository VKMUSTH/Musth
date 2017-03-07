	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<!--? if (isset(
	$admin['numproduit'],
	$admin['numdossier'],
	$admin['numclient'],
	$admin['numcontact'],
	$admin['numitem'],
	$admin['mois_en_cours'], 
	$admin['annee_en_cours']

	) ) {?-->
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
			<td>	<h1>Rétention</h1>															</td>

			<td class=inputnum><label><a href="">Numcontact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
			<input type="button" class="button" onclick="location.href='historique'" value="Historique" />
			</td>
		</tr>	
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD colspan=12 ><B>CONTACTS AYANT ACHETÉ + DE 1 FOIS</B></TD>
		</tr>
		<TR class="niv2">
			<TD  STYLE="width:10%;"><B>Numcontact</B>
			<TD  STYLE="width:10%;"><B>Occurences</B>
			<TD  STYLE="width:20%;"><B>Nom</B>
			<TD  STYLE="width:20%;"><B>Prenom</B>
			<TD  STYLE="width:15%;"><B>Marge</B>
			<TD  STYLE="width:15%;"><B>Montant</B>
			<TD  STYLE="width:10%;"><B>Commande</B>
		</TR>
		<?php
		$sql1 = 'SELECT
			COUNT(numcontact) AS nbr_doublon, numcontact
				FROM     clients
			GROUP BY numcontact
			HAVING   COUNT(numcontact) > 1
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($contact = mysql_fetch_assoc($req1)) { ?> 

		<tr>
				<form	name="contacts"	action="goto_historique.php"	method="post" >
				<input	type="text"	name="numcontact"		id="numcontact"	value="<?php echo $contact['numcontact']  ; ?>" 	hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $contact['numcontact']; ?></button>			</td>	
				</form>

			<td><?php echo $contact['nbr_doublon']  ; ?>


	<?php } //$get_contact ?>
	</table>
	<?php //}	?>
	<?php } mysql_close(); ?>
