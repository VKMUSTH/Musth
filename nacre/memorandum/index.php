	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=7>		<h1>Memorandum</h1>																</td>
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
			<td class="inputnum">	<input type="button" onclick="location.href='nouveau'" value="Nouveau" />									</td>
			<td class="inputnum">	<input type="button" onclick="location.href='entete'" value="papier entête" />									</td>
		</tr>
	</table>
	<?php include($niv.'../../calendrier.php');?>
<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >				<B>MÉMORANDUMS RÉCENTS</B>									</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>											</TD>
			<TD STYLE="width:20%;">							<B>Destinataire</B>										</TD>
			<TD STYLE="width:60%;">							<B>Objet</B>											</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" colspan=3>	<B>Commande</B>											</TD>
		</TR>
				<?php
				$sql1 = 'SELECT 
					position,
					numcontact,
					objet,
					DAY(date) AS jour,
					MONTH(date) AS mois,
					YEAR(date) AS annee,
					DATE(date) AS date
						FROM courrier
					WHERE MONTH(date) = '.$admin['mois_en_cours'].'
					AND YEAR(date) = '.$admin['annee_en_cours'].'
					AND memorandum = \'1\'
					ORDER BY position DESC 
					limit 0, 10 
					';
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
				while($courrier = mysql_fetch_assoc($req1)) { ?>
		<TR class="niv3">
				<form name="visualiser" action="lecture.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $courrier['position']  ; ?>" hidden />	
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $courrier['numcontact']  ; ?>" hidden />	
			<TD STYLE="border-left: 1px solid #b8bec3"  ><?php echo $courrier['date']  ; ?>												</TD>
				<?php if (isset($courrier['numcontact']) ) { ?>	
				<?php
				$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$courrier['numcontact'].'';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($destinataire = mysql_fetch_assoc($req2)) { ?>
			<TD><?php echo $destinataire['nom_firme']  ; ?>																</TD>
				<?php } //$get_destinataire ?>
				<?php } //isset_destinataire ?>
			<TD>							<button type="submit" class=button><?php echo $courrier['objet']  ; ?></button>					</TD>
				</form>			
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $courrier['position']  ; ?>" HIDDEN />
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $courrier['numcontact']  ; ?>" hidden />		
			<TD STYLE="border-right: 1px solid #b8bec3; " >									
				<button type="submit" class=button>[Modifier]</button>														</TD>
				</form>
		</TR>
		<?php } //$get_courrier ?>
	</table>
	<?php } mysql_close(); ?>
