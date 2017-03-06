<?php require "../../header.php"; ?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Annulations</h1>																	</td>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />	</td>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=8 ALIGN=CENTER VALIGN=MIDDLE >				<B>CHOISIR LE TYPE D'ANNULATION</B>	</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;" >											</TD>
			<TD STYLE="width:10%;" >						<B>Client</B>				</TD>
			<TD STYLE="width:10%;" >						<B>Voyageur</B>				</TD>
			<TD STYLE="width:10%;" >						<B>Prestation</B>			</TD>
			<TD STYLE="width:10%;" >											</TD>
		</TR>
		<TR>
			<td>
			<TD><input type="button" onclick="location.href='client'" value="Client" />
			<TD><input type="button" onclick="location.href='voyageur'" value="Voyageur" />
	</table>
<?php } mysql_close(); ?>
