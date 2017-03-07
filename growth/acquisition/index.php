	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>	
	<!--? if (isset(
		$admin['numproduit'],
		$admin['numdossier'],
		$admin['numclient'],
		$admin['numitem']
	) ) {?-->
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<TD>	<H1>Prospects qualifiés / actifs</H1>																</TD>
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
			<input type="button"  onclick="location.href='ajouter'" value="Ajouter" />
			</TD>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
			<input type="button"  onclick="location.href='emailing'" value="Emailing" />
			</TD>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" /> 
			<input type="button"  onclick="location.href='prospects_marque'" value="prospects_marque" />
			</td>
			<td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
			<input type="button"  onclick="location.href='fichier_client'" value="Fichier Client" />
			</td>
		</TR>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD colspan=12 ><B>PROSPECTS QUALIFIÉS</B>											</TD>
		</tr>
		<TR class="niv2">
			<TD  STYLE="width:10%;"><B>Numcontact</B></TD>
			<TD  STYLE="width:40%;"><B>Nom</B></TD>
			<TD  STYLE="width:40%;"><B>Prenom</B></TD>
			<TD  STYLE="width:10%;"><B>Commande</B></TD>
		</TR>
		<?php
		$sql1 = 'SELECT  
			numcontact,
			nom,
			prenom
				FROM contacts 
			WHERE type =\'prospect_qualifie\'
			ORDER BY numcontact DESC
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($contacts = mysql_fetch_assoc($req1)) { ?>

		<TR class="niv3">
				<form name="client" action="goto_contact.php" method="post" >
				<input type="text" name="numcontact"	id="numcontact"		value="<?php echo $contacts['numcontact']  ; ?>"hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $contacts['numcontact']; ?></button>		</td>	
				</form>
			<TD><?php echo $contacts['nom']; ?>													</td>
			<TD><?php echo $contacts['prenom']; ?>													</td>
				<form name="modifier" action="goto_modifier.php" method="post" >
				<input type="text" name="numcontact"	id="numcontact"		value="<?php echo $contacts['numcontact']  ; ?>"hidden />
			<TD STYLE="border-right: 1px solid #b8bec3;" ><button type="submit" class="button">[Modifier]</button>					</TD>
				</form>
		</tr>
		<TR>
			<TD colspan="5">		<div id="filet"></div>											</TD>
		</TR>
		<?php } //$get_contacts ?>		
	</table>
	<?php $niv = ''; include($niv.'descriptif/admin.php');?>
	<?php //} ?>
	<?php } mysql_close(); ?>
