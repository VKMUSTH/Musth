	<?php require "../../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>

	<?php
	$sql1 = 'SELECT * FROM historique_emails WHERE position = '.$admin['position'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($modifier = mysql_fetch_assoc($req1)) { ?>
	<table border=0 cellpadding=0 cellspacing=0  >
		<tr valign=top>
			<td>	<h1>Modifier question client</h1>	
				<form action="getnumclient.php" method="post" >
			<td class="inputnum"><a>N° Client</a><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
				<form name="supprimer" action="supprimer.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $admin['position']  ; ?>" HIDDEN />	
					<button type="submit" ><pann class=red>[Supprimer]</span></button>					
				</form>
			</TD>
				<form action="getposition.php" method="post" >
			<td class="inputnum"><a>Position</a><input type="text" name="position" value="<?php echo $admin['position']  ; ?>" id="position" />
				</form>
	</table>		
	<table border=0 cellpadding=0 cellspacing=0  >
		<TR class="niv1">
			<TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >				<B>MODIFIER DOC</B>			</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:60%; border-left: 1px solid #b8bec3; " >		<B>Libelle</B>				</TD>
			<TD STYLE="width:30%; border-left: 1px solid #b8bec3; " >		<B>Lien</B>				</TD>
			<TD STYLE="width:10%; border-right: 1px solid #b8bec3" >		<B>Commande</B>				</TD>	
		</TR>
				<form  action="modifier.php"  method="post">
		<tr>
			<td>	<input type="text" name="libelle" id="libelle"  value="<?php echo $modifier['libelle']; ?>" />		</TD>
			<td>	<input type="text" name="lien" id="lien"  value="<?php echo $modifier['lien']; ?>" />			</TD>

				<input type="text" name="position" value="<?php echo $admin['position']  ; ?>" id="position"  hidden/>
			<td>	<input type="submit" value="Envoyer"   />								</TD>
				</form>
		</TR>
	</table>
		<?php } //$get_modifier ?>
	<?php } mysql_close(); ?>
