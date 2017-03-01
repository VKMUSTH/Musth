
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

	$key_ss_menu=array($key_nacre,$key_rd, $key_commercialisation,$key_produit,$key_achats,$key_dossierfinancier,$key_communication,$key_operations); 
	$valeur_ss_menu=array($valeur_nacre,$valeur_rd, $valeur_commercialisation,$valeur_produit,$valeur_achats,$valeur_dossierfinancier,$valeur_communication,$valeur_operations); 

	/****************************** NACRE **************************************************************************/
	$key_nacre=array('operations','developpement','growth','kpi','formalites','memorandum')				;
	$valeur_nacre=array('OPÉRATIONS','DÉVELOPPEMENT','GROWTH','KPI','FORMALITÉS','MEMORANDUM')			;
	/****************************** R&D ****************************************************************************/
	$key_rd=array('marche','landing_page','programme','descriptif_long','video','formalites')			;
	$valeur_rd=array('MARCHÉ','LANDING PAGE','PROGRAMME','DESCRIPTIF','VIDEO','FORMALITES')				;
	/****************************** GROWTH *************************************************************************/
	$key_commercialisation=array('acquisition','activation','revenu','recommandation','retention')			;
	$valeur_commercialisation=array('ACQUISITION','ACTIVATION','REVENU','RECOMMANDATION','RETENTION')		;

	$key_prospects=array('ebay','linkedin','viadeo','twitter','brandedme','googleplus')				;
	$valeur_prospects=array('EBAY','LINKEDIN','VIADEO','TWITTER','BRANDED ME','GOOGLE +')				;

	$key_actions_de_prospection=array('actualites','fichier_client','emailing')					;
	$valeur_actions_de_prospection=array('ACTUALITÉS','FICHIER CLIENT','EMAILING')					;
	/****************************** PRODUIT ************************************************************************/
	$key_produit=array('transport','hebergement','restauration','visite','activite')				;
	$valeur_produit=array('TRANSPORT','HEBERGEMENT','RESTAURATION','VISITE','ACTIVITÉ')				;
	/****************************** MARCHÉ *************************************************************************/
	$key_marche=array('slides','donnees_primaires','pdv','contraintes','evolution','concurrence','reussite','partenariats')					;
	$valeur_marche=array('SLIDES','DONNÉES PRIMAIRES','PDV','CONTRAINTES QUALITE','PDM - ÉVOLUTION','CONCURRENCE','PTS FORTS PTS FAIBLES','PARTENARIATS')	;
	/****************************** ACHATS *************************************************************************/
	$key_achats=array('fournisseurs','items','produits','options','livre_journal','reservations','nomenclature')	;
	$valeur_achats=array('FOURNISSEURS','ITEMS','PRODUITS','OPTIONS','LIVRE JOURNAL','RESERVATIONS','NOMENCLATURE')	;
	/****************************** DOSSIER FINANCIER **************************************************************/
	$key_dossierfinancier=array('ventes','tresorerie','previsions','plan_comptable','transferts')			;
	$valeur_dossierfinancier=array('VENTES','TRÉSORERIE','PRÉVISIONS DE TRÉSORERIE','PLAN COMPTABLE','TRANSFERTS')	;
	/****************************** COMMUNICATION ******************************************************************/
	$key_communication=array('contact','courrier','newsletter')							;
	$valeur_communication=array('CONTACT','COURRIER','NEWSLETTER')							;
	/****************************** OPÉRATIONS *********************************************************************/
	$key_operations=array('devis','voyageurs','bi','commandes','vouchers','sav','annulation','c_d_v','facture')	;
	$valeur_operations=array('DEVIS','VOYAGEURS','BI','COMMANDES','VOUCHER','SAV','ANNULATION','CDV','FACTURE')	;
	/****************************** FOOTER *************************************************************************/
	$key_footer=array('www.musth.eu','plan-du-site','actualites')							;
	$valeur_footer=array('ACCUEIL','PLAN DU SITE','ACTUALITES')							;
	/****************************** NACRE **************************************************************************/
	//	$menu				['nacre']			=	"NACRE"				;
	//$sousmenu_nacre			['operations']			=	"OPÉRATIONS"			;
	//$sousmenu_nacre			['developpement']		=	"DÉVELOPPEMENT"			;
	//$sousmenu_nacre			['growth']			=	"GROWTH"			;
	//$sousmenu_nacre			['education']			=		"EDUCATION"		;
	//$sousmenu_nacre			['chiffres_cles']		=		"KPI"			;
	//$sousmenu_nacre			['appli']			=		"APPLI"			;
	//$sousmenu_nacre			['rh']				=		"RH"			;
	//$sousmenu_nacre			['marche']			=		"MARCHÉ"		;
	//$sousmenu_nacre			['formalites']			=		"FORMALITÉS"		;
	/****************************** R&D ****************************************************************************/
	//	$menu				['r&d']				=	"R&D"				;
	//$sousmenu_rd			['landing_page']		=		"LANDING PAGE"			;
	//$sousmenu_rd			['programme']			=		"PROGRAMME"			;
	//$sousmenu_rd			['descriptif_long']		=		"DESCRIPTIF"			;
	//$sousmenu_rd			['video']			=		"VIDEO"				;
	/****************************** GROWTH *************************************************************************/
	//	$menu				['growth']			=	"GROWTH"			;
	//$sousmenu_commercialisation	['acquisition']			=		"ACQUISITION"			;
	//$sousmenu_commercialisation	['activation']			=		"ACTIVATION"			;
	//$sousmenu_commercialisation	['revenu']			=		"REVENU"			;
	//$sousmenu_commercialisation	['recommandation']		=		"RECOMMANDATION"		;
	//$sousmenu_commercialisation	['retention']			=		"RETENTION"			;
	//$sousmenu_prospects			['ebay']		=		"EBAY"				;
	//$sousmenu_prospects			['linkedin']		=		"LINKEDIN"			;
	//$sousmenu_prospects			['viadeo']		=		"VIADEO"			;
	//$sousmenu_prospects			['twitter']		=		"TWITTER"			;
	//$sousmenu_prospects			['brandedme']		=		"BRANDED ME"			;
	//$sousmenu_prospects			['googleplus']		=		"GOOGLE +"			;
	//$sousmenu_actions_de_prospection	['actualites']		=		"ACTUALITÉS"			;
	//$sousmenu_actions_de_prospection	['fichier_client']	=		"FICHIER CLIENT"		;
	//$sousmenu_actions_de_prospection	['emailing']		=		"EMAILING"			;
	/****************************** SOUS MENU MARCHÉ ***************************************************************/
	//$sousmenu_marche			['slides']		=	"SLIDES"				;
	//$sousmenu_marche			['donnees_primaires']	=	"DONNÉES PRIMAIRES"			;
	//$sousmenu_marche			['pdv']			=	"PDV"					;
	//$sousmenu_marche			['contraintes']		=	"CONTRAINTES QUALITE"			;
	//$sousmenu_marche			['evolution']		=	"PDM - PERSPECTIVES D'ÉVOLUTION"	;
	//$sousmenu_marche			['concurrence']		=	"CONCURRENCE"				;
	//$sousmenu_marche			['reussite']		=	"POINTS FORTS POINTS FAIBLES"		;
	//$sousmenu_marche			['partenariats']	=	"PARTENARIATS"				;
	/****************************** PRODUIT ************************************************************************/
	//$menu				['produit']			=	"PRODUIT"				;
	//$sousmenu_produit		['transport']			=		"TRANSPORT"			;
	//$sousmenu_produit		['hebergement']			=		"HEBERGEMENT"			;
	//$sousmenu_produit		['restauration']		=		"RESTAURATION"			;
	//$sousmenu_produit		['visite']			=		"VISITE"			;
	//$sousmenu_produit		['activite']			=		"ACTIVITÉ"			;
	/****************************** ACHATS *************************************************************************/
	//$menu				['achats']			=	"ACHATS"				;
	//$sousmenu_achats		['produits']			=		"PRODUITS"			;
	//$sousmenu_achats		['commande']			=		"COMMANDE"			;
	//$sousmenu_achats		['cotation']			=		"COTATION"			;
	//$sousmenu_achats		['livre_journal']		=		"LIVRE JOURNAL"			;
	//$sousmenu_achats		['facture']			=		"FACTURE"			;
	/****************************** DOSSIER FINANCIER **************************************************************/
	//$menu				['dossier_financier']		=	"DOSSIER FINANCIER"			;
	//$sousmenu_dossierfinancier	['tresorerie']			=		"TRÉSORERIE"			;
	//$sousmenu_dossierfinancier	['previsions']			=		"PRÉVISIONS DE TRÉSORERIE"	;
	//$sousmenu_dossierfinancier	['plan_comptable']		=		"PLAN COMPTABLE"		;
	//$sousmenu_dossierfinancier	['transferts']			=		"TRANSFERTS"			;
	/****************************** COMMUNICATION ******************************************************************/
	//$menu				['communication']		=	"PRODUCT / MARKET FIT"			;
	//$sousmenu_communication		['fournisseurs']		=		"FOURNISSEURS"		;
	//$sousmenu_communication		['contact']			=		"CONTACT"		;
	//$sousmenu_communication		['reseautage']			=		"RESEAUTAGE"		;
	//$sousmenu_communication		['courrier']			=		"COURRIER"		;
	//$sousmenu_communication		['newsletter']			=		"NEWSLETTER"		;
	/****************************** OPÉRATIONS *********************************************************************/
	//$menu				['operations']			=	"OPÉRATIONS"				;
	//$sousmenu_operations		['devis']			=		"DEVIS"				;
	//$sousmenu_operations		['voyageurs']			=		"VOYAGEURS"			;
	//$sousmenu_operations		['bi']				=		"BI"				;
	//$sousmenu_operations		['commandes']			=		"COMMANDES"			;
	//$sousmenu_operations		['vouchers']			=		"VOUCHER"			;
	//$sousmenu_operations		['sav']				=		"SAV"				;
	//$sousmenu_operations		['annulation']			=		"ANNULATION"			;
	//$sousmenu_operations		['options']			=		"OPTIONS"			;
	//$sousmenu_operations		['conditions_de_vente']		=		"CONDITIONS DE VENTE"		;
	//$sousmenu_operations		['formalites']			=		"FORMALITES"			;
	//$sousmenu_operations		['reservations']		=		"RESERVATIONS"			;
	/****************************** FOOTER *************************************************************************/
	//$footer				['www.musth.eu']		=	"ACCUEIL"			;
	//$footer				['plan-du-site']		=	"PLAN DU SITE"			;
	//$footer				['actualites']			=	"ACTUALITES"			;
	?>
