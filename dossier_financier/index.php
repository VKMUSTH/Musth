	<?php require '../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
		<?php
		$sql1 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].'  ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($client = mysql_fetch_assoc($req1)) { ?>	
			<td><h1><?php echo $client['numclient']; ?></h1>															</td>
		<?php } //$get_client ?>

				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
			<input type="button"  onclick="location.href='extrait'" value="Extrait" />
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
		</tr>	
	</table>
		<?php $niv = ''; include($niv.'previsions/index2.php');?> <br>
		<?php $niv = ''; include($niv.'tresorerie/index2.php');?>	
		<?php $niv = ''; include($niv.'decompte/index.php');?>
		<?php $niv = ''; include($niv.'convertisseur/admin.php');?>
	<?php } mysql_close(); ?>
