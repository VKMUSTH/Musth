		<tr class="niv3">
			<td STYLE="width:10%; "><b>PRODUITS</b>
			<?php
			$sql1 = 'SELECT 
				ROUND(SUM(credit),2) as produits01,
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
			while($produits01 = mysql_fetch_assoc($req1)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits01['produits01']  ; ?></b>
			<?php } //$get_produits01?>

			<?php
			$sql2 = 'SELECT
				ROUND(SUM(credit),2) as produits02,
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
			while($produits02 = mysql_fetch_assoc($req2)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits02['produits02']  ; ?></b>
			<?php } //$get_produits02?>

			<?php
			$sql3 = 'SELECT
				ROUND(SUM(credit),2) as produits03,
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
			while($produits03 = mysql_fetch_assoc($req3)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits03['produits03']  ; ?></b>
			<?php } //$get_produits03 ?>

			<?php
			$sql4 = 'SELECT
				ROUND(SUM(credit),2) as produits04,
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
			while($produits04 = mysql_fetch_assoc($req4)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits04['produits04']  ; ?></b>
			<?php } //$get_produits04 ?>

			<?php
			$sql5 = 'SELECT
				ROUND(SUM(credit),2) as produits05,
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
			while($produits05 = mysql_fetch_assoc($req5)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits05['produits05']  ; ?></b>
			<?php } //$get_produits05 ?>

			<?php
			$sql6 = 'SELECT
				ROUND(SUM(credit),2) as produits06,
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
			while($produits06 = mysql_fetch_assoc($req6)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits06['produits06']  ; ?></b>
			<?php } //$get_produits06 ?>

			<?php
			$sql7 = 'SELECT
				ROUND(SUM(credit),2) as produits07,
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
			while($produits07 = mysql_fetch_assoc($req7)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits07['produits07']  ; ?></b>
			<?php } //$get_produits07 ?>

			<?php
			$sql8 = 'SELECT
				ROUND(SUM(credit),2) as produits08,
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
			while($produits08 = mysql_fetch_assoc($req8)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits08['produits08']  ; ?></b>
			<?php } //$get_produits08 ?>

			<?php
			$sql9 = 'SELECT
				ROUND(SUM(credit),2) as produits09,
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
			while($produits09 = mysql_fetch_assoc($req9)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits09['produits09']  ; ?></b>
			<?php } //$get_produits09 ?>

			<?php
			$sql10 = 'SELECT
				ROUND(SUM(credit),2) as produits10,
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
			while($produits10 = mysql_fetch_assoc($req10)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits10['produits10']  ; ?></b>
			<?php } //$get_produits10 ?>

			<?php
			$sql11 = 'SELECT
				ROUND(SUM(credit),2) as produits11,
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
			while($produits11 = mysql_fetch_assoc($req11)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits11['produits11']  ; ?></b>
			<?php } //$get_produits11 ?>

			<?php
			$sql12 = 'SELECT
				ROUND(SUM(credit),2) as produits12,
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
			while($produits12 = mysql_fetch_assoc($req12)) { ?>
			<td STYLE="width:7.5%; "><b><?php echo $produits12['produits12']  ; ?></b>
			<?php } //$get_produits12 ?>
