<?php
include "common-libs.php";
include "config.php";
mysql_connect($hostname, $username, $password);
mysql_select_db($database);
?>
<?php
		include "connexion_sql.php";
		include "config_menu.php";
	?>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=6 valign=top> <h1>Musth</h1>
			</td>	
				<form action="getnumproduit.php" method="post" >
			<td class=inputnum><label><a>N° Produit</a></label><input type="text"  name="numproduit" value="<?php echo $admin['numproduit']  ; ?>"  id="numproduit" />
				</form>
			</td>
				<form action="getnumdossier.php" method="post" >
			<td class=inputnum><label><a>N° Dossier</a></label><input type="text"  name="numdossier" value="<?php echo $admin['numdossier']  ; ?>"  id="numdossier" />
				</form>
			</td>
		<TR valign=top colspan="4">
			<TD align=center  valign=top colspan="8">
				<a href="http://www.youtube.com/" target="_blank">			<img src="../musth.co/public/images/favicon/icn.youtube.hover.png" />		</a>
				<a href="https://www.facebook.com/MusthStartup" target="_blank">	<img src="../musth.co/public/images/favicon/icn.facebook.hover.png" />		</a>
				<a href="https://twitter.com/#!/" target="_blank">			<img src="../musth.co/public/images/favicon/icn.twitter.hover.png" />		</a>
				<a href="http://www.linkedin.com/" target="_blank">			<img src="../musth.co/public/images/favicon/icn.linkedin.hover.png" />		</a>
			<a href="https://plus.google.com/u/0/111097159631773304608/posts" target="_blank"><img src="../musth.co/public/images/favicon/icn.google.plus.hover.png" />		</a>
				<a href="http://www.viadeo.com/p/002213881qumpgq8" target="_blank">	<img src="../musth.co/public/images/favicon/icn.viadeo.hover.png"  />		</a>
				<a href="https://branded.me/home" target="_blank">			<img src="../musth.co/public/images/favicon/icn.brandedme.hover.png"  />		</a>
				<a href="https://www.paypal.com/fr/home" target="_blank">		<img src="../musth.co/public/images/favicon/icn.paypal.hover.png" />		</a>
				<a href="https://mail.google.com/mail/u/0/?pli=1#inbox" target="_blank"><img src="../musth.co/public/images/favicon/icn.gmail.hover.png" />		</a>
				<a href="https://www.caisse-epargne.fr" target="_blank">		<img src="../musth.co/public/images/favicon/icn.caisse.epargne.hover.png" />	</a>
				<a href="http://my.ebay.fr/ws/eBayISAPI.dll?MyEbay&gbh=1" target="_blank"><img src="../musth.co/public/images/favicon/icn.ebay.hover.png" />			</a>
				<a href="https://boutique.laposte.fr/affranchissement-a-domicile/mon-timbre-en-ligne/personalisation/selectionner-categorie?categoryCode=NoirEtBlanc" target="_blank">	
													<img src="../musth.co/public/images/favicon/icn.laposte.hover.png" />		</a>
				<a href="http://www.pole-emploi.fr/accueil/" target="_blank" title="3376463U">		<img src="../musth.co/public/images/favicon/icn.pole.emploi.hover.png" />		</a>
				<a href="http://www.leboncoin.fr" target="_blank" title="">		<img src="../musth.co/public/images/favicon/icn.leboncoin.hover.png" />		</a>	
				<a href="https://www.caf.fr/" target="_blank" title="4491268">		<img src="../musth.co/public/images/favicon/icn.caf.hover.png" />			</a>
				<a href="http://french.alibaba.com/" target="_blank" alt="VK">		<img src="../musth.co/public/images/favicon/icn.alibaba.hover.png" />		</a>
				<a href="http://fr.aliexpress.com/" target="_blank" alt="VK">		<img src="../musth.co/public/images/favicon/icn.aliexpress.hover.png" />		</a>
				<a href="https://www.gandi.net/admin/hosting/paas/41675" target="_blank">		<img src="../musth.co/public/images/favicon/icn.gandi.hover.png" />		</a>
				<a href="https://www.gandi.net/?currency=EUR&lang=fr" target="_blank">	<img src="../musth.co/public/images/favicon/icn.gandi.hover.png" />		</a>
				<a href="https://translate.google.fr/#auto/fr/" target="_blank">	<img src="../musth.co/public/images/favicon/icn.googletraduction.hover.png" />	</a>
				<a href="https://1669246.admin.dc0.gpaas.net/" target="_blank">		<img src="../musth.co/public/images/favicon/icn.serveur.hover.png" />		</a>
				<a href="http://localhost/phpmyadmin/" target="_blank">			<img src="../musth.co/public/images/favicon/icn.pma.hover.png" />			</a>
				<a href="https://1669246.admin.dc0.gpaas.net/phpmyadmin/index.php" target="_blank">	<img src="../musth.co/public/images/favicon/icn.pma.hover.png" />			</a>
				<a href="http://livebox" target="_blank">				<img src="../musth.co/public/images/favicon/icn.orange.hover.png" />		</a>
				<a href="http://localhost:631/" target="_blank">			<img src="../musth.co/public/images/favicon/icn.orange.hover.png" />		</a>
				<a href="https://www.cinemadutrefle.com" target="_blank">		<img src="../musth.co/public/images/favicon/icn.trefle.hover.png" />		</a>
				<a href="http://www.urssaf.fr/" target="_blank">			<img src="../musth.co/public/images/favicon/icn.urssaf.hover.png" />		</a>
				<a href="http://www.koudetatondemand.co" target="_blank" >		<img src="../musth.co/public/images/favicon/icn.koudetat.hover.png" />		</a>
				<a href="https://www.thefamily.co/" target="_blank" alt="the family">	<img src="../musth.co/public/images/favicon/icn.thefamily.hover.png" />		</a>
				<a href="http://picclick.fr" target="_blank" alt="">			<img src="../musth.co/public/images/favicon/icn.thefamily.hover.png" />		</a>
				<a href="https://www.twitch.tv/thinkstartup" target="_blank" alt="">			<img src="../musth.co/public/images/favicon/icn.twitch.hover.png" />		</a>
				<!--a href="http://www.tumblr.com/dashboard" target="_blank">				<img src="images/favicon/icn.tumblr.hover.png" />		</a-->
				<!--a href="http://www.ameli.fr/#" target="_blank" title="4491268">			<img src="images/favicon/icn.caf.hover.png" />			</a-->
				<!--a href="http://www.apce.com/" target="_blank" alt="APCE"><img src="../../../images/favicon/icn.apce.hover.png" /></a-->
				<!--a href="http://www.blogger.com/home" target="_blank" alt="BLOGGER">			<img src="images/favicon/icn.blogger.hover.png" />		</a-->
				<a href="https://www.google.com/analytics/web/?authuser=0#home/a51746963w84064915p87104553/" target="_blank">
															<img src="../musth.co/public/images/favicon/icn.google.analytics.hover.png" />	</a>	
				<a href="https://drive.google.com/#my-drive" target="_blank">				<img src="../musth.co/public/images/favicon/icn.google.drive.hover.png" />	</a>
				<a href="https://www.google.com/finance/converter?a=1&from=USD&to=EUR&meta=ei%3DncPYVbqfJ8bDUOrqh5AG" target="_blank">
															<img src="../musth.co/public/images/favicon/icn.devises.hover.png" />		</a>

			</TD>
		</TR>
	</TABLE>
	<br>
	<?php
		//include "test1.php";
		include "config_menu.php";
	?>
