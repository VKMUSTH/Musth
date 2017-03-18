	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=6><h1>Clients</h1>																		</TD>	
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text"  name="numproduit" value="<?php echo $admin['numproduit']  ; ?>"  id="numproduit" />

			</TD>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text"  name="numdossier" value="<?php echo $admin['numdossier']  ; ?>"  id="numdossier" />
			</TD>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text"  name="numclient" value="<?php echo $admin['numclient']  ; ?>"  id="numclient" />
				<input type="button" onclick="location.href='ajouter'" value="Ajouter" />
			</TD>

		</TR>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE >				<B>CLIENTS SUR PRODUIT EN COURS </B>				</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3;   " >		<B>N° Client</B>						</TD>
			<TD STYLE="width:10%;" >						<B>Date</B>							</TD>
			<TD STYLE="width:10%;" >						<B>Civilité</B>							</TD>
			<TD STYLE="width:10%;" >						<B>Nom</B>							</TD>
			<TD STYLE="width:10%;" >						<B>Prénom</B>							</TD>
			<TD STYLE="width:30%; border-right: 1px solid #b8bec3" >		<B>Désignation</B>						</TD>
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
			WHERE numdossier = '.$admin['numdossier'].'
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($client = mysql_fetch_assoc($req1)) { ?>



		<?php if (isset($client['numcontact']) ) { ?>
		<?php
		$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$client['numcontact'].' ';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($contact = mysql_fetch_assoc($req2)) { ?> 
		<TR class="niv3">
				<form name="client" action="goto_items.php" method="post" >
				<input type="text" name="numproduit"	id="numproduit"		value="<?php echo $client['numproduit']  ; ?>" hidden />
				<input type="text" name="numdossier"	id="numdossier"		value="<?php echo $client['numdossier']  ; ?>" hidden />
				<input type="text" name="numclient"	id="numclient"		value="<?php echo $client['numclient']  ; ?>"	hidden />
				<input type="text" name="numcontact"	id="numcontact"		value="<?php echo $client['numcontact']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3" >	<button type="submit" class="button"><?php echo $client['numclient']; ?></button>	</td>
				</form>
			<TD STYLE="border-left: 1px solid #b8bec3" >	<?php echo $client['date']; ?>								</td>
			<TD STYLE="border-left: 1px solid #b8bec3" >	<?php echo $contact['civilite']; ?>							</td>
			<TD STYLE="border-left: 1px solid #b8bec3" >	<?php echo $contact['nom']; ?>								</td>
			<TD STYLE="border-left: 1px solid #b8bec3" >	<?php echo $contact['prenom']; ?>							</td>
		<?php } //$get_contact ?>
		<?php } //isset_contact ?>
		<?php } //$get_client ?>

	</table>

	<?php } mysql_close(); ?>
