	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php if (isset(
	$admin['numclient']
	) ) {	?>

	<?php
	$sql1 = 'SELECT 
	numproduit,
	numdossier,	
	date_depart,
	date_retour,
	titre
		FROM clients
	WHERE numclient = '.$admin['numclient'].'
	';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req1)) { ?>	

	<!--?php$get_client = $bdd->query('SELECT 
	numproduit,
	numdossier,	
	date_depart,
	date_retour,
	titre
		FROM clients
	WHERE numclient = '.$admin['numclient'].'
	');
	while ($client = $get_client->fetch()){?-->

	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>	<h1>Voyageurs:<?php echo $client['titre']; ?> </h1>														</td>
				<form action="getnumclient.php" method="post" >
		        <td class=inputnum><label><a href="">N° Client</a></label><input type="text" name="numclient" value="<?php echo $admin['numclient']  ; ?>" id="numclient" />		
				<input type="button" onclick="location.href='attribuer'" value="Attribuer" />
				</form>
			</td>
		        <td class=inputnum><label><a href="">N° Voyageur</a></label><input type="text" name="numdossier" value="<?php echo $admin['numdossier']  ; ?>" id="numdossier" />
				<input type="button" onclick="location.href='ajouter'" value="Ajouter" />
			</td>
	</table>
	<br>	
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=8 ALIGN=CENTER VALIGN=MIDDLE >				<a href=""><B>LISTE DES VOYAGEURS</B></a>							</TD>
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;" >						<B>Numvoyageur</B>										</TD>
			<TD STYLE="width:10%;" >						<B>Civilité</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Nom</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Prénom</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Age</B>											</TD>
			<TD STYLE="width:10%;" >						<B>Chambre</B>											</TD>
			<TD STYLE="width:30%;" >						<B>Commentaire</B>										</TD>
			<TD STYLE="width:10%;" >						<B>Commande</B>											</TD>
		</TR>

		<?php
		$sql2 = 'SELECT 
			numcontact,
			numvoyageur,
			DAY(date_voyageur) AS jour,
			MONTH(date_voyageur) AS mois,
			YEAR(date_voyageur) AS annee,
			DATE(date_voyageur) AS date 
				FROM voyageurs 
			WHERE numclient = '.$admin['numclient'].'
			AND STR_TO_DATE(DATE(date_voyageur), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND attribut =\'voyageur\' 
			';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($voyageurs = mysql_fetch_assoc($req2)) { ?>	
		<!--?$get_voyageurs = $bdd->query('SELECT 
			numcontact,
			numvoyageur,
			DAY(date_voyageur) AS jour,
			MONTH(date_voyageur) AS mois,
			YEAR(date_voyageur) AS annee,
			DATE(date_voyageur) AS date 
				FROM voyageurs 
			WHERE numclient = '.$admin['numclient'].'
			AND STR_TO_DATE(DATE(date_voyageur), "%Y-%m-%d") BETWEEN "'.$client['date_depart'].'" AND "'.$client['date_retour'].'"
			AND attribut =\'voyageur\' 
			');
		while ($voyageurs = $get_voyageurs->fetch()){?-->

		<?php if (isset($voyageurs['numcontact']) ) {?>	
		<?php
		$sql3 = 'SELECT * FROM contacts WHERE numcontact = '.$voyageurs['numcontact'].' ';
		$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
		while($contacts = mysql_fetch_assoc($req3)) { ?>	
		<!--?$get_contacts = $bdd->prepare('SELECT * FROM contacts WHERE numcontact = ? ');
		$get_contacts->execute(array($voyageurs['numcontact']));
		while ($contacts = $get_contacts->fetch()){?-->
				<form name="positioncontact" action="goto_contact.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $voyageurs['numcontact']  ; ?>"  hidden/>
				<input type="text" name="numvoyageur" id="numvoyageur" value="<?php echo $voyageurs['numvoyageur']  ; ?>"  hidden/>
		<TR class="niv3">
			<TD align=center  STYLE="border-left: 1px solid #b8bec3; ">	<button type="submit" class="button"><?php echo $voyageurs['numvoyageur']; ?></button>			</td>
				</form>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="numcontact" id="numcontact" value="<?php echo $voyageurs['numcontact']  ; ?>" hidden />	
				<input type="text" name="numvoyageur" id="numvoyageur" value="<?php echo $voyageurs['numvoyageur']  ; ?>" hidden />	
			<TD><?php echo $contacts['civilite']  ; ?>																</TD>
			<TD><?php echo $contacts['nom']  ; ?>																	</TD>
			<TD><?php echo $contacts['prenom']  ; ?>																</TD>
			<TD><?php echo $contacts['naissance']  ; ?>																</TD>
			<TD><?php echo $contacts['chambre']  ; ?>																</TD>
			<TD><?php echo $contacts['commentaire']  ; ?>																</TD>
			<TD STYLE="border-left: 1px solid #b8bec3;border-right: 1px solid #b8bec3" class="display"><button type="submit" class="button">[Modifier]</button>			</TD>
				</form>
		</TR>
		<TR>
			<TD colspan="8">		<div id="filet"></div>															</TD>
		</TR>
		<?php } //isset sql3 ?>
		<?php } //$get_contacts ?>
		<?php } //$get_voyageurs ?>
	</table>
	<?php  $niv = ''; include($niv.'admin2.php');?>
	<br>
	<?php } //$get_client ?>
	<?php
	} //isset
	?>
	<?php } mysql_close(); ?>
