			<tr class="niv2">
				<td><b>SOLDE</b>
			<?php
			$sql1 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde01,
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 1  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
			while($solde01 = mysql_fetch_assoc($req1)) { ?>
			<td><b><?php echo $solde01['solde01']  ; ?></b>
			<?php } //$get_solde01 ?>

			<?php
			$sql2 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde02, 
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 

					FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 2  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
			while($solde02 = mysql_fetch_assoc($req2)) { ?>
			<td><b><?php echo $solde02['solde02']  ; ?></b>
			<?php } //$get_solde02 ?>

			<?php
			$sql3 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde03, 
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 3  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
			while($solde03 = mysql_fetch_assoc($req3)) { ?>
			<td><b><?php echo $solde03['solde03']  ; ?></b>
			<?php } //$get_solde03 ?>

			<?php
			$sql4 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde04, 
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 4  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . ' 
				AND attribut <>\'inv\'   
				';
			$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error());
			while($solde04 = mysql_fetch_assoc($req4)) { ?>
			<td><b><?php echo $solde04['solde04']  ; ?></b>
			<?php } //$get_solde04 ?>

			<?php
			$sql5 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde05, 
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 5  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req5 = mysql_query($sql5) or die('Erreur SQL !<br>'.$sql5.'<br>'.mysql_error());
			while($solde05 = mysql_fetch_assoc($req5)) { ?>
			<td><b><?php echo $solde05['solde05']  ; ?></b>
			<?php } //$get_solde05 ?>

			<?php
			$sql6 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde06, 
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 6  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req6 = mysql_query($sql6) or die('Erreur SQL !<br>'.$sql6.'<br>'.mysql_error());
			while($solde06 = mysql_fetch_assoc($req6)) { ?>
			<td><b><?php echo $solde06['solde06']  ; ?></b>
			<?php } //$get_solde06 ?>

			<?php
			$sql7 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde07, 
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 7  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error());
			while($solde07 = mysql_fetch_assoc($req7)) { ?>
			<td><b><?php echo $solde07['solde07']  ; ?></b>
			<?php } //$get_solde07 ?>

			<?php
			$sql8 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde08, 
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 8  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error());
			while($solde08 = mysql_fetch_assoc($req8)) { ?>
			<td><b><?php echo $solde08['solde08']  ; ?></b>
			<?php } //$get_solde08 ?>

			<?php
			$sql9 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde09, 
				MONTH(lj_date) AS mois,
				YEAR(lj_date) AS annee 
					FROM livre_journal 
				WHERE etat = \'prevision\'
				AND numclient = ' .$admin['numclient'] . ' 
				AND MONTH(lj_date) = 9  
				AND YEAR(lj_date) = ' .$admin['annee_en_cours'] . '
				AND attribut <>\'inv\'   
				';
			$req9 = mysql_query($sql9) or die('Erreur SQL !<br>'.$sql9.'<br>'.mysql_error());
			while($solde9 = mysql_fetch_assoc($req9)) { ?>
			<td><b><?php echo $solde09['solde09']  ; ?></b>
			<?php } //$get_solde09 ?>

			<?php
			$sql10 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde10, 
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
			while($solde10 = mysql_fetch_assoc($req10)) { ?>
			<td><b><?php echo $solde10['solde10']  ; ?></b>
			<?php } //$get_solde10 ?>

			<?php
			$sql11 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde11, 
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
			while($solde11 = mysql_fetch_assoc($req11)) { ?>
			<td><b><?php echo $solde11['solde11']  ; ?></b>
			<?php } //$get_solde11 ?>

			<?php
			$sql12 = 'SELECT
				ROUND(SUM(credit-debit),2) as solde12, 
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
			while($solde12 = mysql_fetch_assoc($req12)) { ?>
			<td><b><?php echo $solde12['solde12']  ; ?></b>
			<?php } //$get_solde12 ?>
