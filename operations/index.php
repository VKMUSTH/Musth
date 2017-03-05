	<?php require '../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<TD>	<H1>Opérations</H1>																		</TD>
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
				</form>
			</td>
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				</form>
			</td>

				<form action="getnumcontact.php" method="post" >
			<td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
				</form>
			<input type="button"  onclick="location.href='ajouter'" value="Ajouter" />
			</td>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		
				</form>
			<input type="button" class="button" onclick="location.href='attribuer'" value="Attribuer" />
			</td>
			<TD>
			<input type="button"  onclick="location.href='rechercher'" value="Rechercher" />
			</TD>
		</TR>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD colspan=12 >					<B>COMMANDES À EXPÉDIER</B>											</TD>
		</tr>
		<TR class="niv2">
			<TD  STYLE="width:10%;">				<B>Numclient</B>												</TD>
			<TD  STYLE="width:10%;">				<B>Date cdv</B>													</TD>
			<TD  STYLE="width:35%;">				<B>Nom</B>													</TD>
			<TD  STYLE="width:35%;">				<B>Prenom</B>													</TD>
			<TD  STYLE="width:10%;">				<B>Commande</B>													</TD>
		</TR>
		<?php
		$sql1 = 'SELECT  
			numproduit,
			numdossier,
			numclient,
			numcontact,
			DAY(date_cdv) AS jour,
			MONTH(date_cdv) AS mois,
			YEAR(date_cdv) AS annee,
			DATE(date_cdv) AS date
				FROM clients 
			WHERE statut =\'EXPEDITION\'
			ORDER BY numclient DESC
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($clients = mysql_fetch_assoc($req1))
		    {
		?>

		<!--?$get_clients = $bdd->query('SELECT  
			numproduit,
			numdossier,
			numclient,
			numcontact,
			DAY(date_cdv) AS jour,
			MONTH(date_cdv) AS mois,
			YEAR(date_cdv) AS annee,
			DATE(date_cdv) AS date
				FROM clients 
			WHERE statut =\'EXPEDITION\'
			ORDER BY numclient DESC
			');
		while ($clients = $get_clients->fetch()){?-->

		<?php if (isset($clients['numcontact']) ) {?>
		<?php
		$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$clients['numcontact'].'';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($contact = mysql_fetch_assoc($req2)) { ?>

		<TR class="niv3">
				<form name="client" action="goto_facture.php" method="post" >
				<input type="text" name="numproduit"	id="numproduit"		value="<?php echo $clients['numproduit']  ; ?>" hidden />
				<input type="text" name="numdossier"	id="numdossier"		value="<?php echo $clients['numdossier']  ; ?>" hidden />
				<input type="text" name="numclient"	id="numclient"		value="<?php echo $clients['numclient']  ; ?>"	hidden />
				<input type="text" name="numcontact"	id="numcontact"		value="<?php echo $contact['numcontact']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $clients['numclient']; ?></button>						</td>	
				</form>
			<TD><?php echo strftime('%d-%m-%Y',strtotime($clients['date'] .'')); ?>													</td>
			<TD><?php echo $contact['nom']; ?>																	</td>
			<TD><?php echo $contact['prenom']; ?>																	</td>
			<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="numproduit"	id="numproduit"		value="<?php echo $dossiers['numproduit']  ; ?>"hidden />
				<input type="text" name="numdossier"	id="numdossier"		value="<?php echo $dossiers['numdossier']  ; ?>"hidden />
				<input type="text" name="numclient"	id="numclient"		value="<?php echo $clients['numclient']  ; ?>"	hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" ><button type="submit" class="button">[Modifier]</button>									</TD>
				</form>
		</TR>
		<TR>
			<TD colspan="5">		<div id="filet"></div>															</TD>
		</TR>
		<?php } //$get_contact?>		
		<?php } // isset sql2 ?>
		<?php } //$get_clients ?>		
	</table>
	<?php } mysql_close(); ?>
	<?php// require 'tuto.php'; ?>
