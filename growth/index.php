	<?php require '../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
			<td>	<h1>Growth</h1>
			<td class=inputnum><label><a href="">N° Cohorte</a></label><input type="text" name="numcohorte" value="" id="numcohorte" />
				<form action="goto_photos.php" method="post" >
				<button type="submit" class="button">[Photos]</button>	
				</form>
			</td>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="../clients">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
			</td>
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
	<?php $niv = ''; include($niv.'calendrier/index.php');?>
	<?php $niv = ''; include($niv.'strategie/index.php');?>		<br>
	<?php } mysql_close(); ?>
