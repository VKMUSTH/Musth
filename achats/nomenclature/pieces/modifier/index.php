	<?php require '../../../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php
	$sql1 = 'SELECT 
		titre,	
		numdossier,	
		date_depart,
		date_retour
			FROM clients
		WHERE numclient = '.$admin['numclient'].'
		';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top>
			<td>	<h1>Cotation: <?php echo $titre['titre']  ; ?> </h1>														</td>
			<td class=inputnum><label><a href="">N° Commande</a></label><input type="text" name="numcommande" value="<?php echo $admin['numcommande']  ; ?>" id="numcommande" />
				<form  action="supprimer.php"  method="post">
					<input type="submit" value="Supprimer"   />
				</form>
			</td>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				<form  action="modifier.php"  method="post">
				<input type="text" name="position" value="<?php echo $cotation['position']  ; ?>" id="position" hidden/>
				<input type="submit" value="Enregistrer"   />
			</td>
	</table>
	<?php
	$sql2 = 'SELECT 
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
		WHERE position = ' . $admin['position'] . ' 
		';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($cot = mysql_fetch_assoc($req2)) { ?>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr class="niv1">			
	<?php
	$sql3 = 'SELECT * FROM livre_journal WHERE position = '.$admin['numcommande'].'  ';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($commande = mysql_fetch_assoc($req3)) { ?>
			<TD COLSPAN=11 ALIGN=CENTER VALIGN=MIDDLE>	<B>COMMANDE: <?php echo $commande['designation']; ?>				</B>					</TD>
	<?php } //$get_commande ?>
		</tr>
		<tr class="niv2">
			<td STYLE="width:20%;">				<b>Désignation</b>													</TD>
			<td STYLE="width:12%;" >			<b>Qt</b>														</TD>
			<td STYLE="width:12%;" >			<b>Tx Mq.</b>														</TD>
			<td STYLE="width:10%;" class="display" >	<b>LIEN</b>														</TD>
		</tr>
	<?php
	//$fCoutUnitGeneral = 0;
	//$fCoutTotalGeneral = 0;
	//$fMargeUnitGeneral = 0;
	//$fMargeTotGeneral = 0;
	//$fPdvUnitGeneral = 0;
	//$fPdvTotGeneral = 0;

			//foreach($cotation as $cot)
			//{
			//		 $fCoutUnit += $cot['cout_achat_unit'];	
			//		 $fCoutTotal += $cot['cout_achat_unit'] * $cot['quantite'];	
			//		 $fMargeUnit +=  ($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit'];	
			//		 $fMargeTot += $cot['quantite'] * (($cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ))) - $cot['cout_achat_unit']);	
			//		 $fPdvUnit += $cot['cout_achat_unit'] / (1 - ( $cot['taux_marque'] / 100 ));	
			//		 $fPdvTot +=  $cot['quantite'] * ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) );	
		?>
<input type="text" value="<?php echo $fCoutTotal ;?>" name="debit" id="debit" hidden  >
		<tr class="niv3">
			<TD>	<input type="text" value="<?php echo $cot['designation']  ; ?>" name="designation" id="designation" >								</td>
			<TD>	<input type="text" value="<?php echo $cot['quantite_nomenclature']  ; ?>" name="quantite_nomenclature" id="quantite_nomenclature"  >				</td>
			<TD>	<input type="text" value="<?php echo $cot['taux_marque'] ;?>" name="taux_marque" id="taux_marque"  >								</td>
			<td>	<input type="text" value="<?php echo $cot['lien']  ; ?>" name="lien" id="lien" >										</TD>
		</tr>
		<?php	
		//		}
		//$fCoutUnitGeneral += $fCoutUnit;	
		//$fCoutTotalGeneral += $fCoutTotal;	
		//$fMargeUnitGeneral += $fMargeUnit;	
		//$fMargeTotGeneral += $fMargeTot;	
		//$fPdvUnitGeneral += $fPdvUnit;	
		//$fPdvTotGeneral += $fPdvTot;	

	?>
	</table>
					</form>
	<?php } //$get_cotation ?>
	<?php } //$get_client ?>
	<?php } mysql_close(); ?> 
