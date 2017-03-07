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

			<td class=inputnum><label><a>N° Client</a></label><input type="text"  name="numclient" value="<?php echo $admin['numclient']  ; ?>"  id="numclient" />			</td>
			<td class=inputnum><label><a>N° Contact</a></label><input type="text"  name="numcontact" value="<?php echo $admin['numcontact']  ; ?>"  id="numcontact" />		</td>
	</table>
	<BR>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=8 ALIGN=CENTER VALIGN=MIDDLE >				<B>NOUVEL HEBERGEMENT</B>									</TD>	
		</TR>
		<TR ALIGN=LEFT class="niv2">
			<TD STYLE="width:17%;border-left: 1px solid #b8bec3;" >			<B>Nuitées</B>											</TD>
			<TD STYLE="width:15%;" >						<B>Type hébergement</B>										</TD>
			<TD STYLE="width:10%;" >						<B>Formule</B>											</TD>
			<TD STYLE="width:29%;  " >						<B>Nom</B>											</TD>
			<TD STYLE="width:15%;" >						<B>Commentaire</B>										</TD>
			<TD STYLE="width:9%; border-right: 1px solid #b8bec3" >			<B>Commande</B>											</TD>	
		</TR>
			<form  action="enregistrer.php"  method="post">
			<input		type="text"	name="numclient"	id="numclient"		value="<?php echo $admin['numclient']  ; ?>"		hidden				/>
			<input		type="text"	name="numcontact"	id="numcontact"		value="<?php echo $admin['numcontact']  ; ?>"		hidden				/>
		<?php
		$sql2 = 'SELECT * FROM clients WHERE numclient = '.$admin['numclient'].'';
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		while($date = mysql_fetch_assoc($req2)) { ?>
			<input		type="text"	name="syn_date"		id="syn_date"		value="<?php echo $date['date_depart']; ?>"   		hidden 				/>
		<?php } //$get_date ?>
			<input		type="text"	name="attribut"		id="attribut"		value="hebergement"					hidden				/>
			<input		type="text"	name="libelle"		id="libelle"	value=""hidden />
			<input		type="text"	name="jours"		id="jours"		value="0"						hidden				/>
			<input		type="text"	name="activite"		id="activite"		value=""	hidden				/>
			<input		type="text"	name="etat"		id="etat"		value="prevision"					hidden				/>
			<input		type="text"	name="mois"		id="mois"		value="01"						hidden				/>
			<input		type="text"	name="annee"		id="annee"		value="15"						hidden				/>
		<TR ALIGN=LEFT>
			<TD STYLE="border-left: 1px solid #b8bec3"  >	<input type="text" name="nuitees" id="nuitees"  />									</TD>
			<TD>						<input type="text" value="<?php echo $prestataire['metier']  ; ?>"  disabled="disabled"  />				</TD>
			<TD>			
				<select name="formule" id="formule">
					<option value=""></option> 
					<option value="B.B.">B.B.</option>
					<option value="D.P.">D.P.</option>
					<option value="P.C.">P.C.</option>
					<option value="Day Use">Day Use</option>
				</select>
			<TD>						<input type="text" value=""  name="designation" id="designation"   />		</TD>
			<TD>						<input type="text" name="commentaire" id="commentaire"  />								</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; " >	<input type="submit" value="Envoyer"   />										</TD>
		</TR>
	</form>
	</table>
	<?php


		} //isset sql1
	    } mysql_close();
	?> 
