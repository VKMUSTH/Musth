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
			<TD>	<H1>Clients avec Vouchers</H1>																	</td>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		</td>
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
			<TD  STYLE="width:10%;">	<B>Numclient</B>															</td>
			<TD  STYLE="width:10%;">	<B>Date vouchers</B>															</td>
			<TD  STYLE="width:10%;">	<B>Départ</B>																</td>
			<TD  STYLE="width:10%;">	<B>Retour</B>																</td>
			<TD  STYLE="width:45%;">	<B>Titre</B>																</td>
			<TD  STYLE="width:5%;">		<B>Voyageurs</B>															</td>
			<TD  STYLE="width:10%;">	<B>Commande</B>																</td>
		</TR>
	<?php
	$sql1 = 'SELECT  
			numproduit,
			numdossier,
			numclient,
			numcontact,
			statut,
			DAY(date_depart) AS jour,
			MONTH(date_depart) AS mois,
			YEAR(date_depart) AS annee,
			DATE(date_depart) AS date
				FROM clients 
			WHERE statut =\'VOUCHERS\'
			AND MONTH(date_depart) = '.$admin['mois_en_cours'].'
			AND YEAR(date_depart) = '.$admin['annee_en_cours'].'
			ORDER BY numclient DESC
			';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($clients = mysql_fetch_assoc($req1)) { ?>
		<TR class="niv3">
				<form name="client" action="goto_vouchers.php" method="post" >
				<input type="text" name="numproduit" id="numproduit" value="<?php echo $clients['numproduit']  ; ?>" hidden />
				<input type="text" name="numdossier" id="numdossier" value="<?php echo $clients['numdossier']  ; ?>" hidden />
				<input type="text" name="numclient" id="numclient" value="<?php echo $clients['numclient']  ; ?>" hidden />
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $clients['numcontact']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $clients['numclient']; ?></button>						</td>	
				</form>
			<TD><?php echo $clients['date']; ?>																	</td>
				<?php
				$sql2 = 'SELECT * FROM dossiers WHERE numdossier = '.$clients['numdossier'].' ';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($infos = mysql_fetch_assoc($req2)) { ?>
			<TD><?php echo $clients['date_depart']; ?>																</td>
			<TD><?php echo $clients['date_retour']; ?>																</td>
			<TD><?php echo $infos['titre']; ?>																	</td>
				<?php } //$get_infos ?>


				<?php
				$sql3 = 'SELECT ROUND(SUM(unit),0) as participants FROM voyageurs WHERE numclient = '.$clients['numclient'].' AND attribut = \'voyageur\'';
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
				while($participants = mysql_fetch_assoc($req3)) { ?>
				<form name="voyageurs" action="goto_voyageurs.php"  method="post">
				<input type="text" name="numproduit" id="numproduit" value="<?php echo $clients['numproduit']  ; ?>" hidden />
				<input type="text" name="numdossier" id="numdossier" value="<?php echo $clients['numdossier']  ; ?>" hidden />
				<input type="text" name="numclient" id="numclient" value="<?php echo $clients['numclient']  ; ?>" hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" align=center>	<button type="submit" class="button"><?php echo $participants['participants']; ?></button>		</td>
						<?php } //$get_participants ?>
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
	<?php //}	?>
<?php } mysql_close(); ?>
