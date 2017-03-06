	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>

	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<TD>	<H1>S.A.V.</H1> 																		</TD>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		</td>
			<td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
			<input type="button" class="button" onclick="location.href='enquete_satisfaction'" value="SATISFACTION" />
			</td>
				<form action="getmoisencours.php" method="post" >
			<td class=inputnum><label><a href="">Mois</a></label><input type="text" name="mois_en_cours" value="<?php echo $admin['mois_en_cours']  ; ?>" id="mois_en_cours" />
				</form>
				<form action="getanneeenmoins.php" method="post" >
				<input type="text"  name="annee_en_cours" value="<?php echo $admin['annee_en_cours']-1  ; ?>"  id="annee_en_cours" hidden />
				<button type="submit" class="button">[-]</button> 
				</form>
			</td>
				<form action="getanneeencours.php" method="post" >
			<td class=inputnum><label><a href="">Année<a></label><input type="text"  name="annee_en_cours" id="annee_en_cours" value="<?php echo $admin['annee_en_cours']  ; ?>"	 />
				</form>
				<form action="getanneeenplus.php" method="post" >
				<input type="text"  name="annee_en_cours" value="<?php echo $admin['annee_en_cours']+1 ; ?>"  id="annee_en_cours" hidden />
				<button type="submit" class="button">[+]</button> 
				</form>
			</td>
		</TR>

<tr><td><a href="https://speakerdeck.com/djo/lobsession-du-service-client-chez-captain-train">Sile building support Musth</a></td>
	</table>
	<BR>
	<?php $niv = ''; include($niv.'calendrier/admin.php');?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD colspan=12 >				<B>CLIENTS SAV</B>													</TD>
		</tr>
		<TR class="niv2">
			<TD  STYLE="width:10%;">			<B>Numclient</B>													</TD>
			<TD  STYLE="width:10%;">			<B>Date sav</B>														</TD>
			<TD  STYLE="width:30%;">			<B>Nom</B>														</TD>
			<TD  STYLE="width:30%;">			<B>Prenom</B>														</TD>
			<TD  STYLE="width:10%;">			<B>Statut</B>														</TD>
			<TD  STYLE="width:10%;">			<B>Commande</B>														</TD>
		</TR>
	<?php
	$sql1 = 'SELECT  
			numproduit,
			numdossier,
			numclient,
			numcontact,
			date_cdv,
			statut,
			DAY(date_sav) AS jour,
			MONTH(date_sav) AS mois,
			YEAR(date_sav) AS annee,
			DATE(date_sav) AS date
				FROM clients 
			WHERE statut =\'SAV\'
			AND MONTH(date_sav) = '.$admin['mois_en_cours'].'
			AND YEAR(date_sav) = '.$admin['annee_en_cours'].'
			OR statut =\'RÉSOLU\'
			AND MONTH(date_sav) = '.$admin['mois_en_cours'].'
			AND YEAR(date_sav) = '.$admin['annee_en_cours'].'
			ORDER BY numclient DESC
			';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($clients = mysql_fetch_assoc($req1)) { ?>
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
			<TD STYLE="border-left: 1px solid #b8bec3; ">	<button type="submit" class="button"><?php echo $clients['numclient']; ?></button>					</td>	
				</form>
		<?php if (isset($clients['numdossier']) ) {?>
	<?php
	$sql3 = 'SELECT * FROM dossiers WHERE numdossier = '.$clients['numdossier'].' ';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($infos = mysql_fetch_assoc($req3)) { ?>
			<TD><?php echo strftime('%d-%m-%Y',strtotime($clients['date'] .'')); ?>									</td>
			<TD><?php echo $contact['nom']; ?>													</td>
			<TD><?php echo $contact['prenom']; ?>													</td>
			<TD><?php echo $clients['statut']; ?>													</td>
		<?php } //$get_infos ?>
		<?php } //isset_infos ?>
			<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="numproduit"	id="numproduit"		value="<?php echo $dossiers['numproduit']  ; ?>"hidden />
				<input type="text" name="numdossier"	id="numdossier"		value="<?php echo $dossiers['numdossier']  ; ?>"hidden />
				<input type="text" name="numclient"	id="numclient"		value="<?php echo $clients['numclient']  ; ?>"	hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" ><button type="submit" class="button">[Modifier]</button>					</TD>
				</form>
		</tr>
		<TR>
			<TD colspan="5">		<div id="filet"></div>											</TD>
		</TR>
		<?php } //$get_contact ?>		
		<?php } //$get_clients ?>		
		<?php } //isset_clients ?>		

	</table>

	<?php $niv = ''; include($niv.'historique/admin.php');?>
	<?php } mysql_close(); ?>
