	<?php require '../../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
			<td>	<h1>Historique</h1>															</td>
			<td class=inputnum><label><a href="">Numcontact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
			</td>
		</tr>	
	</table>
	<br>

							<table border=0 cellpadding=0 cellspacing=0  >
								<TR class="niv1">
									<TD colspan=3 >		<B>HISTORIQUE CLIENT</B>								</TD>
								</tr>
								<TR class="niv2">
									<TD  STYLE="width:10%;">	<B>Date</B>	</TD>
									<TD  STYLE="width:30%;">	<B>Produit</B>	</TD>
									<TD  STYLE="width:10%;">	<B>Montant</B>	</TD>
								</TR>
								<?php
								$sql1 = 'SELECT  
									numproduit,
									numdossier,
									numclient,
									numcontact,
									date_cdv
										FROM clients 
									WHERE numcontact = '.$admin['numcontact'].'
									ORDER BY numclient DESC
									';
								$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
								while($factures = mysql_fetch_assoc($req1)) { ?>


								<?php if (isset($factures['numcontact']) ) {?>
								<?php
								$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$factures['numcontact'].'';
								$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
								while($historique = mysql_fetch_assoc($req2)) { ?>
								<TR class="niv3">
									<form name="client" action="goto_facture.php" method="post" >
									<input type="text" name="numclient"	id="numclient"		value="<?php echo $factures['numclient']  ; ?>" 	hidden />
									<input type="text" name="numcontact"	id="numcontact"		value="<?php echo $factures['numcontact']  ; ?>" 	hidden />
									<TD STYLE="border-left: 1px solid #b8bec3; ">
									<button type="submit" class="button"><?php echo strftime('%Y-%m-%d',strtotime($factures['date_cdv'] .'')); ?></button>
									</td>	
										</form>
								<?php if (isset($factures['numdossier']) ) {?>
								<?php
								$sql3 = 'SELECT * FROM dossiers WHERE numdossier = '.$factures['numdossier'].' ';
								$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
								while($infos = mysql_fetch_assoc($req3)) { ?>
									<TD><?php echo $historique['nom']; ?>											</td>
								<?php } //$get_infos ?>
								<?php } //isset ?>
								</tr>
								<TR>
									<TD colspan="5">		<div id="filet"></div>									</TD>
								</TR>
								<?php } //$get_historique ?>
								<?php } //isset ?>		
								<?php } //$get_factures ?>		
							</table>	
	<?php } mysql_close(); ?>
