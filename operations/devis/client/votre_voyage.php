
						<?php if (isset($client['numdossier']) ) {?>
						<?php
						$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$client['numdossier'].'  ';
						$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
						while($produit = mysql_fetch_assoc($req1)) { ?>

	<table border=0 cellpadding=0 cellspacing=0 >
		<TR BGCOLOR="#d8dfea"  ALIGN=LEFT>
			<TD STYLE="width:40%" ><a href="../../../growth/activation"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VOTRE COMMANDE</B></a></TD>
			<TD STYLE="width:60%" ><B>: <?php echo $produit['titre']; ?></B>
			</TD>				
		</TR>
						<?php } //$get_produit ?>
						<?php } //isset ?>

		<TR BGCOLOR="#eff2f7" ALIGN=LEFT>
			<TD STYLE="width:40%; border-left: 1px solid #b8bec3" HEIGHT=16 ><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dates</B></TD>
			<TD STYLE="width:60%; border-right: 1px solid #b8bec3" ><B>: du <?php echo $client['date_depart']; ?> au <?php echo $client['date_retour']; ?></B></TD>
		</TR>
		<?php
		$sql2 = 'SELECT ROUND(SUM(unit),0) as participants FROM voyageurs WHERE numclient = '.$admin['numclient'].' AND attribut =\'voyageur\'';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($dossiers = mysql_fetch_assoc($req2)) { ?>
		<TR>
			<TD STYLE="width:40%; border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3" HEIGHT=16 ALIGN=LEFT >
				<B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Participants</B></TD>
			<TD STYLE="width:60%; border-bottom: 1px solid #b8bec3; border-right: 1px solid #b8bec3" ALIGN=LEFT ><B>: <?php echo $dossiers['participants']; ?></B>
		</tr>
		<?php } //$get_participants ?>
	</TABLE>
