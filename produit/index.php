<?php require '../header.php'; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
<?php
$sql1 = 'SELECT 
	numproduit,
	numdossier,	
	date_depart,
	date_retour
		FROM clients
	WHERE numclient = '.$admin['numclient'].'
	';
$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
while($client = mysql_fetch_assoc($req1))
{
?>

	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >


		<?php if (isset($client['numdossier'])) {?>
		<?php
		$sql5 = 'SELECT * FROM dossiers WHERE numdossier = '.$client['numdossier'].' ';
		$req5 = mysql_query($sql5) or die('Erreur SQL man !<br>'.$sql5.'<br>'.mysql_error());
		while($titre = mysql_fetch_assoc($req5))
			{
		?>
 
			<td><h1><?php echo $client['numdossier']; ?> <?php echo $titre['titre']; ?></h1>
		<?php }   ?>
			<td><!--?php echo $produit['horloge']; ?-->
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a href="">N° Contact</a></label><input type="text"  class="top" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
				<!--input type="button" class="top" onclick="window.open('<?php echo $produit['map']; ?>')"  value="Carte" /-->	
				</form>
			</td>				
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
				<input type="button"  class="top" onclick="location.href='nouveau'" value="Ajouter jour" />
	</table>
	<br>
<?php
$sql2 = 'SELECT  
			position,	
			jours,
			programme,
			detailprog,
			DAY(syn_date) AS jour,
			MONTH(syn_date) AS mois,
			YEAR(syn_date) AS annee,
			DATE(syn_date) AS date
				FROM synoptique
			WHERE numclient = '.$admin['numclient'].'
			AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND attribut = \'programme\'
			ORDER BY jours ASC ';
$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
while($programme = mysql_fetch_assoc($req2))
{
?>

	<table border=0 cellpadding=0 cellspacing=0>
		<tr class="niv2">
			<td style="width:10%" ><b>JOUR:<?php echo $programme['jours']  ; ?></b>													</td>
			<td style="width:80%"><b><?php echo $programme['programme']  ; ?></b>													</td>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="position" value="<?php echo $programme['position']  ; ?>" id="position"  hidden/>
			<td style="width:10%" valign=top class="display"><button type="submit" class="button">[Modifier]</button>								</td>
				</form>
		</tr>
		<tr class="niv3">	
			<td colspan=4 valign=top><?php echo $programme['detailprog']  ; ?>													</td>
			<?php if (isset($client['numdossier'], $programme['jours'] ) ) {?>
			<?php
			$sql7 = 'SELECT * FROM synoptique WHERE numdossier = '.$client['numdossier'].' AND attribut = \'hebergement\' AND jours = '.$programme['jours'].' ';
			$req7 = mysql_query($sql7) or die('Erreur SQL man !<br>'.$sql7.'<br>'.mysql_error());
			while($synoptique = mysql_fetch_assoc($req7))
				{
			?>
					<?php if (isset($synoptique['numcontact'] ) ) { ?>
					<?php
					$sql6 = 'SELECT * FROM contacts WHERE numcontact = '.$synoptique['numcontact'].'  ';
					$req6 = mysql_query($sql6) or die('Erreur SQL man !<br>'.$sql6.'<br>'.mysql_error());
					while($contact = mysql_fetch_assoc($req6))
						{
					?>
				<form name="numcontact" action="goto_contact.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $programme['numcontact']; ?>" hidden />
			<td class="niv2" colspan=1 ><b>HÉBERGEMENT: </b>															</td>
			<td><?php echo $contact['nom_firme']  ; ?>																</td>
			<td class="niv2" colspan=1 ><b>NUITÉES: <?php echo $synoptique['nuitees']  ; ?></b>											</td>
				</form>
		</tr>
		<tr class="niv3">	
			<td>
			<td>
			<td>
			<td colspan=3 valign=top><?php echo $contact['descriptif']  ; ?>													</td>
		</tr>
					<?php }	?>
			<?php } 	?>

	</table>	



<?php
} //sql6
} //sql7
}
}
} //sql1
    } mysql_close();
?>
</div>
