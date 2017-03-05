<?php include "../../header.php"; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top>
			<td>	<h1>Planning opérations</h1>																	</td>
			<td class=inputnum><label><a href="">Date</a></label><input type="text" name="" value="<?php echo strftime('%d-%m-%Y',strtotime($admin['date_en_cours'])); ?>" id="" />		
			</td>

				<form action="getjourencours.php" method="post" >
			<td class=inputnum><label><a href="jour">Jour</a></label><input type="text" name="jour_en_cours" value="<?php echo $admin['jour_en_cours']  ; ?>" id="jour_en_cours" />
				</form>

			</td>
				<form action="getmoisencours.php" method="post" >
			<td class=inputnum><label><a href="">Mois</a></label><input type="text" name="mois_en_cours" value="<?php echo $admin['mois_en_cours']  ; ?>" id="mois_en_cours" />
				</form>

			</td>
				<form action="getanneeencours.php" method="post" >
			<td class=inputnum><label><a href="">Année<a></label><input type="text"  name="annee_en_cours" id="annee_en_cours" value="<?php echo $admin['annee_en_cours']  ; ?>"	 />
				</form>

			</td>
		</tr>
	</table>	
	<?php// if (isset(
	//$admin['jour_en_cours'],
	//$admin['mois_en_cours'],
	//$admin['annee_en_cours']
	//) ) {?>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=3 ALIGN=CENTER VALIGN=MIDDLE >				<B>PLANNING DES OPÉRATIONS DU JOUR</B>		</TD>
			<TD>	<input type="button" onclick="location.href='nouveau'" value="Nouveau" />					</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>					</TD>
			<TD STYLE="width:70%;">							<B>Désignation</B>				</TD>
			<TD STYLE="width:10%;">							<B>Temps</B>					</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" colspan=3>	<B>Commande</B>					</TD>	
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
			AND categorie = \'OPÉRATIONS\'
			ORDER BY position DESC
			limit 0, 20
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($retroplanning = mysql_fetch_assoc($req1)) { ?>
		<TR class="niv3">
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>" hidden />	
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $retroplanning['numcontact']  ; ?>" hidden />	
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<?php echo $retroplanning['date']  ; ?>									</TD>
			<TD><input type="submit" href="<?php echo $retroplanning['lien']  ; ?>" hidden/>
					<a href="<?php echo $retroplanning['lien']  ; ?>"><span class=green><b><?php echo $retroplanning['designation']  ; ?></span></b></a>	</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<?php echo $retroplanning['temps']  ; ?>								</TD>
				<form name="modifier" action="modifier_devel.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>" HIDDEN />
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $retroplanning['numcontact']  ; ?>" hidden />		
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<button type="submit"  class=button>[Modifier]</button>							</TD>
				</form>
		</TR>
		<?php } //$get_retroplanning ?>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >				<B>OPÉRATIONS RÉSOLUE DU JOUR</B>		</TD>
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
			AND categorie = \'OPÉRATIONS\'
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
				<form name="modifier" action="modifier_devel.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>" HIDDEN />
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $retroplanning['numcontact']  ; ?>" hidden />		
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<button type="submit"  class=button>[Modifier]</button>							</TD>
				</form>
		</TR>
		<?php } //$get_retroplanning ?>
	</table>
<?php // } ?>
<?php } mysql_close(); ?> 
