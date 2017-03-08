	<?php require "../../../../../../header.php"; ?>
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>
		<tr valign=top  >
			<?php
			$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].'   ';
			$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
			while($titre = mysql_fetch_assoc($req1)) { ?>
			<td>
					<h1><?php echo $titre['titre']; ?> </h1>
			<?php } //$get_titre ?>
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
				</form>
				<form  action="supprimer.php"  method="post">
				<input type="submit" value="Supprimer"   />
				</form>
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				</form>
				<form action="getnumclient.php" method="post" >
		        <td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>				
				<form  action="modifier.php"  method="post">
				<input type="submit" value="Enregistrer"   />
			</td>
		</tr>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE >				<B>MODIFIER UNE REMARQUE SUR LES PRIX</B>		</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:100%; border-left: 1px solid #b8bec3;" >		<B>Libellé</B>						</TD>
		</TR>
			<?php
			$sql2 = 'SELECT * FROM remarques_prix WHERE position = '.$admin['position'].' ';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($remarque = mysql_fetch_assoc($req2)) { ?>
	        <TR ALIGN=LEFT>
				<input type="text" value="<?php echo $admin['position']; ?>" name="position" id="position" HIDDEN />			</TD>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		
					<input type="text" value="<?php echo $remarque['remarque']; ?>" name="remarque" id="remarque"  />	
		</TR>
			<?php } //$get_remarque ?>
		</form>
	</table>
	<?php } mysql_close(); ?>
