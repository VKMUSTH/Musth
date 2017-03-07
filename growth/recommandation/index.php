	<?php require '../../header.php'; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<!--?php if (isset(
	$admin['mois_en_cours'], 
	$admin['annee_en_cours']

	) ) {?-->
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR valign=top  >
			<td>	<h1>Referal: influenceurs</h1>															</td>
				<form action="getmoisencours.php" method="post" >
			<td class=inputnum><label><a href="">Mois</a></label><input type="text" name="mois_en_cours" value="<?php echo $admin['mois_en_cours']  ; ?>" id="mois_en_cours" />
				</form>
				<form action="getanneeenmoins.php" method="post" >
				<input type="text"  name="annee_en_cours" value="<?php echo $admin['annee_en_cours']-1  ; ?>"  id="annee_en_cours" hidden />
				<button type="submit" class="button">[-]</button> 
				</form>
			</td>
				<form action="getanneeencours.php" method="post" >
			<td class=inputnum><label><a href="">Année<a></label><input type="text"  name="annee_en_cours" id="annee_en_cours" value="<?php echo $admin['annee_en_cours']  ; ?>"	 />
				</form>
				<form action="getanneeenplus.php" method="post" >
				<input type="text"  name="annee_en_cours" value="<?php echo $admin['annee_en_cours']+1 ; ?>"  id="annee_en_cours" hidden />
				<button type="submit" class="button">[+]</button> 
				</form>
			</td>
		</tr>	
	</table>
	<BR>
	<?php $niv = ''; include($niv.'calendrier/admin.php');?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE >				<B>ACTUALITÉS</B>							</TD>		
			<TD STYLE="width:10%;" >		<input type="button" onclick="location.href='nouveau'" value="Nouveau"  /> 
		</TR>

		<TR class="niv2">
			<td STYLE="width:10%;" >Date															</TD>
			<TD STYLE="width:80%;" >Titre															</TD>
			<TD STYLE="width:10%;" >Commande														</TD>
		<?php if (isset($admin['numproduit']) ) { ?>
		<?php
		$sql1 = 'SELECT 
			id,
			titre,
			lien,
			DAY(date) AS jour,
			MONTH(date) AS mois,
			YEAR(date) AS annee,
			DATE(date) AS date
				FROM actualites 
			WHERE MONTH(date) = '.$admin['mois_en_cours'].'
			ORDER BY id DESC
			';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($actualite = mysql_fetch_assoc($req1)) { ?> 
		<tr class="niv3">
			<td><?php echo $actualite['date']; ?>														</TD>
			<td><a href="<?php echo $actualite['lien']; ?>"><?php echo $actualite['titre']; ?></a>								</TD>
				<form  action="modifier.php"  method="post">
				<input type="text" value="<?php echo $actualite['id']  ; ?>" name="position" id="position" HIDDEN/>
			<TD STYLE="border-right: 1px solid #b8bec3; " >		<button type="submit" class="button" >MODIFIER</button>					</TD>	
				</form>
		<?php } //$get_actualite ?>
		<?php } //isset ?>
	</table>
	<?php //} ?>
	<?php } mysql_close(); ?>
