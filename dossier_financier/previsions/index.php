	<?php require "../../header.php"; ?>
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Prévisions de Trésorerie</h1> 																</td>	
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		</td>
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
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=8 ALIGN=CENTER VALIGN=MIDDLE >		<B>PRÉVISIONS DU MOIS EN COURS</B>								</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;  " >				<B>Date</B>											</TD>
			<TD STYLE="width:50%;">					<B>Designation</B>										</TD>
			<TD STYLE="width:10%;">					<B>Débit</B>											</TD>
			<TD STYLE="width:10%;">					<B>Crédit</B>											</TD>
			<TD class="display" STYLE="width:10%;" >		<B>Comande</B>											</TD>
		</TR>
		<?php
		$sql1 = 'SELECT 
			numproduit,
			numdossier,
			numitem,
			position,
			inscription,
			debit,
			credit,
			DAY(lj_date) AS jour,
			MONTH(lj_date) AS mois,
			YEAR(lj_date) AS annee,
			DATE(lj_date) AS date
				FROM livre_journal
			WHERE etat =\'prevision\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND compte = \'achats-commande-ajouter-ins\' 
				OR etat =\'prevision\'  
			AND numclient = ' .$admin['numclient'] . ' 
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND compte = \'plan-comptable\' 

				OR etat =\'prevision\'  
			AND numclient = ' .$admin['numclient'] . ' 
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND attribut =\'ins\'  
				OR etat =\'prevision\'
			AND numclient = ' .$admin['numclient'] . ' 
			AND compte =\'1\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND attribut =\'aco\'  
				OR etat =\'prevision\'
			AND numclient = ' .$admin['numclient'] . ' 
			AND compte =\'1\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
				OR etat =\'prevision\'
			AND compte =\'1\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND attribut =\'cot\'  
			ORDER BY lj_date ASC
		';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($data = mysql_fetch_assoc($req1)) { ?>
				<form name="zoomer" action="modifier.php"  method="post">
				<input type="text" name="numinscription" id="numinscription"  value="<?php echo $data['position']  ; ?>" hidden/>
		<TR class="niv3"	ALIGN=LEFT	>
			<TD STYLE="border-left: 1px solid #b8bec3"><?php echo strftime('%d-%m-%Y',strtotime($data['date'] .'')); ?>						</TD>
			<TD><?php echo $data['inscription']  ; ?>														</TD>
			<TD><?php echo $data['debit']  ; ?>															</TD>
			<TD><?php echo $data['credit']  ; ?>															</TD>
			<TD STYLE="border-left: 1px solid #b8bec3;border-right: 1px solid #b8bec3;"  class="display">	<button type="submit" class="button">[Modifier]</button></TD>
		</TR>
				</form>
		<TR>
			<TD COLSPAN=5>		<div id="filet"></div>														</TD>
		</TR>	
		<?php } //$get_data ?>
		<TR class="niv2">
			<td colspan=2 ALIGN=RIGHT><b>TOTAL: </b>
			<?php
			$sql2 = 'SELECT
					ROUND(SUM(debit),2) as totaldebit,
					YEAR(lj_date) AS annee, 
					MONTH(lj_date) AS mois
				FROM livre_journal
			WHERE etat =\'prevision\'  
			AND numclient = ' .$admin['numclient'] . ' 
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
				OR etat =\'prevision\'  
			AND numclient = ' .$admin['numclient'] . ' 
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND attribut =\'ins\'  
				OR etat =\'prevision\'
			AND numclient = ' .$admin['numclient'] . ' 
			AND compte =\'1\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND attribut =\'aco\'  
				OR etat =\'prevision\'
			AND numclient = ' .$admin['numclient'] . ' 
			AND compte =\'1\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
				OR etat =\'prevision\'
			AND compte =\'1\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND attribut =\'cot\'  
			ORDER BY lj_date ASC
						';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($debit = mysql_fetch_assoc($req2)) { ?>
			<TD><B><?php echo $debit['totaldebit']  ; ?></B>														</TD>
			<?php } //$get_debit ?>

			<?php
			$sql3 = 'SELECT 
				ROUND(SUM(credit),2) as totalcredit,
				YEAR(lj_date) AS annee, 
				MONTH(lj_date) AS mois
				FROM livre_journal
			WHERE etat =\'prevision\'  
			AND numclient = ' .$admin['numclient'] . ' 
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
				OR etat =\'prevision\'  
			AND numclient = ' .$admin['numclient'] . ' 
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND attribut =\'ins\'  
				OR etat =\'prevision\'
			AND numclient = ' .$admin['numclient'] . ' 
			AND compte =\'1\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND attribut =\'aco\'  
				OR etat =\'prevision\'
			AND numclient = ' .$admin['numclient'] . ' 
			AND compte =\'1\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
				OR etat =\'prevision\'
			AND compte =\'1\'  
			AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
			AND MONTH(lj_date) = ' .$admin['mois_en_cours'] . ' 
			AND attribut =\'cot\'  
			ORDER BY lj_date ASC
						';
			$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
			while($credit = mysql_fetch_assoc($req3)) { ?>
			<TD><B><?php echo $credit['totalcredit']  ; ?></B>														</TD>
			<?php } //$get_credit ?>
			<td class="display"><br>
		</tr>
	</table>
	<?php } mysql_close(); ?>
