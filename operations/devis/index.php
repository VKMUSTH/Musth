<?php require "../../header.php"; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
	<!--? if (isset(
	$admin['mois_en_cours'], 
	$admin['annee_en_cours']
	) ) {?-->
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<TD>	<H1>Clients avec devis</H1>																	</td>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				<input type="button" onclick="location.href='differer'" value="Différer" />
				</form>
			</td>
			<td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" /> 
				<input type="button" onclick="location.href='dupliquer'" value="Dupliquer" />
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
	</table>
	<?php $niv = ''; include($niv.'calendrier/admin.php');?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv2">
			<TD STYLE="width:10%;">		<B>Numclient</B>															</td>
			<TD STYLE="width:10%;">		<B>Date Départ</B>															</td>
			<TD STYLE="width:10%;">		<B>Date retour</B>															</td>
			<TD STYLE="width:10%;">		<B>echeance devis</B>															</td>
			<TD STYLE="width:10%;">		<B>Départ</B>																</td>
			<TD STYLE="width:10%;">		<B>Retour</B>																</td>
			<TD STYLE="width:25%;">		<B>Titre</B>																</td>
			<TD STYLE="width:5%;">		<B>Voyageurs</B>															</td>
			<TD STYLE="width:10%;">		<B>Commande</B>																</td>
		</TR>
		<?php
		$sql1 = 'SELECT  
			numproduit,
			numdossier,
			numclient,
			numcontact,
			date_retour,
			statut,
			DAY(date_sav) AS jour,
			MONTH(date_sav) AS mois,
			YEAR(date_sav) AS annee,
			DATE(date_sav) AS date
				FROM clients 
			WHERE statut =\'DEVIS\'
			AND MONTH(date_depart) = '.$admin['mois_en_cours'].'
			AND YEAR(date_depart) = '.$admin['annee_en_cours'].'
			OR statut =\'BI\'
			AND MONTH(date_depart) = '.$admin['mois_en_cours'].'
			AND YEAR(date_depart) = '.$admin['annee_en_cours'].'
			OR statut =\'VOUCHERS\'
			AND MONTH(date_depart) = '.$admin['mois_en_cours'].'
			AND YEAR(date_depart) = '.$admin['annee_en_cours'].'

			ORDER BY numclient DESC
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($clients = mysql_fetch_assoc($req1)) { ?>

		<TR class="niv3">
				<form name="client" action="goto_devis.php" method="post" >
				<input type="text" name="numproduit" id="numproduit" value="<?php echo $clients['numproduit']  ; ?>" hidden />
				<input type="text" name="numdossier" id="numdossier" value="<?php echo $clients['numdossier']  ; ?>" hidden />
				<input type="text" name="numclient" id="numclient" value="<?php echo $clients['numclient']  ; ?>" hidden />
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $clients['numcontact']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $clients['numclient']; ?></button>						</td>	
				</form>
				<?php if (isset($clients['numclient']) ) { ?>
				<?php
				$sql2 = 'SELECT * FROM clients WHERE numclient = '.$clients['numclient'].' ';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($dossier_client = mysql_fetch_assoc($req2)) { ?>
			<TD><?php echo $dossier_client['date_depart']  ; ?>															</td>
			<TD><?php echo $dossier_client['date_retour']  ; ?>															</td>
			<TD><?php echo $dossier_client['echeance_devis']  ; ?>															</td>

				<?php if (isset($clients['numdossier']) ) { ?>
				<?php
				$sql3 = 'SELECT * FROM dossiers WHERE numdossier = '.$clients['numdossier'].' ';
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
				while($infos = mysql_fetch_assoc($req3)) { ?>
			<TD><?php echo $infos['date_depart']; ?>																</td>
			<TD><?php echo $infos['date_retour']; ?>																</td>
			<TD><?php echo $dossier_client['titre']; ?>																</td>
				<?php } //$get_infos ?>
						<?php } //isset ?>
				<?php } //$get_dossier_client ?>
						<?php } //isset ?>
					<?php if (isset($clients['numclient']) ) { ?>
				<?php
				$sql4 = 'SELECT ROUND(SUM(unit),0) as participants FROM voyageurs WHERE numclient = '.$clients['numclient'].' AND attribut = \'voyageur\'';
				$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
				while($participants = mysql_fetch_assoc($req4)) { ?>
				<form name="voyageurs" action="goto_voyageurs.php"  method="post">
				<input type="text" name="numproduit" id="numproduit" value="<?php echo $clients['numproduit']  ; ?>" hidden />
				<input type="text" name="numdossier" id="numdossier" value="<?php echo $clients['numdossier']  ; ?>" hidden />
				<input type="text" name="numclient" id="numclient" value="<?php echo $clients['numclient']  ; ?>" hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" align=center>	<button type="submit" class="button"><?php echo $participants['participants']; ?></button></td>
						<?php } //$get_participants ?>
						<?php } //isset ?>
				</form>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="numclient" value="<?php echo $clients['numclient']  ; ?>" id="numclient" hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" ><button type="submit" class="button">[Modifier]</button>									</TD>
				</form>
		</tr>
		<?php } //$get_clients ?>
		<TR>
			<TD colspan="7">		<div id="filet"></div>															</TD>
		</TR>
	</table>
	<?php //} ?>
<?php } mysql_close(); ?>
