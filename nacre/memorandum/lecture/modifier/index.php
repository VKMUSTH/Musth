	<?php require '../../../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>

	<?php
	$sql1 = 'SELECT * FROM annexes WHERE position = '.$admin['position'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($annexe = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<tr>
			<td><h1>Modifier</h1>	
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum valign="top"><label><a>N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
				</form>
				<form name="supprimer" action="supprimer.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $retroplanning['position']  ; ?>" HIDDEN />	
			<button type="submit" class="button">[Supprimer]</button>								</TD>
				</form>
	</table>		
				<form action="getposition.php" method="post" >
				<input type="text" name="position" value="<?php echo $admin['position']  ; ?>" id="position" hidden/>
				</form>
				<form  action="modifier.php"  method="post">
				<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" hidden/>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1"><TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >		<B>MODIFIER ANNEXE</B>			</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:45%; border-left: 1px solid #b8bec3; " >		<B>Désignation</B>					</TD>
			<TD STYLE="width:45%;">							<B>Lien</B>					</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" colspan=3>	<B>Commande</B>					</TD>		
		</TR>
		<TR>

			<td><input type="text" name="titre" id="titre" value="<?php echo $annexe['titre']; ?>"  />	</TD>
			<td><input type="text" name="lien" id="lien" value="<?php echo $annexe['lien']; ?>"  />				</TD>
			<td><input type="submit" value="Envoyer"   />										</TD>
				</form>
	</table>
	<?php } //$get_retroplanning ?>
	<?php } mysql_close(); ?>
