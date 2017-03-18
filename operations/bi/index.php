	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<TD>	<H1>Clients avec Bi</H1>																	</td>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
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
	<?php include($niv.'../../calendrier.php');?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD STYLE="width:10%;">		<B>Numclient</B>															</td>

			<TD STYLE="width:10%;">		<B>Départ</B>																</td>
			<TD STYLE="width:10%;">		<B>Retour</B>																</td>
			<TD STYLE="width:45%;">		<B>Titre</B>																</td>
			<TD STYLE="width:5%;">		<B>Voyageurs</B>															</td>
			<TD STYLE="width:10%;">		<B>Commande</B>																</td>
		</TR>
			<?php
			$sql1 = 'SELECT  
			numproduit,
			numdossier,
			numclient,
			numcontact,
			statut,
			titre,
			date_retour,
			DAY(date_depart) AS jour,
			MONTH(date_depart) AS mois,
			YEAR(date_depart) AS annee,
			DATE(date_depart) AS date_depart
				FROM clients 
			WHERE statut =\'BI\'
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
				<form name="client" action="goto_bi.php" method="post" >
				<input type="text" name="numproduit" id="numproduit" value="<?php echo $clients['numproduit']  ; ?>" hidden />
				<input type="text" name="numdossier" id="numdossier" value="<?php echo $clients['numdossier']  ; ?>" hidden />
				<input type="text" name="numclient" id="numclient" value="<?php echo $clients['numclient']  ; ?>" hidden />
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $clients['numcontact']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $clients['numclient']; ?></button>						</td>	
				</form>
			<TD><?php echo $clients['date_depart']; ?>																</td>
			<TD><?php echo $clients['date_retour']; ?>																</td>
			<TD><?php echo $clients['titre']; ?>																	</td>
			<?php
			$sql2 = 'SELECT 
						ROUND(SUM(unit)) as participants, 
						attribut,	
						DAY(date_voyageur) AS jour,
						MONTH(date_voyageur) AS mois,
						YEAR(date_voyageur) AS annee,
						DATE(date_voyageur) AS date_voyageur 
							FROM voyageurs 
						WHERE numclient = '.$admin['numclient'].'
						AND STR_TO_DATE(DATE(date_voyageur), "%Y-%m-%d") BETWEEN "'.$clients['date_depart'].'" AND "'.$clients['date_retour'].'"
						AND attribut = \'voyageur\'
						';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($somme = mysql_fetch_assoc($req2)) { ?>

				<form name="voyageurs" action="goto_voyageurs.php"  method="post">
				<input type="text" name="numclient" id="numclient" value="<?php echo $clients['numclient']  ; ?>" hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" align=center>	<button type="submit" class="button"><?php echo $somme['participants']; ?></button>			</td>
					<?php } //$getnombre_voyageurs ?>
				</form>

				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" hidden />
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden />
				<input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" ><button type="submit" class="button">[Modifier]</button>									</TD>
				</form>
		</tr>
		<?php } //$get_clients ?>
		<TR>
			<TD colspan="7">		<div id="filet"></div>															</TD>
		</TR>
	</table>
	<?php } mysql_close(); ?>
