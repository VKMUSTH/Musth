	<?php require "../../../../../../header.php"; ?>
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
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
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				</form>
				<form action="getnumclient.php" method="post" >
		        <td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
			<form  action="enregistrer.php"  method="post">
			<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier"  hidden/>
			<input type="text" name="attribut" value="non compris" id="attribut"  hidden/>
			<input type="submit" value="Envoyer"   />
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >				<B>AJOUTER UNE REMARQUE SUR LES PRIX</B>			</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:100%; border-left: 1px solid #b8bec3; " >		<B>Libellé</B>							</TD>
        	<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >		
				<input type="text" name="remarque" id="remarque"  />										</TD>
				</form>
	</table>
	<?php } mysql_close(); ?>
