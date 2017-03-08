	<?php try {$bdd = new PDO('mysql:host=localhost;dbname=Musth', 'root', '020061647');} catch(Exception $e) {die('Erreur : '.$e->getMessage());}?>
	<?$get_admin = $bdd->query('SELECT * FROM admin WHERE id =\'1\'');
	while ($admin = $get_admin->fetch()){?>
		<?php if (isset($admin['position']) ) {
		$get_courrier = $bdd->prepare('SELECT * FROM retroplanning WHERE position = ? ');
		$get_courrier->execute(array($admin['position']));
		while ($courrier = $get_courrier->fetch()){?>
				<form action="getnumproduit.php" method="post" >
	<table border=0 cellpadding=0 cellspacing=0  >
		<tr>
			<td><h1>Modifier objectif de développement</h1>	
			<td class=inputnum valign="top"><label>N° Dossier</label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				</form>
				<form name="supprimer" action="supprimer.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $courrier['position']  ; ?>" HIDDEN />	
				<button type="button" >[Supprimer]</button>				
				</form>
			</TD>
				<form action="getposition.php" method="post" >
				<input type="text" name="position" value="<?php echo $position['position']  ; ?>" id="position" hidden/>
				</form>
	</table>
				<form  action="modifier.php"  method="post">
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden/>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >		<B>MODIFIER ÉVÈNEMENT</B>				</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>				</TD>
			<TD STYLE="width:80%;">							<B>Désignation</B>			</TD>
			<TD STYLE="width:10%;">							<B>Lien</B>				</TD>
			<TD STYLE="width:10%;">							<B>Temps</B>				</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" colspan=3>	<B>Commande</B>				</TD>	
		</TR>
		<tr>
			<td><input type="text" name="date" id="date"  value="<?php echo $courrier['date']; ?>" />
			<td><input type="text" name="designation" id="designation" value="<?php echo $courrier['designation']; ?>"  />
			<td><input type="text" name="lien" id="lien" value="<?php echo $courrier['lien']; ?>"  />
			<td><input type="text" name="temps" id="temps" value="<?php echo $courrier['temps']; ?>"  />
			<td><input type="submit" value="Envoyer"   />
	</table>
				</form>
		<? }$get_courrier->closeCursor(); } else {} ?>
	<?}$get_admin->closeCursor(); ?>
