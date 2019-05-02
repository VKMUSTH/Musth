	<?php require "../../header.php"; ?>
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>

	<table 		name="topnav" border=0 cellpadding=0 cellspacing=0 >
		<TR 	name="menu" valign=top  >
			<td>	<h1>Activation</h1>											</td>
					<form action="get_mois.php" method="post" >
			<td class=inputnum><label><a href="">Mois</a></label><input type="text" name="mois_en_cours" value="<?php echo $admin['mois_en_cours']  ; ?>" id="mois_en_cours" />
					</form>
			</td>
					<form action="get_annee.php" method="post" >
			<td class=inputnum><label><a href="">Année<a></label><input type="text"  name="annee_en_cours" id="annee_en_cours" value="<?php echo $admin['annee_en_cours']  ; ?>"	 />
					</form>
				<table 		name="bout" border=0 cellpadding=0 cellspacing=0 >
					<TR 	name="menu" valign=top  >
						<td>
							<form action="get_annee_inf_sup.php" method="post" >
							<input type="text"  name="annee_en_cours" value="<?php echo $admin['annee_en_cours']-1  ; ?>"  id="annee_en_cours" hidden />
							<button type="submit" class="button">[-]</button> 
							</form>
						</td>
						<td>
							<form action="get_annee_inf_sup.php" method="post" >
							<input type="text"  name="annee_en_cours" value="<?php echo $admin['annee_en_cours']+1 ; ?>"  id="annee_en_cours" hidden />
							<button type="submit" class="button">[+]</button> 
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>																
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr class="niv1">
			<TD COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE>	<B>ciblage des contacts ebay ayant laissé une éval positive + ceux qui ont un num de portable vont recevoir un publipostage avec offre de guitare</B>													</TD>
		</tr>
		<tr class="niv2">
			<td STYLE="width:10%;">				<b>Numclient</b>													</TD>
			<td STYLE="width:10%;" >			<b>Date cdv</b>														</TD>
			<td STYLE="width:20%;" >			<b>Nom</b>														</TD>
			<td STYLE="width:20%;" >			<b>Prénom</b>														</TD>
			<td STYLE="width:15%;" >			<b>Marge</b>														</TD>
			<td STYLE="width:15%;" >			<b>PDV</b>														</TD>
			<td STYLE="width:10%;" class="display" >	<b>COMMANDE</b>														</TD>
		</tr>
	<?php $sql1 = 'SELECT  
			numproduit,
			numdossier,
			numclient,
			numcontact,
			DAY(date_cdv) AS jour,
			MONTH(date_cdv) AS mois,
			YEAR(date_cdv) AS annee,
			DATE(date_cdv) AS date,
			marge,
			pdv,
			eval_ebay
				FROM clients 
			WHERE statut =\'EXPÉDIÉ\'
			AND YEAR(date_cdv) = ' .$admin['annee_en_cours'] . ' 
			AND eval_ebay = \'\'
			ORDER BY numclient DESC
			';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($cot = mysql_fetch_assoc($req1)) { ?>


		<?php if (isset($cot['numcontact']) ) {?>
		<?php
		$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$cot['numcontact'].' AND tel_mobile <> \'\' ';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($contact = mysql_fetch_assoc($req2)) { ?>
	<?php
	$fCoutUnitGeneral = 0;
	$fCoutTotalGeneral = 0;
	$fMargeUnitGeneral = 0;
	$fMargeTotGeneral = 0;
	$fPdvUnitGeneral = 0;
	$fPdvTotGeneral = 0;

			//foreach($cotation as $cot)
			//{
					// $fCoutUnit += $cot['cout_achat_unit'];	
					// $fCoutTotal += $cot['cout_achat_unit'] * $cot['quantite_nomenclature'];	
					// $fMargeUnit +=  ($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit'];	
					// $fMargeTot += $cot['quantite_nomenclature'] * (($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit']);	
					// $fPdvUnit += $cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ));	
					 $fPdvUnit +=  $cot['marge'];	
					 $fPdvTot +=  $cot['pdv'];	
	?>
		<tr class="niv3">
				<form name="client" action="goto_contact.php" method="post" >
				<input type="text" name="numproduit"	id="numproduit"		value="<?php echo $cot['numproduit']  ; ?>" hidden />
				<input type="text" name="numdossier"	id="numdossier"		value="<?php echo $cot['numdossier']  ; ?>" hidden />
				<input type="text" name="numclient"	id="numclient"		value="<?php echo $cot['numclient']  ; ?>"	hidden />
				<input type="text" name="numcontact"	id="numcontact"		value="<?php echo $cot['numcontact']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $cot['numclient']; ?></button>						</td>	
				</form>
			<td  style="text-align:right;font-weight : bold;"><?php echo strftime('%d-%m-%Y',strtotime($cot['date'] .'')); ?>							</td>
			<td style="text-align:right;border-left: 1px solid #b8bec3;">	<?php echo $contact['nom']; ?>										</td>
			<td style="text-align:right;">	<?php echo $contact['prenom']; ?>													</td>
			<td  style="text-align:right;font-weight : bold;"><?php echo $cot['marge'] ;?>												</td>






			<td  style="text-align:right;font-weight : bold;"><?php echo $cot['pdv'] ;?>												</td>
				<form name="modifier" action="modifier.php"  method="post">
				<input type="text" name="numclient" value="<?php echo $cot['numclient']  ; ?>" id="numclient" hidden />	
			<td STYLE="border-right: 1px solid #b8bec3;" class="display"><button type="submit" class="button">Modifier</button>							</td>
				</form>
		</tr>
		<TR>
			<td colspan=7>		<div id="filet"></div>																</td>
		</TR>		

		<?php	
			//	}
		$fCoutUnitGeneral += $fCoutUnit;	
		$fCoutTotalGeneral += $fCoutTotal;	
		$fMargeUnitGeneral += $fMargeUnit;	
		$fMargeTotGeneral += $fMargeTot;	
		$fPdvUnitGeneral += $fPdvUnit;	
		$fPdvTotGeneral += $fPdvTot;	
	
	?>
		<?php } //$get_contact?>		
		<?php } // isset sql2 ?>

	<?php } //$get_cot ?>
		<tr class="niv2">
			<td colspan=2 style="font-weight : bold;">TOTAL :</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fCoutUnitGeneral, 2, ",", " " ); ?> 							</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fCoutTotalGeneral, 2, ",", " " ); ?> 							</td>
			<td style="text-align:right;font-weight : bold;"><?php echo number_format ( $fPdvUnitGeneral, 2, ",", " " ); ?> 							</td>
			<td style="text-align:right;font-weight : bold;"><?php echo number_format ( $fPdvTotGeneral, 2, ",", " " ); ?> €							</td>
			<td class="display">
		</tr>
	</table>

