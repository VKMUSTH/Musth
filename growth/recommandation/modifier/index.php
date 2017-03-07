	<?php try {$bdd = new PDO('mysql:host=localhost;dbname=Musth', 'root', '020061647');} catch(Exception $e) {die('Erreur : '.$e->getMessage());}
	$get_admin = $bdd->query('SELECT * FROM admin WHERE id =\'1\'');
	while ($admin = $get_admin->fetch()){?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr>
			<td><h1>Modifier Actualité</h1>
				<form action="getposition.php" method="post" >
			<td class=inputnum><label>N° Position</label><input type="text"  name="position" value="<?php echo $admin['position']  ; ?>"  id="position" />
				</form>
				<form  action="supprimer.php"  method="post">
				<input type="submit" value="Supprimer"   />
				</form>
	</table>
				<? if (isset($admin['position']) ) {
 					$get_actualite = $bdd->prepare('SELECT * FROM actualites WHERE id = ? ORDER BY id DESC');
					$get_actualite->execute(array($admin['position']));
					while ($actualite = $get_actualite->fetch()){?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >	<B>MODIFIER ACTUALITÉ</B>									</TD>		
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;" >			<B>Date</B>											</TD>
			<TD STYLE="width:40%;" >			<B>Lien</B>											</TD>
			<TD STYLE="width:40%;" >			<B>Titre</B>											</TD>
			<TD STYLE="width:10%;" >			<B>Commande</B>											</TD>	
		</TR>
				<form  action="modifier.php"  method="post">
				<input type="text" value="<?php echo $admin['position']  ; ?>" name="position" id="position" HIDDEN/>
		<tr>
			<TD>						<input type="text" name="date"	id="date" value="<?php echo $actualite['date']; ?>" />		</TD>		
			<TD>						<input type="text" name="lien"	id="lien" value="<?php echo $actualite['lien']; ?>" />		</TD>
			<TD>						<input type="text" name="titre" id="titre" value="<?php echo $actualite['titre']; ?>" />	</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<button type="submit" class="button" >ENVOYER</button>						</TD>	
		</TR>
				</form>
	</table>
		<? }$get_actualite->closeCursor(); } else {} ?>
	<?}$get_admin->closeCursor(); ?>