<?php
    }
// admin
mysql_close();
?> 



	<?php
	// $NbrCol : le nombre de colonnes
	// $NbrLigne : calcul automatique AVANT affichage
	// -------------------------------------------------------
	$NbrCol = 4;
	// -------------------------------------------------------
	// nombre de cellules à remplir
	$NbreData = count($valeurmenu);

	// -------------------------------------------------------
	// calcul du nombre de lignes
	if (round($NbreData/$NbrCol)!=($NbreData/$NbrCol)) {
		$NbrLigne = round(($NbreData/$NbrCol)+0.5);
	} else {
		$NbrLigne = $NbreData/$NbrCol;
	}
	// -------------------------------------------------------
	// affichage
	if ($NbreData != 0) 
	{
		$k = 0; // indice du tableau
	?>
	<table border=1 cellpadding=0 cellspacing=20 VALIGN=TOP >
	<tbody>
	<?php	for ($i=1; $i<=$NbrLigne; $i++) 
		{ // ligne $i
	?>		
		<tr valign=top>
	<?php		for ($j=1; $j<=$NbrCol; $j++) 
			{ // colonne $j
				if ($k<$NbreData) {
	?>
			<td STYLE="width:15%;" >
				<a href="<?php echo $keymenu[$k];?>"><h4><?php echo $incr[$k] ; ?> <?php echo $valeurmenu[$k] ; ?></h4></a>

			<table border=0 cellpadding=0 cellspacing=0 >
			<?php
			$Liste_ss_menu= $key_ss_menu[$k];
			foreach($Liste_ss_menu as $item){
			?>
			<tr>
				<td  class="facingsm" >
					<a href="<?php echo $keymenu[$k]; ?>/<?php echo $item ; ?>"><?php echo $item ; ?></a>
				</td>
			</tr>
			<?php
			}
			?>
			</table>	
			</td>

	<?php			$k++;
				} else { // cellule vide
	?>
				<td>&nbsp;</td>
	<?php			}
			}
	?>
			</tr>
	<?php	}
	?>
	</tbody>
	</table>
	<?php
	} else { ?>
		pas de données à afficher
	<?php
	}
	?>

