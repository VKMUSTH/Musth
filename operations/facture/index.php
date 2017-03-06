	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
		<?php
		$sql1 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].'  ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($client = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1"  >
			<TD>	<a href="mailing"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DEVIS N°:  <span class=red><?php echo $admin['numclient']; ?></span></B></a>					</TD>	
			<TD>	<a><B>DEVIS EN DATE DU: <span class=red><?php echo $client['date_cdv']; ?></span>	</B></a>								</TD>
	</table>
	<table border=0 cellpadding=0 cellspacing=0 >
		<?php if (isset($client['numcontact']) ) { ?>	
		<?php
		$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$client['numcontact'].'  ';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($contact = mysql_fetch_assoc($req2)) { ?>

		<TR>
			<TD>
				<B>
				<br>Destinataire
				<br>Adresse
				<br>
				<br>Email
				<br>Mobile
				</B>
			</TD>
			<TD>
				<br>: <?php echo $contact['civilite']; ?> <?php echo $contact['nom']; ?> <?php echo $contact['prenom']; ?>
				<br>: <?php echo $contact['adresse']; ?>
				<br>: <?php echo $contact['code_postal']; ?> <?php echo $contact['ville']; ?>
				<br>: <?php echo $contact['email']; ?>
				<br>: <?php echo $contact['tel_mobile']; ?>
			</TD>
			<TD VALIGN=TOP>
				<B>
				<br>Votre Conseiller
				<br>Tel
				<br>Email
				</B>
			</TD>
			<TD VALIGN=TOP>
				<br>: KEMPF Valéry
				<br>: 06 72 97 73 00
				<br>: valerykempf@gmail.com
			</TD>
		</TR>
		<TR>
			<TD colspan=4 style="text-align:right; ">Obernai, le : <span style='color:#8aa;'><?php echo $client['date_cdv']; ?></span>
		<TR>
			<TD COLSPAN=4 ><a href="modifier"><h1 style="text-align:center;">Musth<h1></a>												</td>
		</TR>
		<TR>
			<TD COLSPAN=4>Cher(e) <?php echo $contact['civilite']; ?> <?php echo $contact['nom']; ?>,
		<tr><td><br>
		<TR>
			<TD colspan=4 ALIGN=JUSTIFY>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client['facture']; ?>										</TD>	
		</TR>
		<?php } //$get_contact?> 
		<?php } //isset_contact?> 

	</table>
	<br><br>

	<br/>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr>
			<td width="55%">																			</td>
			<td width="2%" rowspan=15 >																		</td>
			<td width="15%">																			</td>
			<td width="2%" rowspan=15>																		</td>
			<td width="10%" >																			</td>
			<td width="2%" rowspan=15>																		</td>
			<td width="10%" >																			</td>
			<td width="2%" rowspan=15 class="display">																</td>
			<td width="10%" class="display">																	</td>
		</tr>
		<tr class="nivred">
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	DÉSIGNATION															</td>
			<td align=center>			PRIX UNITAIRE															</td>
			<td align=center>			QUANTITÉ															</td>
			<td align=center>			MONTANT																</td>
			<td align=center class="display">	COMMANDE															</td>
		</tr>
		<?php if (isset($client['facturation_debut'],$client['facturation_fin']) ) { ?>	
		<?php // Récupération des données de cotation	
		$sql3 = 'SELECT 
			numitem,
			numclient,
			position,
			designation,
			attribut,
			lien,
			quantite,
			cout_achat_unit,
			pdv_unit,
			pdv_tot,
			taux_marque,
			att_cmd,
			DAY(lj_date) AS jour,
			MONTH(lj_date) AS mois,
			YEAR(lj_date) AS annee,
			DATE(lj_date) AS date
				FROM livre_journal 
			WHERE numclient = ' . $admin['numclient'] . '
			AND STR_TO_DATE(DATE(lj_date), "%Y-%m-%d") BETWEEN "'.$client['facturation_debut'].'" AND "'.$client['facturation_fin'].'"
			AND attribut = \'cmd\'
			ORDER BY numitem ASC

			';
		$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
		while($cot = mysql_fetch_assoc($req3)) { ?>
<!---->
	<?php
	//$fCoutUnitGeneral = 0;
	//$fCoutTotalGeneral = 0;
	//$fMargeUnitGeneral = 0;
	//$fMargeTotGeneral = 0;
	//$fPdvUnitGeneral = 0;
	//$fPdvTotGeneral = 0;

			//foreach($cotation as $cot)
			//{
	//				 $fCoutUnit += $cot['cout_achat_unit'];	
	//				 $fCoutTotal += $cot['cout_achat_unit'] * $cot['quantite'];	
	//				 $fMargeUnit +=  ($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit'];	
	//				 $fMargeTot += $cot['quantite'] * (($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit']);	
	//				 $fPdvUnit += $cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ));	
	//				 $fPdvTot +=  $cot['quantite'] * ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) );	
		?>
		<tr class="niv3">
			<td STYLE="border-left: 1px solid #b8bec3;"><b><?php// echo $cot['designation'] ;?></b>											</td>
			<td style="text-align:right;"><?php// echo $cot['pdv_unit'] ;?>
			<?php //echo number_format ( round ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) , 2, PHP_ROUND_HALF_UP ), 2, ",", " " ) ;?> €			</td>
			<td  style="text-align:right;font-weight : bold;"><?php// echo $cot['quantite'] ;?>											</td>
			<td style="text-align:right;">
			<?php //echo number_format ( round ( $cot['quantite'] * ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) ) , 2, PHP_ROUND_HALF_UP ), 2, ",", " " ) ;?> €	</td>
				<form name="modifier" action="modifier_commande.php"  method="post">
				<input type="text" name="position" value="<?php// echo $cot['position']  ; ?>" id="position" hidden />	
			<td STYLE="border-right: 1px solid #b8bec3;" class="display"><button type="submit" class="button">Modifier</button>							</td>
				</form>
		</tr>
		<?php	
			//	}
	//	$fCoutUnitGeneral += $fCoutUnit;	
	//	$fCoutTotalGeneral += $fCoutTotal;	
	//	$fMargeUnitGeneral += $fMargeUnit;	
	//	$fMargeTotGeneral += $fMargeTot;	
	//	$fPdvUnitGeneral += $fPdvUnit;	
	//	$fPdvTotGeneral += $fPdvTot;	
		?>
	<?php } //$get_cotation ?> 
	<?php } //isset_cotation ?> 

		<tr class="niv1">
			<td style="font-weight : bold;" align=right>TOTAL :															</td>
			<td>																					</td>
			<td>																					</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fPdvTotGeneral, 2, ",", " " ); ?> €							</td>
			<td class="display">																			</td>
		</tr>
		<!--tr class="display">
			<td><br>																				</td>
		</tr>
		<tr class="display">
			<td align="right"><b>Acomptes versés:</b>																</td>
			<td>																					</td>
			<td>																					</td>
		<?php
		$sql4 = 'SELECT 
				ROUND(SUM(credit),2) as acompte 
					FROM livre_journal 
				WHERE numclient= '.$admin['numclient'].' 
				AND STR_TO_DATE(DATE(lj_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
				AND attribut= \'cmd\'
				';
		$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
		while($acomptes = mysql_fetch_assoc($req4)) { ?>
			<td align="right"><b><?php echo $acomptes['acompte']  ; ?> €</b>													</td>
		<?php } //$get_acomptes ?> 
		</tr>
		<tr>
			<td><br>																				</td>
		</tr>
		<tr class="display">
			<td align="right"><b>Solde restant à payer:</b>																</td>
			<td>																					</td>
			<td>																					</td>
		<?php
		$sql5 = 'SELECT 
			ROUND(SUM(credit),2) as acompte 
				FROM livre_journal 
			WHERE numclient= '.$admin['numclient'].' 
			AND STR_TO_DATE(DATE(lj_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND attribut= \'cmd\'
			';
		$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error());
		while($solde = mysql_fetch_assoc($req5)) { ?>
			<td align="right"><b><?php echo $solde['acompte']  ; ?> €</b>														</td>
		<?php } //$get_solde ?> 
		</tr-->
<!---->


	<?php } //$get_client ?> 

	</table>
	<br><br>

	<?php //MENTIONS LEGALES
						$niv = '';include($niv.'../../mentions_legales/admin.php');?>

<?php } mysql_close(); ?>
