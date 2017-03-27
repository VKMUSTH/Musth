	<?php include "connexion_sql.php"; ?>
	<?php include "config_menu.php"; ?>
	<?php include "config_sous_menu.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td colspan=6 valign=top> <h1>Musth</h1>
			</td>	
				<form action="../get_numproduit.php" method="post" >
			<td class=inputnum><label><a>N° Produit</a></label><input type="text"  name="numproduit" value="<?php echo $admin['numproduit']  ; ?>"  id="numproduit" />
				</form>
			</td>
				<form action="../get_numdossier.php" method="post" >
			<td class=inputnum><label><a>N° Dossier</a></label><input type="text"  name="numdossier" value="<?php echo $admin['numdossier']  ; ?>"  id="numdossier" />
				</form>
			</td>
		<TR valign=top colspan="4">
			<TD align=center  valign=top colspan="8">
	<a href="http://www.youtube.com/" target="_blank">		<img src="https://cloud.githubusercontent.com/assets/22053566/23475676/8b7903bc-feb8-11e6-9789-7ea231efa7df.png" />	</a>
	<a href="https://www.facebook.com/MusthStartup" target="_blank"><img src="https://cloud.githubusercontent.com/assets/22053566/23475647/8ae48a16-feb8-11e6-9823-0973d50e4dbb.png" />	</a>
	<a href="https://twitter.com/#!/" target="_blank">		<img src="https://cloud.githubusercontent.com/assets/22053566/23475672/8b6012bc-feb8-11e6-8659-cd3fdf42f998.png" />	</a>
	<a href="http://www.linkedin.com/" target="_blank">		<img src="https://cloud.githubusercontent.com/assets/22053566/23475658/8b1f501a-feb8-11e6-89c9-c6858e4de932.png" />	</a>
	<a href="https://plus.google.com/u/0/111097159631773304608/posts" target="_blank">
									<img src="https://cloud.githubusercontent.com/assets/22053566/23475653/8b07de26-feb8-11e6-9a6a-9a25f5ebaa1f.png" />	</a>
	<a href="https://adwords.google.com/cm/CampaignMgmt?authuser=0&__u=5464335200&__c=3972927680#r.ONLINE&app=cm" target="_blank">
									<img src="https://cloud.githubusercontent.com/assets/22053566/24378530/8d763bb8-1343-11e7-9bff-3c762655c1d4.png"  />	</a>
	<a href="http://www.viadeo.com/p/002213881qumpgq8" target="_blank"><img src="https://cloud.githubusercontent.com/assets/22053566/23475674/8b66f460-feb8-11e6-93c5-7a92b9605ec0.png"  />	</a>
	<a href="https://github.com/VKMUSTH/" target="_blank">		<img src="https://cloud.githubusercontent.com/assets/22053566/24378543/98ca5b66-1343-11e7-85e2-8a00dde9ffa2.png"  />	</a>
	<a href="https://www.paypal.com/fr/home" target="_blank">	<img src="https://cloud.githubusercontent.com/assets/22053566/23475662/8b2f6aea-feb8-11e6-9002-8b4e6ce494e0.png" />	</a>
	<a href="https://mail.google.com/mail/u/0/?pli=1#inbox" target="_blank"><img src="https://cloud.githubusercontent.com/assets/22053566/23475650/8aeaa018-feb8-11e6-9f8b-666e5d6f494a.png" /></a>
	<a href="https://www.caisse-epargne.fr" target="_blank">	<img src="https://cloud.githubusercontent.com/assets/22053566/23475645/8abfeb0c-feb8-11e6-9596-52dbe8bbbbcc.png" />	</a>
	<a href="http://my.ebay.fr/ws/eBayISAPI.dll?MyEbay&gbh=1" target="_blank"><img src="https://cloud.githubusercontent.com/assets/22053566/23475649/8ae9d2a0-feb8-11e6-8ac9-1800cf99018d.png" /></a>
	<a href="https://boutique.laposte.fr/affranchissement-a-domicile/mon-timbre-en-ligne/personalisation/selectionner-categorie?categoryCode=NoirEtBlanc" target="_blank">	
									<img src="https://cloud.githubusercontent.com/assets/22053566/23475657/8b11f6cc-feb8-11e6-83ef-4d5b1a7c390b.png" />	</a>
	<a href="http://www.pole-emploi.fr/accueil/" target="_blank" title="3376463U">
									<img src="https://cloud.githubusercontent.com/assets/22053566/23475664/8b3b3bae-feb8-11e6-875a-95aa46a0caae.png" />	</a>
	<a href="http://www.leboncoin.fr" target="_blank" title="">	<img src="https://cloud.githubusercontent.com/assets/22053566/23475659/8b200e10-feb8-11e6-82bb-9d8fd6c5e0fb.png" />	</a>	
	<a href="https://www.caf.fr/" target="_blank" title="4491268">	<img src="https://cloud.githubusercontent.com/assets/22053566/23475643/8abcf5be-feb8-11e6-8ca5-4b9e125aef6b.png" />	</a>
	<a href="http://french.alibaba.com/" target="_blank" alt="VK">	<img src="https://cloud.githubusercontent.com/assets/22053566/23475642/8ab995c2-feb8-11e6-8800-3b42fa6cf5ab.png" />	</a>
	<a href="http://fr.aliexpress.com/" target="_blank" alt="VK">	<img src="https://cloud.githubusercontent.com/assets/22053566/23475641/8ab68c4c-feb8-11e6-81ec-327fdbfafecd.png" />	</a>
	<a href="https://www.gandi.net/admin/hosting/paas/41675" target="_blank">
									<img src="https://cloud.githubusercontent.com/assets/22053566/23475648/8ae83e54-feb8-11e6-8d32-aaa620376fbf.png" />	</a>
	<a href="https://www.gandi.net/?currency=EUR&lang=fr" target="_blank">	
									<img src="https://cloud.githubusercontent.com/assets/22053566/23475648/8ae83e54-feb8-11e6-8d32-aaa620376fbf.png" />	</a>
	<a href="https://translate.google.fr/#auto/fr/" target="_blank"><img src="https://cloud.githubusercontent.com/assets/22053566/23475656/8b0e963a-feb8-11e6-973a-f78e001a8594.png" />	</a>
	<a href="https://1669246.admin.dc0.gpaas.net/" target="_blank">	<img src="https://cloud.githubusercontent.com/assets/22053566/23475665/8b44996a-feb8-11e6-9db4-6a83cdae2be1.png" />	</a>
	<a href="http://localhost/phpmyadmin/" target="_blank">		<img src="https://cloud.githubusercontent.com/assets/22053566/23475663/8b3751f6-feb8-11e6-835c-59155533a9b3.png" />	</a>
	<a href="https://1669246.admin.dc0.gpaas.net/phpmyadmin/index.php" target="_blank">
									<img src="https://cloud.githubusercontent.com/assets/22053566/23475663/8b3751f6-feb8-11e6-835c-59155533a9b3.png" />	</a>
	<a href="http://livebox" target="_blank">			<img src="https://cloud.githubusercontent.com/assets/22053566/23475661/8b2bc1f6-feb8-11e6-8d94-b97c49e115cc.png" />	</a>
	<a href="http://localhost:631/" target="_blank">		<img src="https://cloud.githubusercontent.com/assets/22053566/23475661/8b2bc1f6-feb8-11e6-8d94-b97c49e115cc.png" />	</a>
	<a href="https://www.cinemadutrefle.com" target="_blank">	<img src="https://cloud.githubusercontent.com/assets/22053566/23475669/8b52beaa-feb8-11e6-8337-a78427736464.png" />	</a>
				<a href="http://www.urssaf.fr/" target="_blank">			<img src="../musth.co/public/images/favicon/icn.urssaf.hover.png" />		</a>
	<a href="http://www.koudetatondemand.co" target="_blank" >	<img src="https://cloud.githubusercontent.com/assets/22053566/23475654/8b0d393e-feb8-11e6-98cf-a7844ccaa7a2.png" />	</a>
	<a href="https://www.thefamily.co/" target="_blank" alt="the family"><img src="https://cloud.githubusercontent.com/assets/22053566/23475666/8b47b2bc-feb8-11e6-8f55-69e337679f5d.png" /></a>
	<a href="http://picclick.fr" target="_blank" alt="">		<img src="https://cloud.githubusercontent.com/assets/22053566/24378547/9be9522a-1343-11e7-88a6-840a115d4af6.png" />	</a>
				<!--a href="http://www.ameli.fr/#" target="_blank" title="4491268">			<img src="images/favicon/icn.caf.hover.png" />			</a-->
	<a href="https://www.google.com/analytics/web/?authuser=0#home/a51746963w84064915p87104553/" target="_blank">
									<img src="https://cloud.githubusercontent.com/assets/22053566/23475651/8aef6c42-feb8-11e6-8f45-bfbd9145045a.png" />	</a>	
	<a href="https://drive.google.com/#my-drive" target="_blank">	<img src="https://cloud.githubusercontent.com/assets/22053566/23475652/8af322ce-feb8-11e6-8f16-30e87ecd2f4a.png" />	</a>
	<a href="https://www.google.com/finance/converter?a=1&from=USD&to=EUR&meta=ei%3DncPYVbqfJ8bDUOrqh5AG" target="_blank">
									<img src="https://cloud.githubusercontent.com/assets/22053566/23475646/8ac25022-feb8-11e6-92b3-3e975fa368f7.png" />	</a>

			</TD>
		</TR>
	</TABLE>
	<br>


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
				<a href="../<?php echo $keymenu[$k];?>"><h4><?php echo $incr[$k] ; ?> <?php echo $valeurmenu[$k] ; ?></h4></a>

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





	<?php     } mysql_close(); ?> 
