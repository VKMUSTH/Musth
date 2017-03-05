<?php require '../header.php'; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=6><h1>R&D</h1>																		</TD>	
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text"  name="numproduit" value="<?php echo $admin['numproduit']  ; ?>"  id="numproduit" />
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text"  name="numdossier" value="<?php echo $admin['numdossier']  ; ?>"  id="numdossier" />
				<input type="button" onclick="location.href='nouveau'" value="Nouveau" />
			</TD>
		</TR>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE >		<B>R&D</B>													</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;" >						<B>Numproduit</B>										</TD>
			<TD STYLE="width:20%;">							<B>Afficher Masquer</B>										</TD>
			<TD STYLE="width:60%;">							<B>Produit</B>											</TD>
			<TD STYLE="width:10%;">							<B>Commande</B>											</TD>
		</TR>
		<?php
		$sql1 = 'SELECT * FROM produits ORDER BY afficher_masquer ASC ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($produit = mysql_fetch_assoc($req1)) { ?>
				<form name="gotodossiers" action="goto_dossiers.php" method="post" >
				<input type="text" name="numproduit" id="numproduit" value="<?php echo $produit['numproduit']  ; ?>" hidden/>
				<input type="text" name="numclient" id="numclient" value="" hidden/>
		<TR class="niv3" ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3" ><button type="submit" class="button"><?php echo $produit['numproduit']  ; ?></button>	</TD>
				</form>
				<form name="modifier" action="modifier.php"  method="post">
				<input type="text" name="numproduit" id="numproduit" value="<?php echo $produit['numproduit']  ; ?>" hidden/>
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<?php echo $produit['afficher_masquer']  ; ?>	</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<?php echo $produit['produit']  ; ?>	</TD>

					</form>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="numproduit" id="numproduit" value="<?php echo $produit['numproduit']  ; ?>" hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" ><button type="submit" class="button">[Modifier]</button></TD>
				</form>
		</TR>
		<TR>
			<TD colspan="4">		<div id="filet"></div>			</TD>
		</TR>
		<?php } //$get_produit ?>
	</table>
<?php } mysql_close(); ?>
