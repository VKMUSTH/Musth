	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR valign=top>
			<TD><H1>Modifier statut dossier</H1>																	</TD>
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />	
				<form  action="supprimer.php"  method="post">
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden/>
				<input type="submit" value="Supprimer"   />
				</form>

			</TD>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />	
				<form  action="modifier.php"  method="post">
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden/>
				<input type="submit" value="Enregistrer"   />		

			</TD>

	</table>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class=niv1>
			<TD ALIGN=CENTER colspan=5 >	<B>STATUT DOSSIER</B>															</TD>
		</tr>
		<TR class=niv2>
			<TD STYLE="width:80%;">		<B>Titre</B>															</TD>

		</TR>
	<?php
	$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($dossiers = mysql_fetch_assoc($req1)) { ?>

		<TR>
			<TD>	<input type="text" value="<?php echo $dossiers['titre']; ?>" name="titre" id="titre"/>									</td>



		</tr>
		<?php } //$get_dossiers ?>
	</table>
				</form>
	<?php } mysql_close(); ?>
