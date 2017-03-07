	<?php include "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Nouvel enregistrement</h1>		
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				<form action="getjourencours.php" method="post" >
			<td class=inputnum><label><a href="">Jour</a></label><input type="text" name="jour_en_cours" value="<?php echo $admin['jour_en_cours']  ; ?>" id="jour_en_cours" />
				</form>
				<form action="getmoisencours.php" method="post" >
			<td class=inputnum><label><a href="">Mois</a></label><input type="text" name="mois_en_cours" value="<?php echo $admin['mois_en_cours']  ; ?>" id="mois_en_cours" />
				</form>
				<form action="getanneeencours.php" method="post" >
			<td class=inputnum><label><a href="">Année<a></label><input type="text"  name="annee_en_cours" id="annee_en_cours" value="<?php echo $admin['annee_en_cours']  ; ?>"	 />
				</form>
				<form  action="ajouter.php"  method="post">
				<input type="text" value="<?php echo $admin['numclient']  ; ?>" name="numclient" id="numclient" HIDDEN/>
				<input type="text" value="1" name="numproduit" id="numproduit" HIDDEN/>
				<input type="text" value="1" name="numdossier" id="numdossier" HIDDEN/>
				<input type="submit" value="Enregistrer"   />
	</table>
	<table border=0 cellpadding=0 cellspacing=0>
		<tr class="niv1">
			<td>	<b>Date</b>																			</td>	
			<td>	<b>Prog</b>																			</td>	
		<tr class="niv2">
			<td>	<input type="text" value="<?php echo $admin['annee_en_cours']  ; ?>-<?php echo $admin['mois_en_cours']  ; ?>-<?php echo $admin['jour_en_cours']  ; ?>" name="syn_date" id="syn_date"/>													</td>
			<td>	<input type="text" value="" name="programme" id="programme"/>													</td>
		<tr class="niv2">
			<td colspan=2><b>Detailprog</b></td>	
		<tr class="niv3">
			<td colspan=2><textarea type="text" cols=105 rows=5 type="text"  name="detailprog" id="detailprog"></textarea></td>
				</form>
	</table>
	<?php } mysql_close(); ?> 
