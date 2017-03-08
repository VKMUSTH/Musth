	<?php include "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top>
			<td>	<h1>Planning du jour x</h1>																	</td>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="1" id="numdossier" />		
				<input type="button" onclick="location.href='nouveau'" value="Nouveau" />
			</td>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="1" id="numclient" />	</td>
			<td class=inputnum><label><a>N° Produit</a></label><input type="text" name="numproduit" value="1" id="numproduit" />		
				<form  action="supprimer.php"  method="post">
				<input type="text" value="<?php echo $admin['position']  ; ?>" name="position" id="position" HIDDEN/>
				<input type="submit" value="Supprimer"   />
				</form>
			</td>
			<td class=inputnum><label><a>N° Position</a></label><input type="text" name="position" value="<?php echo $admin['position']  ; ?>" id="position" />
				<form  action="modifier.php"  method="post">
				<input type="text" value="<?php echo $admin['position']  ; ?>" name="position" id="position" HIDDEN/>
				<input type="submit" value="Enregistrer"   />
			</td>
	</table>
		<?php if (isset($admin['position']) ) {	?>
		<?php
		$sql1 = 'SELECT * FROM synoptique WHERE position = '.$admin['position'].' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($programme = mysql_fetch_assoc($req1))
		    {
		?>

		<!--$get_programme = $bdd->prepare('SELECT * FROM synoptique WHERE position = ? ');
		$get_programme->execute(array($admin['position']));
		while ($programme = $get_programme->fetch()){ ?-->
	<table border=0 cellpadding=0 cellspacing=0>
		<TR class="niv1">
			<td STYLE="WIDTH:10%" class="niv1">	<b>JOUR</b>															</td>
			<td STYLE="WIDTH:10%" class="niv1">	<b>DATE</b>															</td>
			<td STYLE="WIDTH:70%" class="niv1">	<b>PROGRAMME</b>														</td>
			<td STYLE="WIDTH:10%" class="niv1">	<b>ATTRIBUT</b>															</td>
		</TR>
		<TR>
			<td>	<input type="text" value="<?php echo $programme['jours']  ; ?>" name="jours" id="jours"/>									</td>
			<td>	<input type="text" value="<?php echo $programme['syn_date']  ; ?>" DISABLED />											</td>
			<td>	<input type="text" value="<?php echo $programme['programme']  ; ?>" name="programme" id="programme"/>								</td>
			<TD>
				<select name="attribut" id="attribut">
					<option value="<?php echo $programme['attribut']; ?>"><?php echo $programme['attribut']; ?></option> 
					<option value="programme">programme</option>
					<option value=""></option>
				</select>
			</td>
		</TR>
		<TR class="niv1">
			<td COLSPAN=3 >				<b>DÉTAIL DU PROGRAMME</b>													</td>	
		</TR>	
		<TR>
			<td COLSPAN=3><textarea type="text" cols=100 rows=5 type="text"  name="detailprog" id="detailprog"><?php echo $programme['detailprog']  ; ?></textarea>			</td>
		</TR>
	</table>
		<?php } //$get_programme	?>
	<?php
		} //isset sql1
		} mysql_close();
	?> 
