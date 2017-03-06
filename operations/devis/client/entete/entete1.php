	<!--ENTETE1 -->
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR>
			<TD>
				<B>
				<br>Destinataire
				<br>Adresse
				<br>
				<br>Email
				<br>Mobile

				</B>
	<!--ENTETE2-->
			<TD>
				<br>: <?php echo $contacts['civilite']; ?> <?php echo $contacts['nom']; ?> <?php echo $contacts['prenom']; ?>
				<br>: <?php echo $contacts['adresse']; ?>
				<br>: <?php echo $contacts['code_postal']; ?> <?php echo $contacts['ville']; ?>
				<br>: <?php echo $contacts['email']; ?>
				<br>: <?php echo $contacts['tel_mobile']; ?>
			<TD VALIGN=TOP>
				<B>
				<br>Votre Conseiller
				<br>Tel
				<br>Email
				<br>Adresse
				</B>
			<TD VALIGN=TOP>
				<br>: KEMPF Valéry
				<br>: 06 72 97 73 00
				<br>: valerykempf@gmail.com
				<br>: 9b Rue de Wissembourg 67210 OBERNAI
	<!--ENTETE3-->
		<TR>
			<TD colspan=4 style="text-align:right; ">Obernai, le : <span style='color:#8aa;'><?php echo $client['date_devis']; ?></span>
		<TR>
			<TD COLSPAN=4 ><a href="../client/texte/modifier"><h1 style="text-align:center;">Devis client<h1></a>
			</TD>
		</TR>
	</table>
