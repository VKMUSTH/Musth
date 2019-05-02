	<?php require "../../../header.php"; ?>
	<?php
	$sql = "SELECT * FROM admin WHERE id = 1";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); while($admin = mysql_fetch_assoc($req)) {?>
	<table 		name="topnav" border=0 cellpadding=0 cellspacing=0 >

		<TR 	name="menu" valign=top  >
			<td>	<h1>Euro wings</h1>					</td>
					<form action="get_mois.php" method="post" >
			<td class=inputnum><label><a href="">Mois</a></label><input type="text" name="mois_en_cours" value="<?php echo $admin['mois_en_cours']  ; ?>" id="mois_en_cours" />
					</form>
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
				<input type="button" class="button" onclick="location.href='../bitcoinwings'" value="BITCOIN WINGS" />
			</td>

			<td class=inputnum class=display >
				<input type="button" class="button" onclick="location.href='../eurowings'" value="EURO WINGS" />
			</td>
			<td class=inputnum class=display>
				<input type="button" class="button" onclick="location.href='../../falcoon'" value="FALCOON" />
			</td>
		</TR>
	</table>

	<table 		name="calendrier"			border=0 cellpadding=0 cellspacing=0 >
		<tr 	name="titre_calendrier" 	class="niv1">
			<TD COLSPAN=12 ALIGN=CENTER VALIGN=MIDDLE>	<B>EUROWING</B></TD>
		</tr>
		<tr 	name="mois_calendrier" 		class="niv2">
			<td STYLE="width:20%;">			<b>DESIGNATION</b></TD>
			<td STYLE="width:15%;" >		<b>ACHAT + FRAIS</b></TD>
			<td STYLE="width:8%;" >			<b>QUANTITE</b>	</TD>
			<td STYLE="width:8%;" >			<b>A VENIR</b>	</TD>
			<td STYLE="width:8%;" >			<b>GAIN</b>	</TD>
			<td STYLE="width:8%;" >			<b>REVENU JOURNALIER</b></TD>
			<td STYLE="width:8%;" >			<b>RESTE</b>	</TD>

			<td STYLE="width:8%;" >			<b>SEP</b>	</TD>
			<td STYLE="width:8%;" >			<b>DEC</b>	</TD>
		</tr>


			<?php
			$sql = "SELECT	DAY(date) AS jour, MONTH(date) AS mois, YEAR(date) AS annee, DATE(date) AS date_jui, designation, prix,quantite,ca,gain, revenu_journalier,reste FROM falcoon WHERE MONTH(date) = \"01\" AND YEAR(date) = '".$admin['annee_en_cours']."' AND designation= \"EUROWING\"
 ORDER BY date ASC ";
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); while($janvier = mysql_fetch_assoc($req)) {?>				

				<tr>
					<td valign=top style="text-align:left;font-weight : bold;"><?php echo $janvier['jour']; ?> | <?php echo $janvier['designation']; ?></td>

					<td><?php echo $janvier['prix']; ?></td>
					<td><?php echo $janvier['quantite']; ?></td>
					<td><?php echo $janvier['ca']; ?></td>
					<td><?php echo $janvier['gain']; ?></td>
					<td><?php echo $janvier['revenu_journalier']; ?></td>
					<td><?php echo $janvier['reste']; ?></td>

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
