	<?php require "../../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
	<?php if (isset(
	$admin['numclient'],
	$admin['numdossier']
	) ) {?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<?php
		$sql1 = 'SELECT * FROM dossiers WHERE numdossier = '.$admin['numdossier'].'';
		$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
		while($name = mysql_fetch_assoc($req1)) { ?>
			<td colspan=6>	<h1><?php echo $name['titre']; ?></h1>															</td>
		<?php } //$get_name ?>
			<td class=inputnum><label><a>N° Client</a></label>	<input type="text"	name="numclient"	id="numclient"		value="<?php echo $admin['numclient']  ; ?>" />
			<td class=inputnum><label><a>N° Ctc Four</a></label>	<input type="text"	name="numcontact"	id="numcontact"		value="<?php echo $admin['numcontact']  ; ?>" />
				<form  action="enregistrer.php"  method="post">
				<input type="submit" value="Envoyer"   />
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=8 ALIGN=CENTER VALIGN=MIDDLE >				<B>NOUVEAU TRANSPORT</B>									</TD>	
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:20%; border-left: 1px solid #b8bec3; " >		<B>Métier</B>											</TD>
			<TD STYLE="width:12%;" >						<B>Départ de</B>										</TD>
			<TD STYLE="width:15%;" >						<B>Date</B>											</TD>
			<TD STYLE="width:5%;" >							<B>Heure*</B>											</TD>
			<TD STYLE="width:12%;" >						<B>Arrivée à</B>										</TD>
			<TD STYLE="width:11%;" >						<B>Date</B>											</TD>
			<TD STYLE="width:5%;" >							<B>Heure*</B>											</TD>	
			<TD STYLE="width:25%;  border-right: 1px solid #b8bec3" >		<B>Compagnie/Commentaire</B>									</TD>
		</TR>
		<?php if (isset($admin['numcontact']) ) {?>	
		<?php
		$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$admin['numcontact'].' ';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($contacts = mysql_fetch_assoc($req2)) { ?>
			<?php $date = date("Y-m-d");?>
			<input		type="text"	name="numproduit"	id="numproduit" 	value="<?php echo $admin['numproduit']  ; ?>"		hidden				/>
			<input		type="text"	name="numdossier"	id="numdossier"		value="<?php echo $admin['numdossier']  ; ?>"		hidden 				/>
			<input		type="text"	name="numclient"	id="numclient"		value="<?php echo $admin['numclient']  ; ?>"		hidden 				/>
			<input		type="text"	name="numcontact"	id="numcontact"		value="<?php echo $contacts['numcontact']  ; ?>"   	hidden 				/>
			<input		type="text"	name="syn_date"		id="syn_date"		value="<?php echo ''.$date.''?>"   			hidden 				/>
			<input		type="text"	name="attribut"		id="attribut"		value="transport"				   	hidden 				/>
			<input		type="text"	name="designation"	id="designation"	value="<?php echo $contacts['nom_firme']  ; ?>"		hidden 				/>
			<input		type="text"	name="jours"		id="jours"		value="0"						hidden 				/>
			<input		type="text"	name="etat"		id="etat"		value="prevision"					hidden 				/>
			<input		type="text"	name="mois"		id="mois"		value="01"						hidden 				/>
			<input		type="text"	name="annee"		id="annee"		value="15"						hidden 				/>
		<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<input type="text" name="metier" 	id="metier" value="<?php echo $contacts['metier']  ; ?>"  />			</TD>
			<TD>						<input type="text" name="departde" 	id="departde"  />								</TD>
			<TD>						<input type="text" name="date_depart" 	id="date_depart"  />								</TD>
			<TD>						<input type="text" name="heuredepart"	id="heuredepart" />								</TD>
			<TD>						<input type="text" name="arriveea"	id="arriveea"  />								</TD>
			<TD>						<input type="text" name="date_arrivee"	id="date_arrivee"/>								</TD>
			<TD>						<input type="text" name="heurearrivee"	id="heurearrivee"/>								</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; ">	<input type="text" name="commentaire"	id="commentaire"value="<?php echo $contacts['nom_firme']  ; ?>"   />		</TD>
		</TR>
		<?php } //$get_contacts ?>
			</form>
	</table>
	<?php

		} //isset sql2
		} //isset sql1
	    } mysql_close();
	?> 
