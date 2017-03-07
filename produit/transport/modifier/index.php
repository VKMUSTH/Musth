	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php if (isset(
	$admin['numclient'],
	$admin['numdossier']
	) ) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<?php
		$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].'';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($name = mysql_fetch_assoc($req1))
		{
		?>
			<td colspan=6>	<h1><?php echo $name['titre']; ?></h1>															</td>
		<?php } //$get_name ?>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>
				<form  action="supprimer.php"  method="post">
				<input type="submit" value="Supprimer"   />
				</form>
			</td>
			
			<form action="getnumcontact.php" method="post" >
			<td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>"  id="numcontact" />
			</form>

			<form  action="modifier.php"  method="post">
			<input type="submit" value="Enregistrer"   />
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<input type="text"  name="position" value="<?php echo $admin['position']  ; ?>"  id="position" hidden />
		<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>"  id="numcontact" hidden />

					<?php if (isset($admin['position']) ) {?>	
					<?php
					$sql2 = 'SELECT * FROM synoptique WHERE position = '.$admin['position'].' ';
					$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
					while($transport = mysql_fetch_assoc($req2))
					{
					?>

						<?php if (isset($transport['numcontact']) ) {?>
						<?php
						$sql3 = 'SELECT * FROM contacts WHERE numcontact = '.$transport['numcontact'].' ';
						$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
						while($contacts = mysql_fetch_assoc($req3))
						{
						?>
			<TR class="niv1">
				<TD  COLSPAN=10 ALIGN=CENTER VALIGN=MIDDLE >	<B>MODIFIER TRANSPORT</B>											</TD>	
			</TR>
			<TR HEIGHT=16 ALIGN=LEFT class="niv2">
				<TD STYLE="width:4%;" >				<B>Jour</B>													</TD>
				<TD STYLE="width:10%;" >			<B>Départ de</B>												</TD>
				<TD STYLE="width:7%;" >				<B>Date</B>													</TD>
				<TD STYLE="width:5%;" >				<B>Heure*</B>													</TD>
				<TD STYLE="width:10%;" >			<B>Arrivée à</B>												</TD>
				<TD STYLE="width:7%;" >				<B>Date</B>													</TD>
				<TD STYLE="width:8%;" >				<B>Heure*</B>													</TD>	
				<TD STYLE="width:13%;  " >			<B>Compagnie/Commentaire</B>											</TD>
			</TR>
			<TR ALIGN=LEFT>
				<TD>						<input type="text" value="<?php echo $transport['jours']  ; ?>" name="jours" id="jours"  />			</TD>
				<TD>						<input type="text" value="<?php echo $transport['departde']  ; ?>" name="departde" id="departde"  />		</TD>
				<TD>						<input type="text" value="<?php echo $transport['date_depart']  ; ?>" name="date_depart" id="date_depart"  />	</TD>
				<TD>						<input type="text" value="<?php echo $transport['heuredepart']  ; ?>" name="heuredepart" id="heuredepart"/>	</TD>
				<TD>						<input type="text" value="<?php echo $transport['arriveea']  ; ?>" name="arriveea" id="arriveea"  />		</TD>
				<TD>						<input type="text" value="<?php echo $transport['date_arrivee']  ; ?>" name="date_arrivee" id="date_arrivee"/>	</TD>
				<TD>						<input type="text" value="<?php echo $transport['heurearrivee']  ; ?>" name="heurearrivee" id="heurearrivee"/>	</TD>
				<TD >						<input type="text" value="<?php echo $transport['commentaire']  ; ?>" name="commentaire" id="commentaire"  />	</TD>
			</TR>
			<TR class="niv1">
				<TD  COLSPAN=10 ALIGN=CENTER VALIGN=MIDDLE >	<B>MODIFIER TRANSPORT</B>											</TD>	
			</TR>
			<TR HEIGHT=16 ALIGN=LEFT class="niv2">
				<TD STYLE="width:40%;" colspan=5>		<B>Lien</B>													</TD>
			<TR ALIGN=LEFT>
				<TD colspan=5>					<input type="text" value="<?php echo $transport['lien']  ; ?>" name="lien" id="lien"  />			</TD>

		</form>
	</table>
					<?php } //$get_contacts ?>
				<?php } //$get_transport ?>
	<?php
		} //isset sql3
		} //isset sql2
		} //isset sql1
	    } mysql_close();
	?> 
