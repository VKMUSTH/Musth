	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>


	<table 		name="topnav" border=0 cellpadding=0 cellspacing=0 >
		<TR 	name="menu" valign=top  >
		<?php if (isset($admin['numcampagne']) ) { ?>
				<?php
				$sql1 = 'SELECT * FROM campagnes WHERE position = '.$admin['numcampagne'].' ';
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
				while($contact = mysql_fetch_assoc($req1)) { ?>

			<td>	<h1><?php echo $contact['titre']; ?></h1>											</td>
			<td class=inputnum><label><a href="">N° Campagne</a></label><input type="text" name="numcampagne" value="<?php echo $admin['numcampagne']  ; ?>" id="numcampagne" />	</td>
			<td class=inputnum><label><a href="">N° Position</a></label><input type="text" name="position" value="<?php echo $admin['position']  ; ?>" id="position" />		

				<table 		name="bout" border=0 cellpadding=0 cellspacing=0 >
					<TR 	name="menu" valign=top  >
						<td>
							<form action="get_position_inf_sup.php" method="post" >
							<input type="text"  name="position" value="<?php echo $admin['position']-1  ; ?>"  id="position" hidden />
							<button type="submit" class="button">[-]</button> 
							</form>
						</td>
						<td>
							<form action="get_position_inf_sup.php" method="post" >
							<input type="text"  name="position" value="<?php echo $admin['position']+1 ; ?>"  id="position" hidden />
							<button type="submit" class="button">[+]</button> 
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>																
	</table>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr class="niv1">
			<TD COLSPAN=7 ALIGN=CENTER VALIGN=MIDDLE>	<B>Listing des clients concernés par la promotion</B>								</TD>
		</tr>
		<tr class="niv2">
			<td STYLE="width:10%;">				<b>Position</b>													</TD>
			<td STYLE="width:10%;" >			<b>Numclient</b>												</TD>
			<td STYLE="width:70%;" >			<b>Indication</b>												</TD>
			<td STYLE="width:10%;" class="display" >	<b>COMMANDE</b>													</TD>
		</tr>
		<?php
		$sql2 = 'SELECT  
			id,			
			numcampagne,
			numclient
				FROM clients_campagne
			ORDER BY id ASC
			';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($contact = mysql_fetch_assoc($req2)) { ?>

		<tr class="niv3">
				<form name="client" action="update_position.php" method="post" >
				<input type="text" name="position"	id="position"		value="<?php echo $contact['id']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $contact['id']; ?></button>			 		</td>	
				</form>
				<form name="client" action="goto_client.php" method="post" >
				<input type="text" name="numclient"	id="numclient"		value="<?php echo $contact['numclient']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3; "><button type="submit" class="button"><?php echo $contact['numclient']; ?></button>					</td>	
				</form>

			<td style="text-align:right;border-left: 1px solid #b8bec3;">	<?php echo $contact['numclient']; ?>								</td>

				<form name="modifier" action="modifier.php"  method="post">
				<input type="text" name="position" value="<?php echo $contact['position']  ; ?>" id="position" hidden />	
			<td STYLE="border-right: 1px solid #b8bec3;" class="display"><button type="submit" class="button">Modifier</button>						</td>
				</form>
		</tr>
		<TR>
			<td colspan=7>		<div id="filet"></div>															</td>
		</TR>		
		<?php } //$get_contact?>		
	</table>







<?php
	} //sql3
	} //sql1
    } // admin
mysql_close();
?> 
