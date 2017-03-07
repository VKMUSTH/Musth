	<?php try {$bdd = new PDO('mysql:host=localhost;dbname=Musth', 'root', '020061647');	} catch(Exception $e) {die('Erreur : '.$e->getMessage());} ?>
	<? $get_admin = $bdd->query('SELECT * FROM admin WHERE id =\'1\'');
	while ($admin = $get_admin->fetch()){?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
			<td>									<h1>Nouvelle actualite</h1>						</TD>
	</table>
	<table border=0 cellpadding=0 cellspacing=0 >
		<TR class="niv1">
			<TD  COLSPAN=6 ALIGN=CENTER VALIGN=MIDDLE >				<B>NOUVELLE ACTUALITÉ</B>						</TD>		
		</TR>
		<TR HEIGHT=16 ALIGN=LEFT class="niv2">
			<TD STYLE="width:10%;" >						<B>Date</B>								</TD>
			<TD STYLE="width:40%;" >						<B>Lien</B>								</TD>
			<TD STYLE="width:40%;" >						<B>Titre</B>								</TD>
			<TD STYLE="width:10%;" >						<B>Commande</B>								</TD>	
		</TR>
				<?php
				$date = date("Y-m-d");
				list($year, $month, $day) = split('[/.-]', $date);
				?>
				<form  action="ajouter.php"  method="post">
				<input type="text" value="<?php echo $admin['numproduit']  ; ?>" name="numproduit" id="numproduit" HIDDEN/>
		<tr>
			
			<TD>							<input type="text" name="date" id="date" value="<?php echo $date ; ?>" />		</TD>			
			<TD>							<input type="text" name="lien" id="lien"  />						</TD>
			<TD>							<input type="text" name="titre" id="titre"  />						</TD>
			<TD STYLE="border-right: 1px solid #b8bec3; " >		<button type="submit" class="button" >ENVOYER</button>					</TD>	
		</TR>
				</form>
	</table>
	<?}$get_admin->closeCursor();?>
