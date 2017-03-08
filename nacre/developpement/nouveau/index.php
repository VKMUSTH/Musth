	<?php try {$bdd = new PDO('mysql:host=localhost;dbname=Musth', 'root', '020061647');} catch(Exception $e) {die('Erreur : '.$e->getMessage());} ?>
	<table border=0 cellpadding=0 cellspacing=0 >
		<tr valign=top  >
		<? 		$getadmin = $bdd->query('SELECT * FROM admin WHERE id =\'1\'');
		while ($admin = $getadmin->fetch()){?>


				<?if (isset($admin['numproduit']) ) {
 					$getproduit = $bdd->prepare('SELECT * FROM produits WHERE numproduit = ? ');
					$getproduit->execute(array($admin['numproduit']));
					while ($produit = $getproduit->fetch()){?>

			<td>		<h1>Etape développement systeme</h1>


	</table>

<form  action="enregistrer.php"  method="post">
<input type="text" name="devel" value="1" id="devel" hidden/>
	<table border=0 cellpadding=0 cellspacing=0  >
			<TR BGCOLOR="#d8dfea"><TD  COLSPAN=9 ALIGN=CENTER VALIGN=MIDDLE >		<B>NOUVEL ÉVÈNEMENT</B>			</TD>		</TR>
			<TR HEIGHT=16 ALIGN=LEFT BGCOLOR="#eff2f7">
				<TD STYLE="width:10%; border-left: 1px solid #b8bec3; " >		<B>Date</B>				</TD>
				<TD STYLE="width:80%;">							<B>Désignation</B>				</TD>
				<TD STYLE="width:10%; border-right: 1px solid #b8bec3" colspan=3>	<B>Commande</B>				</TD>		</TR>
	<tr>
		<?php $date = date("d-m-Y");?><td style="width:10%"><input type="text" name="date" id="date" value="<?php echo ''.$date.''?>" />
		<td><input type="text" name="designation" id="designation" value=""  />

		<td style="width:10%"><input type="submit" value="Envoyer"   />
	</table>
<br>




</form>
					<? }$getproduit->closeCursor(); } else {} ?>
		<?}$getadmin->closeCursor();?>
