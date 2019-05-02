	<?php require "../../header.php"; ?>
	<?php
	$sql = "SELECT * FROM admin WHERE id = 1";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); while($admin = mysql_fetch_assoc($req)) {?>
	<table 		name="topnav" border=0 cellpadding=0 cellspacing=0 >

		<TR 	name="menu" valign=top  >
			<td>	<h1>Falcoon</h1>											</td>
					<form action="get_mois.php" method="post" >
			<td class=inputnum><label><a href="">Mois</a></label><input type="text" name="mois_en_cours" value="<?php echo $admin['mois_en_cours']  ; ?>" id="mois_en_cours" />
					</form>
				<table 		name="bout" border=0 cellpadding=0 cellspacing=0 >
					<TR 	name="menu" valign=top  >
						<td>
							<form action="get_mois_inf_sup.php" method="post" >
							<input type="text"  name="annee_en_cours" value="<?php echo $admin['annee_en_cours']-1  ; ?>"  id="annee_en_cours" hidden />
							<button type="submit" class="button">[-]</button> 
							</form>
						</td>
						<td>
							<form action="get_mois_inf_sup.php" method="post" >
							<input type="text"  name="annee_en_cours" value="<?php echo $admin['annee_en_cours']+1 ; ?>"  id="annee_en_cours" hidden />
							<button type="submit" class="button">[+]</button> 
							</form>
						</td>
					</tr>
				</table>

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
	</BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >

			<td class=inputnum class=display>
				<input type="button" class="button" onclick="location.href='bitcoinwings'" value="BITCOIN WINGS" />
			</td>

			<td class=inputnum class=display >
				<input type="button" class="button" onclick="location.href='eurowings'" value="EURO WINGS" />
			</td>
			<td class=inputnum class=display>
				<input type="button" class="button" onclick="location.href='graph1'" value="GRAPH 1" />
			</td>

			<td class=inputnum class=display >
				<input type="button" class="button" onclick="location.href='graph2'" value="GRAPH 2" />
			</td>
			<td class=inputnum class=display>
				<input type="button" class="button" onclick="location.href='graph3'" value="GRAPH 3" />
			</td>
		</TR>
	</table>

	<table 		name="calendrier"			border=0 cellpadding=0 cellspacing=0 >
		<tr 	name="titre_calendrier" 	class="niv1">
			<TD COLSPAN=12 ALIGN=CENTER VALIGN=MIDDLE>	<B>FALCOON</B>						</TD>
		</tr>
		<tr 	name="mois_calendrier" 		class="niv2">
			<td STYLE="width:10%;" >				<b>DATE DÉBUT</b>				</TD>
			<td STYLE="width:10%;" >				<b>DATE FIN</b>					</TD>
			<td STYLE="width:10%;" >				<b>DUREE</b>				</TD>
			<td STYLE="width:10%;" >				<b>JOUR RESTANTS</b>				</TD>
			<td STYLE="width:20%;">					<b>DESIGNATION</b>				</TD>
			<td STYLE="width:15%;" >				<b>ACHAT + FRAIS</b>				</TD>
			<td STYLE="width:10%;" >				<b>QUANTITE</b>					</TD>
			<td STYLE="width:10%;" >				<b>A VENIR</b>					</TD>
			<td STYLE="width:10%;" >				<b>GAIN</b>					</TD>
			<td STYLE="width:15%;" >				<b>REVENU JOURN</b>					</TD>

		</tr>


			<?php
			$sql = "SELECT	DAY(date) AS jour, MONTH(date) AS mois, YEAR(date) AS annee, DATE(date) AS date_debut, DATE(date_fin) AS date_fi, designation, prix,quantite,ca,gain, revenu_journalier FROM falcoon WHERE YEAR(date) = '".$admin['annee_en_cours']."' ORDER BY date ASC ";
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); while($janvier = mysql_fetch_assoc($req)) {?>				

<?php
// Solution 1
$datej = new DateTime("2019-05-02");
$date1 = new DateTime($janvier['date_debut']);
$date2 = new DateTime($janvier['date_fi']);
$diff = $date2->diff($date1)->format("%a");
$pourcentage = $date2->diff($datej)->format("%a");

?>

				<tr CLASS=niv3>
					<td valign=top style="text-align:left;font-weight : bold;"><?php echo $janvier['date_debut']; ?> </td>
					<td valign=top style="text-align:left;font-weight : bold;"><?php echo $janvier['date_fi']; ?> </td>
					<td><?php echo $diff; ?></td>
					<td><?php echo $pourcentage; ?></td>
					<td><?php echo $janvier['designation']; ?></td>
					<td><?php echo $janvier['prix']; ?></td>
					<td><?php echo $janvier['quantite']; ?></td>
					<td><?php echo $janvier['ca']; ?></td>
					<td><?php echo $janvier['gain']; ?></td>
					<td><?php echo $janvier['revenu_journalier']; ?></td>

				</tr>
				<TR 	name="footer_calendrier"				>
					<td colspan=12>		<div id="filet"></div>									</td>
				</TR>

			<?php }  ?>
			</td>
		</tr>
		<TR 	name="footer_calendrier"				>
			<td colspan=12>		<div id="filet"></div>									</td>
		</TR>		
		<tr		name="end" 					class="niv2">
			<td colspan=12 style="font-weight : bold;"></td>
		</tr>
	</table>

	<?php }  ?>
