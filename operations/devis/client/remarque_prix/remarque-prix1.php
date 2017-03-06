	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD ALIGN=LEFT VALIGN=MIDDLE ><a href=""><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REMARQUE SUR LES PRIX :</B></a>
		<TR class="niv2">
			<TD STYLE="border-top: 1px solid #b8bec3; border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3"  >
			<a href="remarque_prix/les_prix_comprennent"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LES PRIX COMPRENNENT :</B></a>
		<?php // if (isset($admin['numdossier']) ) { ?>
		<?php
		$sql1 = 'SELECT * FROM remarques_prix WHERE numdossier = '.$admin['numdossier'].' AND attribut =\'compris\' ';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($prixcomprennent = mysql_fetch_assoc($req1)) { ?>
		<TR>
			<TD STYLE="border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3"  ><B>- <a href=""><?php echo $prixcomprennent['remarque']; ?></a></B></TD>	
		</TR>
		<?php } //$getprixcomprennent ?>

		<TR>
			<TD STYLE="border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3"  ><br>
		</TR>
		<TR BGCOLOR="#eff2f7" >
			<TD STYLE="border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3"  >
			<a href="remarque_prix/les_prix_ne_comprennent_pas"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LES PRIX NE COMPRENNENT PAS :</B></a>
		<?php // if (isset($admin['numdossier']) ) { ?>
				<?php
				$sql2 = 'SELECT * FROM remarques_prix WHERE numdossier = '.$admin['numdossier'].' AND attribut =\'non compris\' ';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($prixnecomprennentpas = mysql_fetch_assoc($req2)) { ?>

		<TR>
			<TD STYLE="border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3"  ><B>- <a href=""><?php echo $prixnecomprennentpas['remarque']; ?></a></B></TD>	
		</TR>
		<?php } //$getprixnecomprennentpas ?>

		<TR>
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3" ><Br></TD>	
		</TR>
	</table>
	<BR>
