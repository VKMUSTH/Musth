	<?php require "../../../connexion_sql.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<br>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD COLSPAN=16 HEIGHT=16 ALIGN=CENTER VALIGN=MIDDLE >		<a href="../client/saisie_acomptes"><B>ACOMPTES</B></a>							</TD>
		</TR>
		<TR class="niv2" ALIGN=LEFT>
			<TD>								<B>Date</B>												</TD>
			<TD>								<B>N° Pièce</B>												</TD>
			<TD>								<B>Mode règlement</B>											</TD>
			<TD>								<B>Montant en €</B>											</TD>
			<TD STYLE="width:50%" >						<B>Nom – prénom ou raison sociale</B>									</TD>
		</TR>
			<?php
			$sql1 = 'SELECT * FROM livre_journal WHERE numclient = '.$admin['numclient'].' AND attribut = \'aco\'';
			$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
			while($acomptes = mysql_fetch_assoc($req1)) { ?>
		<TR ALIGN=LEFT class="niv3">
			<TD STYLE="border-left: 1px solid #b8bec3"  >			<?php echo $acomptes['lj_date']; ?>		
			<TD STYLE="" >							<?php echo $acomptes['numpiece']; ?>	
			<TD STYLE="" >							<?php echo $acomptes['mode_reglement']; ?>	
			<TD STYLE="" >							<?php echo $acomptes['credit']; ?>		
			<TD STYLE="border-right: 1px solid #b8bec3" >			<?php echo $acomptes['designation']; ?>
		</TR>

			<?php } //$get_acomptes ?>
		<TR>
			<TD COLSPAN=5>							<div id="filet"></div>											</TD>	
		</TR>	
		<TR class="niv3">
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3" HEIGHT=16  >	<BR>									</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3" >							<BR>									</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3" >							<B>Solde restant : </B>							</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3" ><b><?php echo $solde['solde']  ; ?> € </b>
			<TD STYLE="border-bottom: 1px solid #b8bec3" >							<BR>									</TD>
			<TD STYLE="border-bottom: 1px solid #b8bec3; border-right: 1px solid #b8bec3" >			<BR>									</TD>
		</TR>
	</TABLE>
	<?php } mysql_close(); ?>
