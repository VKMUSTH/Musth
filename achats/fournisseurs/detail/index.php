	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<?php 	if (isset($admin['numcontact']) ) {?>
		<?php
		$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].'  ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($fournisseur = mysql_fetch_assoc($req1)) { ?>
			<td>		<h1>Détail de la commande <?php echo $fournisseur['nom_firme']  ; ?></h1> 
		<?php } //$get_fournisseur ?>	
		<?php } //isset ?>	

			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
			</TD>
			<td class=inputnum><label><a href="">N° Commande</a></label><input type="text" name="numcommande" value="<?php echo $admin['numcommande']  ; ?>" id="numcommande" />	

			</td>
				<form name="goto" action="goto_contact.php"  method="post">
				<input type="text" name="numcontact" value="<?php// echo $fournisseur['numcontact']  ; ?>" id="numcontact" hidden />
			<td class=inputnum><label><a>N° Contact Four</a></label><button type="submit" class="button"><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" /></button>	
				</form>

			</td>
		</tr>
	</table>
	<br/>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr class="niv1">
			<?php
			$sql2 = 'SELECT * FROM livre_journal WHERE position = '.$admin['numcommande'].'  ';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($commande = mysql_fetch_assoc($req2)) { ?>
			<TD COLSPAN=10 ALIGN=CENTER VALIGN=MIDDLE>	<B>COMMANDE					</B>					</TD>
			<?php } //$get_commande ?>
		</tr>
		<tr class="niv2">
			<td STYLE="width:30%;">				<b>Désignation</b>													</TD>
			<td STYLE="width:4%;" >				<b>Qt</b>														</TD>
			<td STYLE="width:7%;" >				<b>Coût unit</b>													</TD>
			<td STYLE="width:7%;" >				<b>Coût tot</b>														</TD>
			<td STYLE="width:5%;" >				<b>Tx Mq.</b>														</TD>
			<td STYLE="width:7%;" >				<b>Marge un</b>														</TD>
			<td STYLE="width:7%;" >				<b>Marge tot</b>													</TD>
			<td STYLE="width:8%;" >				<b>PDV un</b>														</TD>
			<td STYLE="width:8%;" >				<b>PDV tot</b>														</TD>
			<td STYLE="width:10%;" class="display" >	<b>COMMANDE</b>														</TD>
		</tr>
	<?php $sql1 = 'SELECT 
			numitem,
			numclient,
			position,
			designation,
			attribut,
			lien,
			quantite,
			cout_achat_unit,
			taux_marque,
			att_cmd,
			DAY(lj_date) AS jour,
			MONTH(lj_date) AS mois,
			YEAR(lj_date) AS annee,
			DATE(lj_date) AS date
				FROM livre_journal 
			WHERE numcommande = ' . $admin['numcommande'] . '

			ORDER BY position ASC

			';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($cot = mysql_fetch_assoc($req1)) { ?>
	<?php
	//$fCoutUnitGeneral = 0;
	//$fCoutTotalGeneral = 0;
	//$fMargeUnitGeneral = 0;
	//$fMargeTotGeneral = 0;
	//$fPdvUnitGeneral = 0;
	//$fPdvTotGeneral = 0;

	//		foreach($cotation as $cot)
	//		{
					// $fCoutUnit += $cot['cout_achat_unit'];	
					// $fCoutTotal += $cot['cout_achat_unit'] * $cot['quantite'];	
					// $fMargeUnit +=  ($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit'];	
					// $fMargeTot += $cot['quantite'] * (($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit']);	
					// $fPdvUnit += $cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ));	
					// $fPdvTot +=  $cot['quantite'] * ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) );	
	?>
		<tr class="niv3">
			<td STYLE="border-left: 1px solid #b8bec3;"><a href="<?php echo $cot['lien'] ;?>" target="_blanck"><?php echo $cot['designation'] ;?></a>				</td>
			<td  style="text-align:right;font-weight : bold;"><?php echo $cot['quantite'] ;?>											</td>
			<td style="text-align:right;border-left: 1px solid #b8bec3;"><?php echo number_format ( $cot['cout_achat_unit'] , 2, ",", " " );?> €					</td>
			<td style="text-align:right;"><?php echo number_format ( $cot['cout_achat_unit'] * $cot['quantite'] , 2, ",", " " );?> €						</td>
			<td style="text-align:right;border-left: 1px solid #b8bec3;"><?php echo number_format ( $cot['taux_marque']  , 2, ",", " " );?> %					</td>
			<td style="text-align:right;">
			<?php echo number_format ( round( ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) ) - $cot['cout_achat_unit'] , 2, PHP_ROUND_HALF_DOWN ), 2, ",", " " )  ;?> €
			</td>
			<TD>																					</TD>
			<td style="text-align:right;border-left: 1px solid #b8bec3;">
			<?php echo number_format ( round ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) , 2, PHP_ROUND_HALF_UP ), 2, ",", " " ) ;?> €			</td>
			<td style="text-align:right;border-right: 1px solid #b8bec3;">
			<?php echo number_format ( round ( $cot['quantite'] * ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) ) , 2, PHP_ROUND_HALF_UP ), 2, ",", " " ) ;?> €	</td>
				<form name="modifier" action="modifier.php"  method="post">
				<input type="text" name="position" value="<?php echo $cot['position']  ; ?>" id="position" hidden />	
			<td STYLE="border-right: 1px solid #b8bec3;" class="display"><button type="submit" class="button">Modifier</button>							</td>
				</form>
		</tr>
		<?php	
	//			}
	//	$fCoutUnitGeneral += $fCoutUnit;	
	//	$fCoutTotalGeneral += $fCoutTotal;	
	//	$fMargeUnitGeneral += $fMargeUnit;	
	//	$fMargeTotGeneral += $fMargeTot;	
	//	$fPdvUnitGeneral += $fPdvUnit;	
	//	$fPdvTotGeneral += $fPdvTot;	
	
	?>
	<?php } //$get_cot ?>
		<tr class="niv2">
			<td colspan=2 style="font-weight : bold;">SOUS TOTAL :</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fCoutUnitGeneral, 2, ",", " " ); ?> €							</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fCoutTotalGeneral, 2, ",", " " ); ?> €							</td>
			<td><br>																				</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fMargeUnitGeneral, 2, ",", " " ); ?> €							</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fMargeTotGeneral, 2, ",", " " ); ?> €							</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fPdvUnitGeneral, 2, ",", " " ); ?> €							</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fPdvTotGeneral, 2, ",", " " ); ?> €							</td>
			<td class="display">
		</tr>
	</table>
	<?php } mysql_close();?>
