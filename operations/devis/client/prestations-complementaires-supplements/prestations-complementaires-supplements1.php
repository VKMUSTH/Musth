	<!--PRESTATIONS COMPLÉMENTAIRES ET SUPPLÉMENTS 1-->

	<table border=0 cellpadding=0 cellspacing=0 >
		<TR STYLE="width:100%" BGCOLOR="#d8dfea"><TD  ALIGN=LEFT VALIGN=MIDDLE ><a href=""><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOS EXTENSIONS EN SUPPLÉMENT DE PRIX :</B></a>




					<?php
					//$sql1 = 'SELECT * FROM extensions WHERE numdossier = '.$admin['numdossier'].' ';
					//$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
					//while($extension = mysql_fetch_assoc($req1)) { ?>

	<!--PRESTATIONS COMPLÉMENTAIRES ET SUPPLÉMENTS-->

		<TR BGCOLOR="#eff2f7"><TD STYLE="border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3" HEIGHT=16 ALIGN=LEFT ><?php echo $extension['intitule']  ; ?> :</TD></TR>
		<TR><TD STYLE="border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3" HEIGHT=16 ALIGN=LEFT ><?php echo $extension['libelle']  ; ?>
					<?php //} //$getextension ?> 


	<!--PRESTATIONS COMPLÉMENTAIRES ET SUPPLÉMENTS 3-->
		<TR><TD STYLE="border-bottom: 1px solid #b8bec3; border-left: 1px solid #b8bec3; border-right: 1px solid #b8bec3" HEIGHT=16 ALIGN=LEFT ><B></B></TD></TR>

	</table>
