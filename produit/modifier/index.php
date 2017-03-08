	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php //if (isset(
	//$admin['numproduit'],
	//$admin['numclient']
	//) ) {?>
	<?php $sql1 = 'SELECT 
	numproduit,
	numdossier,	
	date_depart,
	date_retour
		FROM clients
	WHERE numclient = '.$admin['numclient'].'
	';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req1)) { ?>	
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top>
			<?php $sql2 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].'';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($name = mysql_fetch_assoc($req2)) { ?>	
			<td>				<h1><?php echo $name['produit']; ?></h1>												</TD>
			<?php } //$get_name ?>

			<td class=inputnum><label><a href="">N° Produit</a></label><input type="text" name="numproduit" value="<?php echo $admin['numproduit']  ; ?>" id="numproduit" />

				<form  action="supprimer.php"  method="post">
				<input type="submit" value="Supprimer"   />
				</form>
				<form action="getnumclient.php" method="post" >
			<td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />
				</form>

				<form  action="enregistrer.php"  method="post">
				<input type="submit" value="Enregistrer"   />
	</table>
	<?php if (isset($admin['position']) ) { ?>	
	<?php
	$sql3 = 'SELECT * FROM synoptique WHERE position = '.$admin['position'].' ';
	$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
	while($programme = mysql_fetch_assoc($req3)) {?>
	<table border=0 cellpadding=0 cellspacing=0>
				<input type="text" value="<?php echo $admin['position']  ; ?>" name="position" id="position" HIDDEN/>
		<TR class="niv1">
			<td STYLE="WIDTH:10%" >								<b>JOUR</b>										</td>
			<td STYLE="WIDTH:10%" >								<b>DATE</b>										</td>
			<td STYLE="WIDTH:80%" >								<b>PROGRAMME</b>									</td>
		</TR>
		<TR>
			<td>								<input type="text" value="<?php echo $programme['jours']  ; ?>" name="jours" id="jours"/>		</td>
			<td>								<input type="text" value="<?php echo $programme['syn_date']  ; ?>" name="syn_date" id="syn_date"/>	</td>
			<td>								<input type="text" value="<?php echo $programme['programme']  ; ?>" name="programme" id="programme"/>	</td>
		</TR>	
		<TR class="niv1">
			<td COLSPAN=3 >									<b>DÉTAIL DU PROGRAMME</b>								</td>	
		<TR>
			<td COLSPAN=3><textarea type="text" cols=100 rows=5 type="text"  name="detailprog" id="detailprog"><?php echo $programme['detailprog']  ; ?></textarea>			</td>

	</table>
	<br>
	<table border=0 cellpadding=0 cellspacing=0>
		<TR class="niv1">
			<TD  COLSPAN=10 ALIGN=CENTER VALIGN=MIDDLE ><a href="../transport">		<B>TRANSPORT</B></a>									</TD>	
		</TR>
		<TR class="niv2">
			<TD STYLE="width:5%;" >								<B>Jour</B>										</TD>
			<TD STYLE="width:15%;">								<B>Départ de</B>									</TD>
			<TD STYLE="width:7%;" >								<B>Date</B>										</TD>
			<TD STYLE="width:5%;" >								<B>Heure*</B>										</TD>
			<TD STYLE="width:12%;">								<B>Arrivée à</B>									</TD>
			<TD STYLE="width:7%;" >								<B>Date</B>										</TD>
			<TD STYLE="width:5%;" >								<B>Heure*</B>										</TD>	
			<TD STYLE="width:20%;">								<B>Cie. / Commentaire</B>								</TD>
			<TD STYLE="width:10%;">								<B>Commande</B>										</TD>	
		</TR>
		<?php if (isset($admin['numclient'], $programme['jours'] ) ) { ?>
		<?php
		$sql4 = 'SELECT 
			jours,
			departde,
			date_depart,
			heuredepart,
			arriveea,
			date_arrivee,
			heurearrivee,
			commentaire,
			DAY(syn_date) AS jour,
			MONTH(syn_date) AS mois,
			YEAR(syn_date) AS annee,
			DATE(syn_date) AS date
				FROM synoptique 
			WHERE numclient = '.$admin['numclient'].' 
			AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND jours = '.$programme['jours'].' 
			AND attribut = \'transport\' 
			';
		$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
		while($listing_transport = mysql_fetch_assoc($req4)) { ?>
 

		<TR class="niv3">
			<TD>										<?php echo $listing_transport['jours']         ; ?>					</TD>
			<TD>										<?php echo $listing_transport['departde']     ; ?>					</TD>
			<TD>										<?php echo $listing_transport['date_depart']   ; ?>					</TD>
			<TD>										<?php echo $listing_transport['heuredepart']  ; ?>					</TD>
			<TD>										<?php echo $listing_transport['arriveea']     ; ?>					</TD>
			<TD>										<?php echo $listing_transport['date_arrivee']  ; ?>					</TD>
			<TD>										<?php echo $listing_transport['heurearrivee'] ; ?>					</TD>
			<TD>										<?php echo $listing_transport['commentaire']  ; ?>					</TD>
				<form  action="modifier_transport.php"  method="post">
				<input type="text"  name="position" id="position" value="<?php echo $listing_transport['position']  ; ?>" hidden/>
			<TD>										<button type="submit" class="button">[Modifier]</button>				</TD>
				</form>
		</tr>
		<tr>
			<td colspan=8>									<div id="filet"></div>									</td>	
		</TR>	
		<?php } //$get_listing_transport ?>
		<?php } //isset ?>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0>
		<TR class="niv1">
			<TD COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE ><a href="../hebergement">		<B>HEBERGEMENT</B></a>									</TD>
		</TR>
		<TR class="niv2">
			<TD STYLE="width:5%;" >								<B>Jour</B>										</TD>
			<TD STYLE="width:15%;">								<B>Localité</B>										</TD>
			<TD STYLE="width:5%;" >								<B>Nuitées</B>										</TD>
			<TD STYLE="width:5%;" >								<B>Type</B>										</TD>
			<TD STYLE="width:6%;" >								<B>Formule</B>										</TD>
			<TD STYLE="width:6%;" >								<B>Nom</B>										</TD>
			<TD STYLE="width:10%;">								<B>arrivée</B>										</TD>
			<TD STYLE="width:6%;" >								<B>Commentaire</B>									</TD>
			<TD STYLE="width:10%;">								<B>Commande</B>										</TD>	
		</TR>
		<?php if (isset($admin['numclient'], $programme['jours'] ) ) { ?>
		<?php
		$sql5 = 'SELECT 
			numcontact,
			jours,
			nuitees,
			formule,
			date_arrivee,
			commentaire,
			DAY(syn_date) AS jour,
			MONTH(syn_date) AS mois,
			YEAR(syn_date) AS annee,
			DATE(syn_date) AS date
				FROM synoptique 
			WHERE numclient = '.$admin['numclient'].' 
			AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND jours = '.$programme['jours'].' 
			AND attribut = \'hebergement\'
			';
		$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error());
		while($listing_hebergement = mysql_fetch_assoc($req5)) { ?>
 

			<?php if (isset($listing_hebergement['numcontact'] ) ) { ?>
			<?php $sql6 = 'SELECT * FROM contacts WHERE numcontact = '.$listing_hebergement['numcontact'].' ';
			$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error());
			while($contact = mysql_fetch_assoc($req6)) { ?>
		<TR class="niv3">
			<TD>										<?php echo $listing_hebergement['jours']  	; ?>					</TD>
			<TD>										<?php echo $contact['ville']  			; ?>					</TD>
			<TD>										<?php echo $listing_hebergement['nuitees']  	; ?>					</TD>
			<TD>										<?php echo $contact['metier']  			; ?>					</TD>
			<TD>										<?php echo $listing_hebergement['formule'] 	; ?>					</TD>
			<TD>										<?php echo $contact['nom_firme'] 		; ?>					</TD>
			<TD>										<?php echo $listing_hebergement['date_arrivee']  ; ?>					</TD>
			<TD>										<?php echo $listing_hebergement['commentaire']  ; ?>					</TD>
				<form  action="modifier_hebergement.php"  method="post">
				<input type="text"  name="position" id="position" value="<?php echo $listing_hebergement['position']  ; ?>" hidden/>
			<TD>										<button type="submit" class="button">[Modifier]</button>				</TD>
				</form>
		</TR>	
			<?php } //$get_contact ?>
			<?php } //isset ?>
		<?php } //$get_listing_hebergement ?>
		<?php } //isset ?>
		<tr>
			<td colspan=8>									<div id="filet"></div>									</td>
		</TR>		
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0>
		<TR class="niv1">
			<TD  COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE ><a href="../restauration">		<B>RESTAURATION</B></a>									</TD>	
		</TR>
		<TR class="niv2">
			<TD STYLE="width:5%;" >								<B>Jour</B>										</TD>
			<TD STYLE="width:15%;">								<B>Date</B>										</TD>
			<TD STYLE="width:70%;">								<B>Prestation</B>									</TD>
			<TD STYLE="width:10%" >								<B>Commande</B>										</TD>
		</TR>
		<?php if (isset($admin['numclient'], $programme['jours'] ) ) { ?>
		<?php $sql7 = 'SELECT 
			jours,
			date_depart,
			designation,
			DAY(syn_date) AS jour,
			MONTH(syn_date) AS mois,
			YEAR(syn_date) AS annee,
			DATE(syn_date) AS date
 				FROM synoptique 
			WHERE numclient = '.$admin['numclient'].'
			AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND jours = '.$programme['jours'].' 
			AND attribut = \'restauration\' 
			';
		$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error());
		while($listing_restauration = mysql_fetch_assoc($req7)) { ?>
		<TR class="niv3">
			<TD>										<?php echo $listing_restauration['jours']  	; ?>					</TD>
			<TD>										<?php echo $listing_restauration['date_depart']; ?>					</TD>
			<TD>										<?php echo $listing_restauration['designation']   ; ?>					</TD>
				<form  action="modifier_autres_prestations.php"  method="post">
				<input type="text"  name="position" id="position" value="<?php echo $listing_restauration['position']  ; ?>" hidden/>
			<TD>										<button type="submit" class="button">[Modifier]</button>				</TD>
				</form>
		<tr>
			<td colspan=3>									<div id="filet"></div>									</td>	
		</TR>
		<?php } //$get_listing_restauration ?>
		<?php } //isset ?>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0>
		<TR class="niv1">
			<TD  COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE ><a href="../visite">			<B>VISITES</B></a>									</TD>	
		</TR>
		<TR class="niv2">
			<TD STYLE="width:5%;" >								<B>Jour</B>										</TD>
			<TD STYLE="width:15%;">								<B>Date</B>										</TD>
			<TD STYLE="width:70%;">								<B>Prestation</B>									</TD>
			<TD STYLE="width:10%" >								<B>Commande</B>										</TD>
		</TR>
		<?php if (isset($admin['numclient'], $programme['jours'] ) ) {?>
		<?php $sql8 = 'SELECT 
			jours,
			date_arrivee,
			designation, 
			DAY(syn_date) AS jour,
			MONTH(syn_date) AS mois,
			YEAR(syn_date) AS annee,
			DATE(syn_date) AS date

				FROM synoptique 
			WHERE numclient = '.$admin['numclient'].' 
			AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND jours = '.$programme['jours'].' 
			AND attribut = \'visite\' '
			;
		$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error());
		while($listing_visites = mysql_fetch_assoc($req8)) { ?> 
		<TR class="niv3">
			<TD>										<?php echo $listing_visites['jours']  	; ?>						</TD>
			<TD>										<?php echo $listing_visites['date_arrivee']  	; ?>					</TD>
			<TD>										<?php echo $listing_visites['designation']   ; ?>					</TD>
				<form  action="modifier_autres_prestations.php"  method="post">
				<input type="text"  name="position" id="position" value="<?php echo $listing_visites['position']  ; ?>" hidden/>
			<TD>										<button type="submit" class="button">[Modifier]</button>				</TD>
				</form>
		<tr>
			<td colspan=3>									<div id="filet"></div>									</td>	
		</TR>
		<?php } //$get_listing_visites ?>
		<?php } //isset ?>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0>
		<TR class="niv1">
			<TD  COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE ><a href="../activite">		<B>ACTIVITES</B></a>									</TD>	
		</TR>
		<TR class="niv2">
			<TD STYLE="width:5%;" >								<B>Jour</B>										</TD>
			<TD STYLE="width:15%;">								<B>Date</B>										</TD>
			<TD STYLE="width:70%;">								<B>Prestation</B>									</TD>
			<TD STYLE="width:10%" >								<B>Commande</B>										</TD>
		</TR>
		<?php if (isset($admin['numclient'], $programme['jours'] ) ) { ?>
		<?php $sql9 = 'SELECT 
			jours,
			date_arrivee,
			designation, 
			DAY(syn_date) AS jour,
			MONTH(syn_date) AS mois,
			YEAR(syn_date) AS annee,
			DATE(syn_date) AS date

				FROM synoptique 
			WHERE numclient = '.$admin['numclient'].' 
			AND STR_TO_DATE(DATE(syn_date), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND jours = '.$programme['jours'].' 
			AND attribut = \'activite\' 
			';
		$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error());
		while($listing_activites = mysql_fetch_assoc($req9)) { ?> 
		<TR class="niv3">
			<TD>										<?php echo $listing_activites['jours']  	; ?>					</TD>
			<TD>										<?php echo $listing_activites['date_arrivee']  	; ?>					</TD>
			<TD>										<?php echo $listing_activites['designation']   ; ?>					</TD>
				<form  action="modifier_autres_prestations.php"  method="post">
				<input type="text"  name="position" id="position" value="<?php echo $listing_activites['position']  ; ?>" hidden/>
			<TD>										<button type="submit" class="button">[Modifier]</button>				</TD>
				</form>
		<tr>
			<td colspan=3>									<div id="filet"></div>									</td>	
		</TR>
		<?php } //$get_listing_activites ?>
		<?php } //isset ?>
	</table>
	<?php } //$get_programme ?>
	<?php } //isset ?>
	<?php } //$get_client ?>

	<?php //} //isset ?>
	<?php } mysql_close(); ?> 
