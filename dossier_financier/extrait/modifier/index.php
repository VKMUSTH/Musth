	<?php require "../../../header.php"; ?>
	<?php $sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>
				<h1>Confirmer modification</h1>		
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />

			</td>
			<td class=inputnum><label><a href="">N° Inscription</a></label><input type="text" name="numinscription" value="<?php echo $admin['numinscription']  ; ?>" id="numinscription" />
			<form  action="supprimer.php"  method="post">
				<input type="submit" value="Supprimer"   />
			</form>

	</table>
 <body onload="document.getElementById('increment').focus()"> 
	<table border=0 cellpadding=0 cellspacing=0 >


		<TR class="niv1">
			<TD  COLSPAN=12 ALIGN=CENTER VALIGN=MIDDLE >				<B>MODIFIER INSCRIPTION</B>			</TD>		
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
				<TD STYLE="width:10%;  border-left: 1px solid #b8bec3;" >	<B>Date américaine</B>				</TD>
				<TD STYLE="width:80%; " >					<B>Increment</B>			</TD>



				<TD STYLE="width:10%; border-right: 1px solid #b8bec3" >	<B>Commande</B>				</TD>
		</TR>
				<?php //if (isset($admin['numinscription']) ) {	?>
				<?php
				$sql1 = 'SELECT
					increment,
					etat,
					debit,
					credit,
					DATE(lj_date) AS date,
					YEAR(lj_date) AS annee, 
					MONTH(lj_date) AS mois,
					DAY(lj_date) AS jour
						FROM livre_journal 
					WHERE position = '.$admin['numinscription'].' 
					';
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
				while($inscription = mysql_fetch_assoc($req1)) { ?>
				<?php
				list($annee, $mois, $jour) = explode('-', $inscription['date']);
				?>


			<form  action="modifier.php"  method="post">

		<TR ALIGN=LEFT>
			<TD>	<input type="text" name="lj_date" id="lj_date" value="<?php echo $admin['var_annee']; ?>-<?php echo $admin['var_mois']; ?>-<?php echo $admin['var_jour']; ?>"/></TD>

			<TD>	<input type="text" name="increment" id="increment" value="<?php echo $inscription['increment']  ; ?>"/></TD>

			<TD>		<button type="submit" class=envoyer >CONFIRMER</button>	</TD>		
		</TR>
				</form>
			<?php } //$get_inscription ?>
	</table>
</body>
	<?php } mysql_close(); ?>
