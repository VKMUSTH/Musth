	<?php require "../../header.php"; ?>
	code cotation
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
			<td>	<h1>Ventes Réalisées</h1>															</td>
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
		</tr>	
	</table>
	<BR>
	<?php include($niv.'calendrier/admin.php');?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD colspan=12 ><B>CLIENTS DONT LA MARCHANDISE A ÉTÉ ENVOYÉE</B></TD>
		</tr>
		<TR class="niv2">
			<TD  STYLE="width:10%;"><B>Numclient</B>
			<TD  STYLE="width:10%;"><B>Date cdv</B>
			<TD  STYLE="width:20%;"><B>Nom</B>
			<TD  STYLE="width:20%;"><B>Prenom</B>
			<TD  STYLE="width:15%;"><B>Marge</B>
			<TD  STYLE="width:15%;"><B>Montant</B>
			<TD  STYLE="width:10%;"><B>Commande</B>
		</TR>
	<?php // Déclaration des variables de tot
	//$fMargeTotGeneral = 0;
	//$fPdvTotGeneral = 0;
	?>
	<?php // Récupération des clients
	$sql1 = 'SELECT
			numclient,
			numcontact,
			DAY(date_cdv) AS jour,
			MONTH(date_cdv) AS mois,
			YEAR(date_cdv) AS annee,
			DATE(date_cdv) AS date
				FROM clients 
			WHERE MONTH(date_cdv) = '.$admin['mois_en_cours'].'
			AND YEAR(date_cdv) = '.$admin['annee_en_cours'].'
			ORDER BY numclient DESC
		';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($cli = mysql_fetch_assoc($req1)) {?>

	<?php if (isset($cli['numclient']) ) {	?>

	<?php // Récupération des données de lj	
	$sql2 = 'SELECT 
			numclient,
			numitem,
			position,
			designation,
			quantite,
			cout_achat_unit,
			taux_marque,
			DAY(lj_date) AS jour,
			MONTH(lj_date) AS mois,
			YEAR(lj_date) AS annee,
			DATE(lj_date) AS date
				FROM livre_journal 
			WHERE numclient = '.$cli['numclient'].'
			AND attribut = \'1\'
		';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($cotation = mysql_fetch_assoc($req2)) {?>

	<?php
		//foreach($client as $cli)
		//{
	?>
	<?php
		//	$fMargeTot = 0;
		//	$fPdvTot = 0;
	?>
		<!--tr class="niv2">
			<td colspan=5></td>
		</tr-->

		<?php
		//	foreach($cotation as $cot)
		//	{
		//		if($cot['numclient'] == $cli['numclient'])
		//		{
		//			 $fMargeTot +=  $cot['quantite'] * ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) )-$cot['cout_achat_unit'];		
		//			 $fPdvTot +=  $cot['quantite'] * ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) );	
		//		}
		//	}
		?>

<!---->
		<tr class="niv3">
				<form	name="client"	action="goto_cotation.php"	method="post" >
				<input	type="text"	name="numclient"		id="numclient"	value="<?php echo $cli['numclient']  ; ?>" 	hidden />
				<input	type="text"	name="numcontact"		id="numcontact"	value="<?php echo $cli['numcontact']  ; ?>" 	hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $cli['numclient']; ?></button>			</td>	
				</form>
			<TD><?php echo strftime('%d-%m-%Y',strtotime($cli['date'] .'')); ?>										</td>
			<?php if (isset($cli['numcontact']) ) {?>
			<?php
			$sql3 = 'SELECT * FROM contacts WHERE numcontact = '.$cli['numcontact'].'';
			$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
			while($contact = mysql_fetch_assoc($req3)) {?>
			<td><?php echo $contact['nom']; ?>														</td>
			<td><?php echo $contact['prenom']; ?>														</td>
			<?php } //$get_contact ?>		
			<?php } // isset ?>		
			<td style="text-align:right;font-weight : bold;"><?php echo number_format ( $fMargeTot, 2, ",", " " ); ?> €					</td>
			<td style="text-align:right;font-weight : bold;"><?php echo number_format ( $fPdvTot, 2, ",", " " ); ?> €					</td>
				<form	name="modifier"	action="modifier.php"	method="post" >
				<input	type="text"	name="numclient"		id="numclient"	value="<?php echo $cli['numclient']  ; ?>" 	hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" class="display" ><button type="submit" class="button">[Modifier]</button>				</TD>
				</form>
		</tr>
<!---->


	<?php// } //finforeach client as cli ?>

	<?php
	//	$fMargeTotGeneral += $fMargeTot;	
	//	$fPdvTotGeneral += $fPdvTot;	
	?>
	<?php } //sql2 ?>
	<?php } //isset ?>
	<?php } //sql1 ?>

		<tr class="niv1">
			<td colspan=4 style="font-weight : bold;">TOTAL :</td>
			<td style="text-align:right;font-weight : bold;"><?php echo number_format ( $fMargeTotGeneral, 2, ",", " " ); ?> €				</td>
			<td style="text-align:right;font-weight : bold;"><?php echo number_format ( $fPdvTotGeneral, 2, ",", " " ); ?> €				</td>
			<td class="display">
		</tr>

	</table>
	<?php } mysql_close(); ?>
