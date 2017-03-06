	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>
		<?php if (isset($admin['numcontact']) ) {?>	
		<?php
		$sql1 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].'  ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($client = mysql_fetch_assoc($req1))
		{
		?>
					<h1>Attribuer Client: <?php echo $client['nom']  ; ?> <?php echo $client['prenom']  ; ?></h1>
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />
				</form>
			</td>
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				</form>
			</td>

				<form action="getnumcontact.php" method="post" >
		        <td class=inputnum><label><a href="">N° Contact</a></label><input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact" />
				</form>
				<form  action="enregistrer.php"  method="post">
				<input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" hidden />
				<input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" hidden />
				<input type="text" name="numcontact" value="<?php echo $admin['numcontact']  ; ?>" id="numcontact"  hidden/>
				<?php $date = date("Y-m-d");?>
				<input type="text" name="date_cdv" id="date_cdv" value="<?php echo ''.$date.''?>" />
				<input type="text" name="statut" value="EXPEDITION" id="statut"  hidden/>
				<input type="text" name="type" value="Client_porteur_devis" id="type"  hidden/>
				<input type="text" name="unit" id="unit" value="1"  hidden/>
				<input type="text" name="date_depart" id="date_depart" value="<?php echo ''.$date.''?>" HIDDEN/>
				<input type="text" name="date_retour" id="date_retour" value="<?php echo ''.$date.''?>"HIDDEN />
				<input type="text" name="facturation_debut" id="facturation_debut" value="<?php echo ''.$date.''?>"HIDDEN />
				<input type="text" name="facturation_fin" id="facturation_fin" value="<?php echo ''.$date.''?>"HIDDEN />



				<input type="submit" value="Envoyer"   /> 
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >			<B>ATTRIBUER UN CLIENT</B>									</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >	<B>Civilité</B>											</TD>
			<TD STYLE="width:10%;" >					<B>Nom</B>											</TD>
			<TD STYLE="width:10%;" >					<B>Prénom</B>											</TD>
			<TD STYLE="width:10%;" >					<B>Date de naissance</B>									</TD>
			<TD STYLE="width:10%;" >					<B>Voyageur</B>											</TD>
			<TD STYLE="width:50%; border-right: 1px solid #b8bec3"  >	<B>Commentaire</B>										</TD>
		</TR>
        	<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >			<input type="text" name="" id="" value="<?php echo $client['civilite']  ; ?>" />		</TD>
			<TD>								<input type="text" name="" id="" value="<?php echo $client['nom']  ; ?>" />			</TD>
			<TD>								<input type="text" name="" id=""  value="<?php echo $client['prenom']  ; ?>" />			</TD>
			<TD>								<input type="text" name="naissance" id="naissance" value="" />					</TD>
			<TD>
										<select name="voyageur" id="voyageur">
											<option value="<?php echo $contact['voyageur']; ?>"><?php echo $contact['voyageur']; ?></option> 
											<option value="voyageur">voyageur</option>
											<option value="non voyageur">non voyageur</option>
										</select>
			</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; ">		<input type="text" name="descriptif" id="descriptif" value="<?php echo $client['descriptif']  ; ?>" />	</TD>
		</TR>
				</form>
	</table>
		<?php } //$get_client ?>
	<?php
		} //isset sql1
	    } mysql_close();
	?>
