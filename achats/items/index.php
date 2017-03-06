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
			<TD STYLE="width:90%;" COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE><B>ITEMS</B>									</TD>
			<TD STYLE="width:10%;"  ALIGN=CENTER VALIGN=MIDDLE><input type="button" onclick="location.href='ajouter'" value="Ajouter" />			</TD>
		</TR>
		<tr class="niv2" align=left>
			<td STYLE="width:5%;">			<b>Item</b>												</TD>
			<td STYLE="width:32%;">			<b>Désignation</b>											</TD>
			<td STYLE="width:4%;" >			<b>Qt</b>												</TD>
			<td STYLE="width:7%;" >			<b>Valeur</b>												</TD>
			<td STYLE="width:5%;" >			<b>Tx Mq. moy</b>											</TD>
			<td STYLE="width:7%;" >			<b>Marge un moy</b>											</TD>
			<td STYLE="width:7%;" >			<b>Marge tot</b>											</TD>
			<td STYLE="width:8%;" >			<b>PDV un</b>												</TD>
			<td STYLE="width:8%;" >			<b>PDV tot</b>												</TD>
			<td STYLE="width:10%;" >		<b>Commande</b>												</TD>
		</tr>
		<?php // Récupération des items
		$sql3 = 'SELECT 
			numproduit,
			numdossier,
			numitem,
			designation,
			quantite,
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
				<form action="goto_cotation.php" method="post" >
			<td STYLE="border-left: 1px solid #b8bec3;">
				<input type="text" name="numitem" id="numitem" value="<?php echo $ite['numitem']  ; ?>" hidden  />	
				<button type="submit" class="button"><?php echo $ite['numitem']; ?></button>
			</td>
				</form>
			<td colspan=1 STYLE="border-left: 1px solid #b8bec3;">	<a><?php echo $ite['designation']; ?></a> 						</td>
			<td style="text-align:right;" align=left><?php echo $ite['quantite']; ?>									</td>
			<td style="text-align:right;" align=left><?php echo $ite['valeur']; ?>										</td>
			<td>																		</td>
			<td style="text-align:right;font-weight : bold;"> €												</td>
			<td style="text-align:right;font-weight : bold;"> €												</td>
			<td style="text-align:right;font-weight : bold;"> €												</td>
			<td class="display">	
				<form name="modifier" action="modifier.php"  method="post">
				<input type="text" name="numproduit" value="<?php echo $ite['numproduit']  ; ?>" id="numproduit" hidden />	
				<input type="text" name="numdossier" value="<?php echo $ite['numdossier']  ; ?>" id="numdossier" hidden />	
				<input type="text" name="numitem" value="<?php echo $ite['numitem']  ; ?>" id="numitem" hidden />	
			<td STYLE="width:10%;" ><button type="submit" class="button">Modifier</button>									</td>
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
