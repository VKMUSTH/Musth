	<?php include "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<TD>


			<?php
			$sql2 = 'SELECT * FROM items WHERE numitem = '.$admin['numitem'].'  ';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($commande = mysql_fetch_assoc($req2)) { ?>
			<TD COLSPAN=10 ALIGN=CENTER VALIGN=MIDDLE>	<h1>NOMENCLATURE: <?php echo $commande['designation']; ?>			</h1>					</TD>
			<?php } //get_commande ?>


			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
			<input type="button"  onclick="location.href='ajouter'" value="Ajouter" />
			</td>
		</tr>
	</table>
	<br/>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr class="niv1">
			<TD COLSPAN=10 ALIGN=CENTER VALIGN=MIDDLE>	<B>DÉTAIL</B>														</TD>

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
			quantite_nomenclature,
			cout_achat_unit,
			taux_marque,
			att_cmd,
			DAY(lj_date) AS jour,
			MONTH(lj_date) AS mois,
			YEAR(lj_date) AS annee,
			DATE(lj_date) AS date
				FROM livre_journal 
			WHERE numitem = ' . $admin['numitem'] . '
			AND compte = \'achats-commande-ajouter\' 
			ORDER BY position ASC

			';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($cot = mysql_fetch_assoc($req1)) { ?>
	<?php
	$fCoutUnitGeneral = 0;
	$fCoutTotalGeneral = 0;
	$fMargeUnitGeneral = 0;
	$fMargeTotGeneral = 0;
	$fPdvUnitGeneral = 0;
	$fPdvTotGeneral = 0;

			//foreach($cotation as $cot)
			//{
					 $fCoutUnit += $cot['cout_achat_unit'];	
					 $fCoutTotal += $cot['cout_achat_unit'] * $cot['quantite_nomenclature'];	
					 $fMargeUnit +=  ($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit'];	
					 $fMargeTot += $cot['quantite_nomenclature'] * (($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit']);	
					 $fPdvUnit += $cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ));	
					 $fPdvTot +=  $cot['quantite_nomenclature'] * ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) );	
	?>
		<tr class="niv3">
			<td STYLE="border-left: 1px solid #b8bec3;"><a href="<?php echo $cot['lien'] ;?>" target="_blanck"><?php echo $cot['designation'] ;?></a>				</td>
			<td  style="text-align:right;font-weight : bold;"><?php echo $cot['quantite_nomenclature'] ;?>											</td>
			<td style="text-align:right;border-left: 1px solid #b8bec3;"><?php echo number_format ( $cot['cout_achat_unit'] , 2, ",", " " );?> €					</td>
			<td style="text-align:right;"><?php echo number_format ( $cot['cout_achat_unit'] * $cot['quantite_nomenclature'] , 2, ",", " " );?> €					</td>
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
		<TR>
			<td colspan=10>		<div id="filet"></div>													</td>
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
	<?php } //$get_cot ?>
		<tr class="niv2">
			<td colspan=2 style="font-weight : bold;">SOUS TOTAL :</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fCoutUnitGeneral, 2, ",", " " ); ?> 							</td>
			<td style="text-align:right;font-weight : bold;"><?php echo number_format ( $fCoutTotalGeneral, 2, ",", " " ); ?> €							</td>
			<td><br>																				</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fMargeUnitGeneral, 2, ",", " " ); ?> 							</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fMargeTotGeneral, 2, ",", " " ); ?> 							</td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fPdvUnitGeneral, 2, ",", " " ); ?> 							</td>
			<td style="text-align:right;font-weight : bold;"><?php echo number_format ( $fPdvTotGeneral, 2, ",", " " ); ?> €							</td>
			<td class="display">
		</tr>
	</table>
	<?php } mysql_close();?>
