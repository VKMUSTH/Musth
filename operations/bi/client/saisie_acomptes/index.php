	<?php require "../../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top>	
			<td>	<h1>Acomptes</h1> 																		</td>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		</td>
			<td class=inputnum><label><a href="">N° Voyageur</a></label><input type="text" name="numvoyageur" value="<?php echo $admin['numvoyageur']  ; ?>" id="numvoyageur" />	</td>
		</tr>
	</table>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr class="niv1">
			<td STYLE="width:80%;"  COLSPAN=3 >		<b>ACOMPTES VERSÉS OU EN PRÉVISION</b>											</TD>
			<td STYLE="width:10%;">				<input type="button" onclick="location.href='ajouter'" value="Ajouter" />						</TD>
		</tr>	
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;" >			<B>Date</B>														</TD>
			<TD STYLE="width:60%;" >			<B>Nom ou raison sociale</B>												</TD>
			<TD STYLE="width:20%;" >			<B>MONTANT</B>														</TD>
			<TD STYLE="width:10%;" >			<B>Commande</B>														</TD>
		</TR>
		<?php
		$sql1 = 'SELECT 
			position, 
			numclient, 
			numcontact, 
			attribut, 
			lj_date, 
			credit 
				FROM livre_journal 
			WHERE numclient = '.$admin['numclient'].' 
			AND attribut =\'aco\'
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($acomptes = mysql_fetch_assoc($req1)) { ?>
		<TR class="niv3">
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $acomptes['numcontact']  ; ?>" hidden />	
				<input type="text" name="position" id="position" value="<?php echo $acomptes['position']  ; ?>" hidden />	
			<TD><?php echo strftime('%d-%m-%Y',strtotime($acomptes['lj_date'] .'')); ?>												</TD>
			<?php if (isset($acomptes['numcontact']) ) {?>	
			<?php
			$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$acomptes['numcontact'].'';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($contact = mysql_fetch_assoc($req2)) { ?>
			<TD><?php echo $contact['nom']  ; ?> <?php echo $contact['prenom']  ; ?> - <?php echo $contact['nom_firme']  ; ?>							</TD>
			<TD><?php echo $acomptes['credit']  ; ?>																</TD>
			<?php } //$get_contact ?>
			<?php } //isset_contact ?>
			<TD STYLE="border-right: 1px solid #b8bec3;" class="display"><button type="submit" class="button">[Modifier]</button>							</TD>
				</form>
		</TR>
		<TR>
			<TD COLSPAN=3>		<div id="filet"></div>																</TD>
		</TR>		
		<?php } //$get_acomptes ?>
	</table>
	<?php } mysql_close(); ?>
