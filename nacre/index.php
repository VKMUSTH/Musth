<?php include "../header.php"; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req))
    {
?>

	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
			<td>	<h1>Planning</h1>													</td>
				<form action="getjourencours.php" method="post" >
			<td class=inputnum><label><a href="jour">Jour</a></label><input type="text" name="jour_en_cours" value="<?php echo $admin['jour_en_cours']  ; ?>" id="jour_en_cours" />
				</form>
				<input type="button"  class="top" onclick="location.href='nouveau'" value="Ajouter jour" />
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
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a>N° Produit</a></label><input type="text"  class="top" name="numproduit" value="1" id="numproduit" />
				</form>
				<input type="button"  class="top" onclick="location.href='growth'" value="GROWTH" />

			</td>
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a>N° Dossier</a></label><input type="text" class="top" name="numdossier" value="1" id="numdossier" />
				</form>
				<input type="button"  class="top" onclick="location.href='developpement'" value="DÉVELOPPEMENT" />
			</td>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a>N° Client</a></label><input type="text"  class="top" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
				<input type="button"  class="top" onclick="location.href='operations'" value="OPÉRATIONS" />
			</td>
		</tr>	
	</table>
	<?php $niv = ''; include($niv.'calendrier/admin.php');?>
		<?php
		$sql1 = 'SELECT 
		position,
		programme,
		detailprog,	
		DAY(syn_date) AS jour,
		MONTH(syn_date) AS mois,
		YEAR(syn_date) AS annee,
		DATE(syn_date) AS date
			FROM synoptique
		WHERE numproduit = \'1\'
		AND numdossier = \'1\'
		AND programme <> \'\'
		AND YEAR(syn_date) = ' .$admin['annee_en_cours'] . ' 
		AND MONTH(syn_date) = ' .$admin['mois_en_cours'] . ' 
		ORDER BY date ASC
		';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($programme = mysql_fetch_assoc($req1))
		   {
		?>	

		<!--$get_programme = $bdd->query('SELECT 
		position,
		programme,
		detailprog,	
		DAY(syn_date) AS jour,
		MONTH(syn_date) AS mois,
		YEAR(syn_date) AS annee,
		DATE(syn_date) AS date
			FROM synoptique
		WHERE numproduit = \'1\'
		AND numdossier = \'1\'
		AND programme <> \'\'
		AND YEAR(syn_date) = ' .$admin['annee_en_cours'] . ' 
		AND MONTH(syn_date) = ' .$admin['mois_en_cours'] . ' 
		ORDER BY date ASC
		');
		while ($programme = $get_programme->fetch()){ ?-->
	<table border=0 cellpadding=0 cellspacing=0>
		<tr class="niv2">
				<form name="client" action="goto_jour.php" method="post" >
				<input type="text" name="date_en_cours"	id="date_en_cours"		value="<?php echo strftime('%Y%m%d',strtotime($programme['date'] .'')); ?>" hidden />
				<input type="text" name="jour_en_cours"	id="jour_en_cours"		value="<?php echo strftime('%d',strtotime($programme['date'] .'')); ?>" hidden />
			<TD STYLE="width:10%"><button type="submit" class="button"><?php echo strftime('%d-%m-%Y',strtotime($programme['date'] .'')); ?></button>	</td>
				</form>

			<td style="width:80%"><b><?php echo $programme['programme']  ; ?></b></td>

				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="position" value="<?php echo $programme['position']  ; ?>" id="position"  hidden/>
			<td style="width:10%" valign=top class="display"><button type="submit" class="button">[Modifier]</button></td>
				</form>
		<tr class="niv3">	
			<td colspan=4 valign=top><?php echo $programme['detailprog']  ; ?></td>
				<?php if (isset($programme['jour'] ) ) {?>
						<?php
						$sql2 = 'SELECT * FROM contacts WHERE numcontact = \'1\'  ';
						$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
						while($synoptique = mysql_fetch_assoc($req2))
						    {
						?>	

 					<!--$get_synoptique = $bdd->prepare('SELECT
					*
						FROM synoptique
					WHERE numdossier = '.$admin['numdossier'].'
					AND attribut = \'hebergement\'
					AND DAY(syn_date) = '.$programme['jour'].'
					');
					$get_synoptique->execute(array($admin['numdossier'], $programme['jour']));
					while ($synoptique = $get_synoptique->fetch()){?-->
					<?php if (isset($synoptique['numcontact'] ) ) { ?>
						<?php
						$sql3 = 'SELECT * FROM contacts WHERE numcontact = \'1\'  ';
						$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
						while($contact = mysql_fetch_assoc($req3))
						    {
						?>	
	 					<!--$get_contact = $bdd->prepare('SELECT * FROM contacts WHERE numcontact = \'1\'  ');
						$get_contact->execute(array($synoptique['numcontact']));
						while ($contact = $get_contact->fetch()){?-->
				<form name="numcontact" action="goto_contact.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $programme['numcontact']; ?>" hidden />
			<td class="niv2" colspan=1 ><b>HÉBERGEMENT: </b></td>
			<td><?php echo $contact['nom_firme']  ; ?></td>
			<td class="niv2" colspan=1 ><b>NUITÉES: <?php echo $synoptique['nuitees']  ; ?></b></td>
				</form>
		<tr class="niv3">	
			<td><td><td>
			<td colspan=3 valign=top><?php echo $contact['descriptif']  ; ?></td>
		</tr>
					<?php } //$get_contact 	?>
				<?php } //$get_synoptique	?>
	</table>	
		<?php } //$get_programme	?>
	<?php } //isset sql3?>
	<?php } //isset sql2?>
	<?php } //isset sql1?>
<?php mysql_close(); ?> 
