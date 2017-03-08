	<?php include "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>

	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
			<td>	<h1>Chiffres clés</h1></TD>
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
		</tr>
	</table>
cout d'acquisition client
	<br>
			<?php $niv = ''; include($niv.'calendrier/admin.php');?>
			<?php $niv = ''; include($niv.'chiffres_cles/admin.php');?>
			<?php $niv = ''; include($niv.'revenus_journaliers/admin.php');?>
			<?php $niv = ''; include($niv.'hypotheses/admin.php');?>
			<?php $niv = ''; include($niv.'resultat_minimum/admin.php');?>
			<?php $niv = ''; include($niv.'sr/admin.php');?>
			<?php $niv = ''; include($niv.'marge_brute/admin.php');?>
	<?php } mysql_close(); ?> 
