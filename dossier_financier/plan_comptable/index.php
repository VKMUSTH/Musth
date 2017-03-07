	<?php require "../../header.php"; ?>
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top>	
			<td>	<h1>Plan comptable</h1>																		</td>
				<form action="getjourencours.php" method="post" >
			<td class=inputnum><label><a href="jour">Jour</a></label><input type="text" name="jour_en_cours" value="<?php echo $admin['jour_en_cours']  ; ?>" id="jour_en_cours" />
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
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a href="produit">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />	</td>
				</form>
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a href="dossier">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />	</td>
				</form>
				<form action="getnumitem.php" method="post" >
			<td class=inputnum><label><a href="">N° Item</a></label><input type="text" name="numitem" value="<?php echo $admin['numitem']  ; ?>" id="numitem" />	
				<input type="button" onclick="location.href='differer'" value="Différer" />
			</td>
				</form>
		</tr>
	</table>
	<br>
 <body onload="document.getElementById('inscription').focus()"> 
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
		<?php
		$sql1 = 'SELECT * FROM dossiers WHERE numproduit = \'1\' AND numdossier= '.$admin['numdossier'].'';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($categorie = mysql_fetch_assoc($req1)) { ?>
			<TD class="display" COLSPAN=10 ALIGN=CENTER VALIGN=MIDDLE >		<B>NOUVELLE INSCRIPTION POUR : <?php echo $categorie['titre']  ; ?> </B>			</TD>	
		<?php } //$get_categorie ?>
		</TR>
		<TR class="niv2">
		<?php
		$date = date("Y-m-d");
		list($year, $month, $day) = split('[/.-]', $date);
		?>

			<TD class="display" STYLE="width:10%;" >		<B>Date</B>													</TD>
			<TD class="display" STYLE="width:60%;" >		<B>Désignation</B>												</TD>
			<TD class="display" STYLE="width:10%; " >		<B>Débit</B>													</TD>	
			<TD class="display" STYLE="width:10%;" >		<B>Crédit</B>													</TD>
			<TD class="display" STYLE="width:10%; " >		<B>Commande</B>													</TD>	
		</TR>
				<form  action="insert_inscription.php"  method="post">
				<input type="text" name="numproduit" id="numproduit" value="<?php echo $admin['numproduit']  ; ?>" hidden/>
				<input type="text" name="numdossier" id="numdossier" value="<?php echo $admin['numdossier']  ; ?>" hidden/>
				<input type="text" name="numitem" id="numitem" value="<?php echo $admin['numitem']  ; ?>" hidden/>
				<input type="text" name="compte" id="compte" value="plan-comptable" hidden/>
				<input type="text" name="numclient" id="numclient" value="1" hidden/>
				<input type="text" name="etat" id="etat" value="prevision" hidden/>
				<input type="text" name="lj_date" id="lj_date" value="<?php echo $admin['annee_en_cours']  ; ?>-<?php echo $admin['mois_en_cours']  ; ?>-<?php echo $admin['jour_en_cours']  ; ?><?php //echo $date  ; ?>" hidden/>
		<TR ALIGN=LEFT>
			<TD class="display">		<input type="text" name="" id="" value="<?php echo $admin['annee_en_cours']  ; ?>-<?php echo $admin['mois_en_cours']  ; ?>-<?php echo $admin['jour_en_cours']  ; ?><?php //echo $date  ; ?>"/>									</TD>
			<TD class="display">		<input type="text" name="inscription" id="inscription"/>										</TD>
			<TD class="display">		<input type="text" name="debit" id="debit"  />												</TD>
			<TD class="display">		<input type="text" name="credit" id="credit"  />											</TD>
			<TD class="display">		<button type="submit" class="envoyer" >ENVOYER</button>											</TD>	
		</TR>
				</form>
	</table>
</body>
	<BR>

	<?php } mysql_close(); ?>
