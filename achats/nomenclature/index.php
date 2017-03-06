	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
		<?php
		$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].'  ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($dossier = mysql_fetch_assoc($req1)) { ?>
			<td>	<h1><?php echo $dossier['titre']; ?></h1>															</td>
		<?php } //$get_dossier ?>
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />	</td>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" /> 	</td>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		</td>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR CLASS="niv1">
			<TD STYLE="width:90%;" COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE><B>NOMENCLATURE</B>									</TD>
			<TD STYLE="width:10%;"  ALIGN=CENTER VALIGN=MIDDLE><input type="button" onclick="location.href='ajouter'" value="Ajouter" />			</TD>
		</TR>
		<tr class="niv2" align=left>
			<td STYLE="width:5%;">			<b>Item</b>												</TD>
			<td STYLE="width:50%;">			<b>Désignation</b>											</TD>
			<td STYLE="width:8%;" >			<b>Coût unit hors cf</b>										</TD>
			<td STYLE="width:8%;" >			<b>Tx Mq</b>											</TD>
			<td STYLE="width:7%;" >			<b>Marge un</b>											</TD>

			<td STYLE="width:8%;" >			<b>PDV un</b>												</TD>

			<td STYLE="width:10%;" >		<b>Commande</b>												</TD>
		</tr>
		<?php // Récupération des items
		$sql3 = 'SELECT 
			numproduit,
			numdossier,
			numitem,
			designation,
			quantite,
			taux_marque,
			valeur
				FROM items 
			WHERE numproduit = ' . $admin['numproduit'].'
			AND numdossier = ' . $admin['numdossier'].' 
			';
			$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
			while($ite = mysql_fetch_assoc($req3)) { ?>
		<?php

		//	$fCoutUnitGeneral = 0;

		//	foreach($items as $ite)
		//	{
		//		$fCoutUnit = 0;

		//				 $fCoutUnit += $ite['valeur'];	
		?>
		<tr class="niv3" align=left>
				<form action="goto_pieces.php" method="post" >
			<td STYLE="border-left: 1px solid #b8bec3;">
				<input type="text" name="numitem" id="numitem" value="<?php echo $ite['numitem']  ; ?>" hidden  />	
				<button type="submit" class="button"><?php echo $ite['numitem']; ?></button>
			</td>
				</form>
			<td STYLE="border-left: 1px solid #b8bec3;">	<a><?php echo $ite['designation']; ?></a> 						</td>

			<td STYLE="border-left: 1px solid #b8bec3;"><?php echo $ite['valeur']; ?>										</td>
			<td STYLE="border-left: 1px solid #b8bec3;"><?php echo $ite['taux_marque']; ?> 									</td>
			<td STYLE="border-left: 1px solid #b8bec3;"> €												</td>
			<td class="display" STYLE="border-left: 1px solid #b8bec3;">	
				<form name="modifier" action="modifier.php"  method="post">
				<input type="text" name="numitem" value="<?php echo $ite['numitem']  ; ?>" id="numitem" hidden />	
			<td STYLE="border-left: 1px solid #b8bec3;border-right: 1px solid #b8bec3;" ><button type="submit" class="button">Modifier</button>					</td>
				</form>
		</tr>
		<TR>
			<td colspan=9>		<div id="filet"></div>													</td>
		</TR>		
			<?php
			//$fCoutUnitGeneral += $fCoutUnit;	
			//}
			?>
		<?php } //$get_items ?>
		<tr class="niv1">
			<td colspan=2 style="font-weight : bold;">TOTAL :												</td>
			<td></td>
			<td style="text-align:right;font-weight : bold;"><?php// echo number_format ( $fCoutUnitGeneral, 2, ",", " " ); ?> €				</td>
		</tr>

	</table>
	<?php } mysql_close(); ?>
