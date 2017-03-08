	<?php include "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top>
			<td>	<h1>Planning du jour x</h1>													</td>

			<td class=inputnum><label><a href="">Date</a></label><input type="text" name="" value="<?php echo strftime('%d-%m-%Y',strtotime($admin['date_en_cours'])); ?>" id="" />		
			</td>

				<form action="getposition2.php" method="post" >
			<td class=inputnum><label><a href="">Jour +/-</a></label><input type="text" name="position2" value="<?php echo $admin['position2']  ; ?>" id="position2" />		
				</form>

			</td>
			<?php $delai= $admin['position2']; ?>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="1" id="numdossier" />		
				<form action="allerversdate.php" method="post" >
				<input type="text"  name="date_en_cours" value="<?php echo strftime('%Y-%m-%d',strtotime($admin['date_en_cours'] .'-'.$delai.' day')); ?>"  id="date_en_cours" hidden />
				<input type="text"  name="jour_en_cours" value="<?php echo $admin['jour_en_cours']-$delai ; ?>"  id="jour_en_cours" hidden />
				<button type="submit" class="button">[-]</button> 
				</form>

			</td>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="1" id="numclient" />		
				<form action="allerversdate.php" method="post" >
				<input type="text"  name="date_en_cours" value="<?php echo strftime('%Y-%m-%d',strtotime($admin['date_en_cours'] .'+'.$delai.' day')); ?>"  id="date_en_cours" hidden />
				<input type="text"  name="jour_en_cours" value="<?php echo $admin['jour_en_cours']+$delai ; ?>"  id="jour_en_cours" hidden />
				<button type="submit" class="button">[+]</button> 
				</form>
			</td>
		</tr>
	</table>	
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=4 ALIGN=CENTER VALIGN=MIDDLE >				<B>BUG LIST DÉVELOPPEMENT EN COURS</B>		</TD>
			<td colspan=2>	<input type="button" onclick="location.href='nouveau'" value="Nouveau" />					</td>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>					</TD>
			<TD STYLE="width:60%;">							<B>Désignation</B>				</TD>
			<TD STYLE="width:10%;">							<B>Temps</B>					</TD>
			<TD STYLE="width:10%;">							<B>Commande</B>					</TD>
			<TD STYLE="width:5%;">							<B>-</B>					</TD>
			<TD STYLE="width:5%; border-right: 1px solid #b8bec3" >			<B>+</B>					</TD>	
		</TR>
		<?php
		$sql1 = 'SELECT 
			position,
			designation,
			lien,
			temps,
			DAY(date) AS jour,
			MONTH(date) AS mois,
			YEAR(date) AS annee,
			DATE(date) AS date
				FROM retroplanning
			WHERE devel=1
			AND DAY(date) = '.$admin['jour_en_cours'].'
			AND MONTH(date) = '.$admin['mois_en_cours'].'
			AND YEAR(date) = '.$admin['annee_en_cours'].'
			AND attribut = \'EN COURS\'
			ORDER BY position DESC
			limit 0, 20
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($retroplanning = mysql_fetch_assoc($req1)) { ?>
		<TR class="niv3" valign=top>

				<input type="text" name="numcontact" id="numcontact" value="<?php echo $retroplanning['numcontact']  ; ?>" hidden />	
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<?php echo $retroplanning['date']  ; ?>									</TD>
			<TD><input type="submit" href="<?php echo $retroplanning['lien']  ; ?>" hidden/>
					<a href="<?php echo $retroplanning['lien']  ; ?>"><span class=green><b><?php echo $retroplanning['designation']  ; ?></span></b></a>	</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<?php echo $retroplanning['temps']  ; ?>								</TD>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>" HIDDEN />
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<button type="submit"  class=button>[Modifier]</button>							</TD>
				</form>

				<form action="getjourenplus.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>"  HIDDEN/>	
				<input type="text"  name="date" value="<?php echo strftime('%Y-%m-%d',strtotime($retroplanning['date'] .'-'.$delai.' day')); ?>"  id="date"  hidden/>

			<td>	<button type="submit" class="button">[-]</button> </td>
				</form>
				<form action="getjourenplus.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>"  HIDDEN/>	
				<input type="text"  name="date" value="<?php echo strftime('%Y-%m-%d',strtotime($retroplanning['date'] .'+'.$delai.' day')); ?>"  id="date"  hidden/>
			<td>	<button type="submit" class="button">[+]</button> </td>
				</form>

		</TR>
		<?php } //$get_retroplanning ?>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >				<B>BUGS RÉSOLUS DU JOUR</B>		</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>					</TD>
			<TD STYLE="width:70%;">							<B>Désignation</B>				</TD>
			<TD STYLE="width:10%;">							<B>Temps</B>					</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" colspan=3>	<B>Commande</B>					</TD>	
		</TR>
			<?php
			$sql2 = 'SELECT 
			position,
			designation,
			lien,
			temps,
			DAY(date) AS jour,
			MONTH(date) AS mois,
			YEAR(date) AS annee,
			DATE(date) AS date
				FROM retroplanning
			WHERE devel=1
			AND DAY(date) = '.$admin['jour_en_cours'].'
			AND MONTH(date) = '.$admin['mois_en_cours'].'
			AND YEAR(date) = '.$admin['annee_en_cours'].'
			AND attribut = \'RESOLU\'
			ORDER BY position DESC
			limit 0, 20
			';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($retroplanning = mysql_fetch_assoc($req2)) { ?>

		<TR class="niv3">
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>" hidden />	
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $retroplanning['numcontact']  ; ?>" hidden />	
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<?php echo $retroplanning['date']  ; ?>									</TD>
			<TD><input type="submit" href="<?php echo $retroplanning['lien']  ; ?>" hidden/>
					<a href="<?php echo $retroplanning['lien']  ; ?>"><span class=green><b><?php echo $retroplanning['designation']  ; ?></span></b></a>	</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<?php echo $retroplanning['temps']  ; ?>								</TD>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>" HIDDEN />
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<button type="submit"  class=button>[Modifier]</button>							</TD>
				</form>
		</TR>
		<?php } //$get_retroplanning ?>

		<tr class="niv1">
			<td align="right"><b>Total</b>
			<td><td>
			<?php
			$sql3 = 'SELECT 
			ROUND(SUM(temps),2) as tot FROM retroplanning 

			WHERE devel=1
			AND DAY(date) = '.$admin['jour_en_cours'].'
			AND MONTH(date) = '.$admin['mois_en_cours'].'
			AND YEAR(date) = '.$admin['annee_en_cours'].'
			AND attribut = \'RESOLU\'
			';
			$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
			while($tempus = mysql_fetch_assoc($req3)) { ?>
			<td align="right"><b><?php echo $tempus['tot']  ; ?> c/h</b>
		<?php } //$get_tempus ?> 
	</table>
	<?php } mysql_close(); ?> 
