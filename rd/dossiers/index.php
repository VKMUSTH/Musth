	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=6><h1>Dossiers</h1>																		</TD>	
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text"  name="numproduit" value="<?php echo $admin['numproduit']  ; ?>"  id="numproduit" />
				<form name="gotomain" action="goto_main.php" method="post" >
			<button type="submit" class="button">[Main]</button>
				</form>
			</TD>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text"  name="numdossier" value="<?php echo $admin['numdossier']  ; ?>"  id="numdossier" />
				<input type="button" onclick="location.href='nouveau'" value="Nouveau" />
			</TD>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text"  name="numclient" value="<?php echo $admin['numclient']  ; ?>"  id="numclient" />

			</TD>

		</TR>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr>
			<td class=inputnum>	<input type="button" onclick="location.href='../programme'" value="PROGRAMME" />								</td>
			<td class=inputnum>	<input type="button" onclick="location.href='../descriptif'" value="DESCRIPTIF" />								</td>
			<td class=inputnum>	<input type="button" onclick="location.href='../video'" value="VIDEO" />									</td>

		</tr>
			
	</table>	
	<br>	
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE >		<B>R&D</B>													</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;" >						<B>Numdossier</B>										</TD>
			<TD STYLE="width:80%;">							<B>Produit</B>											</TD>
			<TD STYLE="width:10%;">							<B>Commande</B>											</TD>

		</TR>
		<?php
		$sql1 = 'SELECT * FROM dossiers WHERE numproduit = '.$admin['numproduit'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($produit = mysql_fetch_assoc($req1)) { ?>
				<form name="goto" action="goto_clients.php" method="post" >
				<input type="text" name="numdossier" id="numdossier" value="<?php echo $produit['numdossier']  ; ?>" hidden/>
				<input type="text" name="numclient" id="numclient" value="<?php echo $produit['numclient']  ; ?>" hidden/>
		<TR class="niv3" ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3" ><button type="submit" class="button"><?php echo $produit['numdossier']  ; ?></button>	</TD>
				</form>
				<form name="modifier" action="modifier.php"  method="post">
				<input type="text" name="numdossier" id="numdossier" value="<?php echo $produit['numdossier']  ; ?>" hidden/>

			<TD STYLE="border-right: 1px solid #b8bec3; " >	<?php echo $produit['titre']  ; ?>	</TD>

					</form>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="numdossier" id="numdossier" value="<?php echo $produit['numdossier']  ; ?>" hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" ><button type="submit" class="button">[Modifier]</button></TD>
				</form>
		</TR>
		<TR>
			<TD colspan="4">		<div id="filet"></div>			</TD>
		</TR>
		<?php } //$get_produit ?>
	</table>
	<?php } mysql_close(); ?>