<br>
<br>
<br>

	<table border=0 cellpadding=0 cellspacing=0 >
		<tr class="niv1">
			<TD COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE>	<B>LISTES DES CAMPAGNES COMMUNICATION</B>										</TD>
		</tr>
		<tr class="niv2">
			<td STYLE="width:10%;">				<b>Numcampagne</b>													</TD>
			<td STYLE="width:80%;" >			<b>Titre</b>														</TD>
			<td STYLE="width:10%;" class="display" >	<b>COMMANDE</b>														</TD>
		</tr>
		<?php
		$sql2 = 'SELECT  
			position,
			titre
				FROM campagnes 
			';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($contact = mysql_fetch_assoc($req2)) { ?>

		<tr class="niv3">
				<form name="client" action="goto_campagne.php" method="post" >
				<input type="text" name="position"	id="position"		value="<?php echo $contact['position']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $contact['position']; ?></button>						</td>	
				</form>

			<td style="text-align:right;border-left: 1px solid #b8bec3;">	<?php echo $contact['titre']; ?>									</td>

				<form name="modifier" action="modifier.php"  method="post">
				<input type="text" name="position" value="<?php echo $contact['position']  ; ?>" id="position" hidden />	
			<td STYLE="border-right: 1px solid #b8bec3;" class="display"><button type="submit" class="button">Modifier</button>							</td>
				</form>
		</tr>
		<TR>
			<td colspan=7>		<div id="filet"></div>																</td>
		</TR>		

		<?php } //$get_contact?>		



	</table>
	<?php } mysql_close(); ?>
