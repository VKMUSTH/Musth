	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Vouchers:</h1>		
			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" /></TD>
			<td class=inputnum><label><a href="">N° Dossier</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" /></TD>
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				<input type="button" onclick="location.href='top_voucher'" value="Top Voucher" />				
			</TD>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >	<B>TRANSPORT</B>				</TD>
		</TR>
		<TR class="niv2">
			<TD STYLE="width:10%;">				<B>Date</B>					</TD>
			<TD STYLE="width:30%;">				<B>Firme</B>					</TD>
			<TD STYLE="width:25%;">				<B>Départ de</B>				</TD>
			<TD STYLE="width:25%;">				<B>Arrivée à</B>				</TD>
			<TD STYLE="width:10%;" class="display" >	<B>Commande</B>					</TD>	
		</TR>
	<?php
	$sql1 = 'SELECT * FROM synoptique WHERE numclient = '.$admin['numclient'].' AND attribut = \'transport\'    ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($transport = mysql_fetch_assoc($req1)) { ?>
					<?php if (isset($transport['numcontact']) ) { ?>	
	<?php
	$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$transport['numcontact'].'  ';
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	while($contacts = mysql_fetch_assoc($req2)) { ?>
		<TR class="niv3">
				<form name="positionprestataire" action="get_voucher_transport.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $contacts['numcontact']  ; ?>" hidden />
				<input type="text" name="position" id="position" value="<?php echo $transport['position']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3" ><?php echo $transport['date_depart']  ; ?>		</TD>
			<TD><?php echo $contacts['nom_firme']  ; ?>							</TD>
			<TD><?php echo $transport['departde']  ; ?>							</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; "><?php echo $transport['arriveea']  ; ?>		</TD>
			<TD class="display">	<button type="submit" class="button">[Voucher]</button>			</TD>
				</form>
		</TR>
		<tr>
			<td colspan=8>		<div id="filet"></div>	
		</TR>		
					<?php } //$get_contacts ?>
					<?php } //isset ?>
				<?php } //$get_transport ?>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE ><B>HEBERGEMENT</B>					</TD>	
		</TR>
		<TR class="niv2">
			<TD STYLE="width:10%;">				<B>Date arrivée</B>				</TD>
			<TD STYLE="width:30%;">				<B>Nom</B>					</TD>
			<TD STYLE="width:25%;">				<B>Nuitées</B>					</TD>
			<TD STYLE="width:25%;">				<B>Formule</B>					</TD>
			<TD STYLE="width:10%;" class="display" >	<B>Commande</B>					</TD>
		</TR>
	<?php
	$sql3 = 'SELECT * FROM synoptique WHERE numclient = '.$admin['numclient'].'  AND attribut = \'hebergement\' ';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($hebergement = mysql_fetch_assoc($req3)) { ?>
					<?php if (isset($hebergement['numcontact']) ) {	?>
	<?php
	$sql4 = 'SELECT * FROM contacts WHERE numcontact = '.$hebergement['numcontact'].'  ';
	$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
	while($contacts = mysql_fetch_assoc($req4)) { ?>
		<TR class="niv3">
				<form name="positionprestataire" action="get_voucher_hebergement.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $contacts['numcontact']  ; ?>" hidden />
				<input type="text" name="position" id="position" value="<?php echo $hebergement['position']  ; ?>" hidden />
			<TD STYLE="border-left: 1px solid #b8bec3" ><?php echo $hebergement['date_arrivee']  ; ?>	</TD>
			<TD><?php echo $contacts['nom_firme']  ; ?>							</TD>
			<TD><?php echo $hebergement['nuitees']  ; ?>							</TD>
			<TD STYLE="width:9%; border-right: 1px solid #b8bec3; " ><?php echo $hebergement['formule']  ; ?></TD>
			<TD class="display">	<button type="submit" class="button">[Voucher]</button>			</TD>
				</form>
		</TR>
		<tr>
			<td colspan=5>		<div id="filet"></div>	
		</TR>		
					<?php } //$get_contacts ?>
					<?php } //isset ?>
				<?php } //$get_hebergement ?>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >	<B>RESTAURATION</B>	
		<TR class="niv2">
			<TD STYLE="width:10%;">				<B>Date</B>					</TD>
			<TD STYLE="width:80%;">				<B>Activités</B>				</TD>
			<TD STYLE="width:10%;" class="display" >	<B>Commande</B>					</TD>	
		</TR>
	<?php
	$sql5 = 'SELECT * FROM synoptique WHERE numclient = '.$admin['numclient'].'  AND attribut = \'restauration\' ';
	$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error());
	while($restauration = mysql_fetch_assoc($req5)) { ?>
					<?php if (isset($restauration['numcontact']) ) { ?>	
	<?php
	$sql6 = 'SELECT * FROM contacts WHERE numcontact = '.$restauration['numcontact'].'  ';
	$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error());
	while($contacts = mysql_fetch_assoc($req6)) { ?>
		<TR class="niv3">
				<form name="positionprestataire" action="get_voucher_restauration.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $contacts['numcontact']  ; ?>" hidden />
				<input type="text" name="position" id="position" value="<?php echo $restauration['position']  ; ?>" hidden  />
			<TD STYLE="border-left: 1px solid #b8bec3"  ><?php echo $restauration['date_arrivee']  ; ?>		</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; "><?php echo $restauration['designation']  ; ?>	</TD>
			<TD class="display">	<button type="submit" class="button">[Voucher]</button>			</TD>
				</form>
		</TR>
		<tr>
			<td colspan=2>		<div id="filet"></div>	
		</TR>		
					<?php } //$get_contacts ?>
					<?php } //isset ?>
				<?php } //$get_restauration ?>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >	<B>VISITES</B>	
		<TR class="niv2">
			<TD STYLE="width:10%;">				<B>Date</B>					</TD>
			<TD STYLE="width:80%;">				<B>Activités</B>				</TD>
			<TD STYLE="width:10%;" class="display" >	<B>Commande</B>					</TD>	
		</TR>
	<?php
	$sql7 = 'SELECT * FROM synoptique WHERE numclient = '.$admin['numclient'].'  AND attribut = \'visite\' ';
	$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error());
	while($visites = mysql_fetch_assoc($req7)) { ?>
					<?php if (isset($visites['numcontact']) ) { ?>	
	<?php
	$sql8 = 'SELECT * FROM contacts WHERE numcontact = '.$visites['numcontact'].'  ';
	$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error());
	while($contacts = mysql_fetch_assoc($req8)) { ?>
		<TR class="niv3">
				<form name="positionprestataire" action="get_voucher_autres_prestations.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $contacts['numcontact']  ; ?>" hidden />
				<input type="text" name="position" id="position" value="<?php echo $visites['position']  ; ?>" hidden  />
			<TD STYLE="border-left: 1px solid #b8bec3"  ><?php echo $visites['date_arrivee']  ; ?>		</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; "><?php echo $visites['designation']  ; ?>	</TD>
			<TD class="display">	<button type="submit" class="button">[Voucher]</button>			</TD>
				</form>
		</TR>
		<tr>
			<td colspan=2>		<div id="filet"></div>	
		</TR>		
					<?php } //$get_contacts ?>
					<?php } //isset ?>
				<?php } //$get_visites ?>
	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >	<B>ACTIVITES</B>	
		<TR class="niv2">
			<TD STYLE="width:10%;">				<B>Date</B>					</TD>
			<TD STYLE="width:80%;">				<B>Activités</B>				</TD>
			<TD STYLE="width:10%;" class="display" >	<B>Commande</B>					</TD>	
		</TR>
	<?php
	$sql9 = 'SELECT * FROM synoptique WHERE numclient = '.$admin['numclient'].'  AND attribut = \'activite\' ';
	$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error());
	while($activites = mysql_fetch_assoc($req9)) { ?>
					<?php if (isset($activites['numcontact']) ) { ?>	
	<?php
	$sql10 = 'SELECT * FROM contacts WHERE numcontact = '.$activites['numcontact'].'  ';
	$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql10.'<br>'.mysql_error());
	while($contacts = mysql_fetch_assoc($req10)) { ?>
		<TR class="niv3">
				<form name="positionprestataire" action="get_voucher_autres_prestations.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $contacts['numcontact']  ; ?>" hidden />
				<input type="text" name="position" id="position" value="<?php echo $activites['position']  ; ?>" hidden  />
			<TD STYLE="border-left: 1px solid #b8bec3"  ><?php echo $activites['date_arrivee']  ; ?>		</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; "><?php echo $activites['designation']  ; ?>	</TD>
			<TD class="display">	<button type="submit" class="button">[Voucher]</button>			</TD>
				</form>
		</TR>
		<tr>
			<td colspan=2>		<div id="filet"></div>	
		</TR>		
					<?php } //$get_contacts ?>
					<?php } //isset ?>
				<?php } //$get_activites ?>
	</table>
	<?php } mysql_close(); ?>
