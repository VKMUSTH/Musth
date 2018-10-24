	<!--
	|	6	5	4	3	2	1	0	1	2	3	4	5	6	|	
	+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+
	|				   				   	        				|			
	|	_______   _______    __          __     _________________    _____________      ____         ____     	|
	|      |       \ /	 |  |  |  	|  | 	|		|    |           |      |  |         |  |       |   
	|      |     _  V  _	 |  |  |  	|  | 	|     __________|    |___     ___|      |  |         |  |       |   
	|      |    | \   / |	 |  |  |  	|  | 	|     |__________       |     |         |  |_________|  |       |   
	|      |    |  \ /  |	 |  |  |  	|  | 	|________	|       |     |         |   _________   |       |   
	|      |    |	V   |	 |  |  |________|  |   	_________|	|	|     |         |  |         |  |       |   
	|      |    |	    |	 |  |    	   | 	|		|       |     |         |  |         |  |       |   
	|      |____|	    |____|  |______________| 	|_______________|       |_____|         |__|         |__|       |   
	|														|
	+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+-------+
	-->
	<?php
	/****************************** MENU ***************************************************************************/
	$keymenu=array('nacre','rd','growth','produit','achats','dossier_financier','communication','operations')	;
	$valeurmenu=array('NACRE','R&D','GROWTH','PRODUIT','ACHATS','DOSSIER FINANCIER','COMMUNICATION','OPÉRATIONS')	;

	$w = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
	$incr =array(''.$w.'I.',''.$w.'II.',''.$w.'III.',''.$w.'IV.',''.$w.'V.',''.$w.'VI.',''.$w.'VII.',''.$w.'VIII.')	;

	//$key_ss_menu=array($key_nacre,$key_rd, $key_growth,$key_produit,$key_achats,$key_dossierfinancier,$key_communication,$key_operations); 
	//$valeur_ss_menu=array($valeur_nacre,$valeur_rd, $valeur_growth,$valeur_produit,$valeur_achats,$valeur_dossierfinancier,$valeur_communication,$valeur_operations); 

	/****************************** NACRE **************************************************************************/
	$key_nacre=array('memorandum','differer','swkd','planning','organisations','linux','rpi','gouverneur')		;
	$valeur_nacre=array('MEMORANDUM','DIFFÉRER','SWKD','PLANNING','ORGANISATIONS','LINUX','RASPBERRY','GOUVERNEUR')	;
	/****************************** R&D ****************************************************************************/
	$key_rd=array('clients','canvas','marche','landing_page','localisation')					;
	$valeur_rd=array('CLIENTS','CANVAS','MARCHÉ','LANDING PAGE','localisation')					;
	/****************************** GROWTH *************************************************************************/
	$key_growth=array('acquisition','activation','revenu','recommandation','retention','revtecs')			;
	$valeur_growth=array('ACQUISITION','ACTIVATION','REVENU','RECOMMANDATION','RETENTION','REVTECS')		;

	$key_prospects=array('ebay','linkedin','viadeo','twitter','brandedme','googleplus')				;
	$valeur_prospects=array('EBAY','LINKEDIN','VIADEO','TWITTER','BRANDED ME','GOOGLE +')				;

	$key_actions_de_prospection=array('actualites','fichier_client','emailing')					;
	$valeur_actions_de_prospection=array('ACTUALITÉS','FICHIER CLIENT','EMAILING')					;
	/****************************** PRODUIT ************************************************************************/
	$key_produit=array('transport','hebergement','restauration','visite','activite','programme','video','formalites')	;
	$valeur_produit=array('TRANSPORT','HEBERGEMENT','RESTAURATION','VISITE','ACTIVITÉ','PROGRAMME','VIDEO','FORMALITES')	;
	/****************************** MARCHÉ *************************************************************************/
	//$key_marche=array('donnees_primaires','pdv','contraintes','evolution','concurrence','reussite','partenariats')	;
	//$valeur_marche=array('DONNÉES PRIMAIRES','PDV','CONTRAINTES','PDM - ÉVOLUTION','CONCURRENCE','RÉUSSITE','PARTENARIATS')	;
	/****************************** ACHATS *************************************************************************/
	$key_achats=array('nomenclature')										;
	$valeur_achats=array('NOMENCLATURE')										;
	/****************************** DOSSIER FINANCIER **************************************************************/
	$key_dossierfinancier=array('tresorerie','previsions','ventes')							;
	$valeur_dossierfinancier=array('TRÉSORERIE','PRÉVISIONS','VENTES')						;
	/****************************** COMMUNICATION ******************************************************************/
	$key_communication=array('contact','courrier','actualites','newsletter','dimensionner_promotion')		;
	$valeur_communication=array('CONTACT','COURRIER','ACTUALITES','NEWSLETTER','DIMENSIONNER UNE PROMOTION')	;
	/****************************** OPÉRATIONS *********************************************************************/
	$key_operations=array('devis','bi','vouchers','sav','voyageurs','annulation','c_d_v','facture')			;
	$valeur_operations=array('DEVIS','BI','VOUCHER','SAV','VOYAGEURS','ANNULATION','CDV','FACTURE')			;
	/****************************** FOOTER *************************************************************************/
	$key_footer=array('www.musth.eu','plan-du-site','actualites')							;
	$valeur_footer=array('ACCUEIL','PLAN DU SITE','ACTUALITES')							;

	?>
