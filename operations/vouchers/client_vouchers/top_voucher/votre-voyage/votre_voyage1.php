	<!--VOTRE VOYAGE -->
	<table border=0 cellpadding=0 cellspacing=0 >
			<TR BGCOLOR="#d8dfea"  ALIGN=LEFT>
				<TD STYLE="width:40%" ><a href="/distribution/dossiers/index.php"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VOTRE VOYAGE</B></a></TD>
				<TD STYLE="width:60%" ><B>: <?php echo $produit['produit']; ?></B>
				</TD>				
			</TR>

			<TR BGCOLOR="#eff2f7" ALIGN=LEFT>
				<TD STYLE="width:40%; border-left: 1px solid #b8bec3" HEIGHT=16 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>Dates</B></TD>
				<TD STYLE="width:60%; border-right: 1px solid #b8bec3" ><B>: du <?php echo $dossiers['date_depart']; ?> au <?php echo $dossiers['date_retour']; ?></B></TD>

			</TR>

		<TR>
			<TD STYLE="width:40%; border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3" HEIGHT=16 ALIGN=LEFT >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>Participants</B></TD>
			<TD STYLE="width:60%; border-bottom: 1px solid #b8bec3; border-right: 1px solid #b8bec3" ALIGN=LEFT ><B>: <?php echo $dossiers['participants']; ?></B>
	</TABLE>
