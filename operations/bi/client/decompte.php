	<?php require '../../../connexion_sql.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>	
	<?php
	$sql6 = 'SELECT 
		numproduit,
		numdossier,
		numclient,
		numcontact,
		date_depart,
		date_retour,
		facturation_debut,
		facturation_fin,
		date_cdv
			FROM clients 
		WHERE numclient = '.$admin['numclient'].'
		';
	$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req6)) { ?>
	<?php
	$sql1 = 'SELECT 
			numitem,
			numclient,
			position,
			designation,
			attribut,
			lien,
			quantite,
			pdv_unit,
			pdv_tot,
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
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($cot = mysql_fetch_assoc($req1)) { ?>	

	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD COLSPAN=4 HEIGHT=16 ALIGN=CENTER VALIGN=MIDDLE >			<a href="../../../operations/cotation"><B>DECOMPTE</B></a>					</TD>
		</TR>
		<TR  HEIGHT=16 ALIGN=LEFT class="niv2">	
			<TD STYLE="width:50%; border-left: 1px solid #b8bec3" >			<B>Libellé</B>											</TD>
			<TD>									<B>Prix unit.</B>										</TD>
			<TD>									<B>Participants / Qt</B>									</TD>
			<TD STYLE="border-right: 1px solid #b8bec3" >				<B>Montant</B>											</TD>
		</TR>
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
		<tr class="niv3">
			<td STYLE="border-left: 1px solid #b8bec3;"><b><?php echo $cot['designation'] ;?></b>											</td>
			<td style="text-align:left;"><?php echo $cot['pdv_unit'] ;?>														</td>
			<!--?php echo number_format ( round ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) , 2, PHP_ROUND_HALF_UP ), 2, ",", " " ) ;?> €-->			</td>
			<td  style="text-align:left;font-weight : bold;"><?php echo $cot['quantite'] ;?>											</td>
			<td style="text-align:left;"><?php echo $cot['pdv_tot'] ;?>														</td>
			<!--?php echo number_format ( round ( $cot['quantite'] * ( $cot['cout_achat_unit'] / ( 1 - ( $cot['taux_marque'] / 100 ) ) ) , 2, PHP_ROUND_HALF_UP ), 2, ",", " " ) ;?> € -->	</td>

		</tr>
	<?php	
			//}
		//$fCoutUnitGeneral += $fCoutUnit;	
		//$fCoutTotalGeneral += $fCoutTotal;	
		//$fMargeUnitGeneral += $fMargeUnit;	
		//$fMargeTotGeneral += $fMargeTot;	
		//$fPdvUnitGeneral += $fPdvUnit;	
		//$fPdvTotGeneral += $fPdvTot;	
	?>
	<?php
	$sql2 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].' ';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($infosdossier = mysql_fetch_assoc($req2)) { ?>
		<TR class="niv3">
			<TD STYLE="border-top: 1px solid #b8bec3; border-left: 1px solid #b8bec3"  HEIGHT=16 ALIGN=RIGHT>	<B>Prix indicatif par voyageur :</B>				</TD>
			<TD STYLE="border-top: 1px solid #b8bec3" ALIGN=LEFT> €															</TD>
			<TD COLSPAN=1 STYLE="border-top: 1px solid #b8bec3" ALIGN=LEFT><B>Montant TOTAL :</B>											</TD>
			<TD COLSPAN=1 STYLE="border-top: 1px solid #b8bec3; border-right: 1px solid #b8bec3" ALIGN=RIGHT >

	<?php
	$sql3 = 'SELECT ROUND(SUM(pdv_tot),2) as pdv FROM livre_journal WHERE numclient = '.$admin['numclient'].' ';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($total_pdv = mysql_fetch_assoc($req3)) { ?>
				<?php echo $total_pdv['pdv']  ; ?> €	
	<?php } //$get_pdv  ?>
		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3"  HEIGHT=16 ALIGN=RIGHT>					Acompte TOTAL :							</TD>
			<TD ALIGN=LEFT>											<BR>									</TD>
			<TD ALIGN=LEFT SDVAL="0,25" >										35,00%								</TD>
			<TD STYLE="border-right: 1px solid #b8bec3" ALIGN=RIGHT >	
	<?php
	$sql4 = 'SELECT ROUND(SUM(pdv_tot*0.35),2) as acompte FROM livre_journal WHERE numclient = '.$admin['numclient'].' ';
	$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
	while($acompte = mysql_fetch_assoc($req4)) { ?>
				<?php echo $acompte['acompte']  ; ?> €	
	<?php } //$get_montant_acompte  ?>
		</TR>
		<TR class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3"  HEIGHT=16 ALIGN=RIGHT>					Solde en Euros à verser au plus tard le :			</TD>
			<TD ALIGN=RIGHT ><?php// echo strftime('%d-%m-%Y',strtotime($infosdossier['date_depart'] .'-30 day')); ?>
			<TD ALIGN=LEFT><BR>
			<TD STYLE="border-right: 1px solid #b8bec3" ALIGN=RIGHT >
	<?php
	$sql5 = 'SELECT ROUND(SUM(pdv_tot*0.65),2) as solde FROM livre_journal WHERE numclient = '.$admin['numclient'].' ';
	$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error());
	while($solde = mysql_fetch_assoc($req5)) { ?>
				<?php echo $solde['solde']  ; ?> €	
	<?php } //$getsolde ?>
		<TR class="niv3" HEIGHT=16 ALIGN=LEFT>
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3" ><BR>									
			<TD STYLE="border-bottom: 1px solid #b8bec3" ><br>
			<TD STYLE="border-bottom: 1px solid #b8bec3" >					<I><FONT SIZE=1>*Sous peine de non réalisation du voyage</FONT></I>	
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-right: 1px solid #b8bec3 " ><BR>											</TD>
		</TR>
	</TABLE>
	<?php } //$get_infosdossier ?>
	<?php } //$get_cotation ?>
	<?php } //$get_client ?>
	<?php } mysql_close(); ?>
