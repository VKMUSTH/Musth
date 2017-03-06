			<tr class="niv3">
				<td><b>CHARGES</b>
			<?php
			$sql1 = 'SELECT
				ROUND(SUM(debit),2) as charges01,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 

					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 01  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'    
				';
			$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
			while($charges01 = mysql_fetch_assoc($req1)) { ?>
			<td><b><?php echo $charges01['charges01']  ; ?></b>
			<?php } //$get_charges01 ?>

			<?php
			$sql2 = 'SELECT
				ROUND(SUM(debit),2) as charges02,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 

					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 02  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
				AND attribut <>\'inv\'   
				';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($charges02 = mysql_fetch_assoc($req2)) { ?>
			<td><b><?php echo $charges02['charges02']  ; ?></b>
			<?php } //$get_charges02 ?>

			<?php
			$sql3 = 'SELECT
				ROUND(SUM(debit),2) as charges03,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 

					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 03  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
				AND attribut <>\'inv\'   
				';
			$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
			while($charges03 = mysql_fetch_assoc($req3)) { ?>
			<td><b><?php echo $charges03['charges03']  ; ?></b>
			<?php } //$get_charges03 ?>

			<?php
			$sql4 = 'SELECT
				ROUND(SUM(debit),2) as charges04,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 

					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 04  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'     
				';
			$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
			while($charges04 = mysql_fetch_assoc($req4)) { ?>
			<td><b><?php echo $charges04['charges04']  ; ?></b>
			<?php } //$get_charges04 ?>

			<?php
			$sql5 = 'SELECT
				ROUND(SUM(debit),2) as charges05,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 

					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 05  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error());
			while($charges05 = mysql_fetch_assoc($req5)) { ?>
			<td><b><?php echo $charges05['charges05']  ; ?></b>
			<?php } //$get_charges05 ?>

			<?php
			$sql6 = 'SELECT
				ROUND(SUM(debit),2) as charges06,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 

					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 06  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error());
			while($charges06 = mysql_fetch_assoc($req6)) { ?>
			<td><b><?php echo $charges06['charges06']  ; ?></b>
			<?php } //$get_charges06 ?>

			<?php
			$sql7 = 'SELECT
				ROUND(SUM(debit),2) as charges07,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 

					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 07
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error());
			while($charges07 = mysql_fetch_assoc($req7)) { ?>
			<td><b><?php echo $charges07['charges07']  ; ?></b>
			<?php } //$get_charges07 ?>

			<?php
			$sql8 = 'SELECT
				ROUND(SUM(debit),2) as charges08,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 

					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 08
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error());
			while($charges08 = mysql_fetch_assoc($req8)) { ?>
			<td><b><?php echo $charges08['charges08']  ; ?></b>
			<?php } //$get_charges08 ?>

			<?php
			$sql9 = 'SELECT
				ROUND(SUM(debit),2) as charges09,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 09
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error());
			while($charges09 = mysql_fetch_assoc($req9)) { ?>
			<td><b><?php echo $charges09['charges09']  ; ?></b>
			<?php } //$get_charges09 ?>

			<?php
			$sql10 = 'SELECT
				ROUND(SUM(debit),2) as charges10,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 10  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req10 = mysql_query($sql10) or die('Erreur SQL !<br>'.$sql10.'<br>'.mysql_error());
			while($charges10 = mysql_fetch_assoc($req10)) { ?>
			<td><b><?php echo $charges10['charges10']  ; ?></b>
			<?php } //$get_charges10 ?>

			<?php
			$sql11 = 'SELECT
				ROUND(SUM(debit),2) as charges11,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 11  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req11 = mysql_query($sql11) or die('Erreur SQL !<br>'.$sql11.'<br>'.mysql_error());
			while($charges11 = mysql_fetch_assoc($req11)) { ?>
			<td><b><?php echo $charges11['charges11']  ; ?></b>
			<?php } //$get_charges11 ?>

			<?php
			$sql12 = 'SELECT
				ROUND(SUM(debit),2) as charges12,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					 FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 12  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req12 = mysql_query($sql12) or die('Erreur SQL !<br>'.$sql12.'<br>'.mysql_error());
			while($charges12 = mysql_fetch_assoc($req12)) { ?>
			<td><b><?php echo $charges12['charges12']  ; ?></b>
			<?php } //$get_charges12 ?>
