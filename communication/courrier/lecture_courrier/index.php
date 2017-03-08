<?php require '../../../header.php'; ?>
<style type=text/css>
p1 {
	width:100% ;
	padding:0 0px; 
	margin-top:30px; 
	text-align:left; 
	font:20px Georgia,"AlMohanad",Times,serif; 
	background: #ffffff; 
	color: #000000; 
	font-weight : bold;  
text-align:right;
}

p2 {
	width:80% ;
	margin-top:30px; 
	text-align:left; 
	font:30px Georgia,"AlMohanad",Times,serif; 
	background: #ffffff; 
	color: #000000; 
	font-weight : bold;  

}

</style>
<?php
$sql = 'SELECT * FROM admin WHERE id = \'1\'';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($admin = mysql_fetch_assoc($req)) { ?>
	<table border=0 cellpadding=0 cellspacing=0 >
			<input type="text"  name="position" value="<?php echo $admin['position']  ; ?>"  id="position"  HIDDEN/>
				<?php
				$sql1 = 'SELECT * FROM courrier WHERE position = '.$admin['position'].'';
				$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
				while($courrier = mysql_fetch_assoc($req1)) { ?>

		<tr height=80 valign=top>
		<tr>
			<td>
				<p2 align=left style=margin-left:0px>
					KEMPF VALERY<br>
					9B Rue de Wissembourg<br>
					67210 OBERNAI<br>
					valerykempf@gmail.com<br>
					Mobile: 06 72 97 73 00<br>
					<br>			
				</p2>

				<!--p2 align=left style=margin-left:0px>
					PERRON FRANÇOISE<br>
					9B Rue de Wissembourg<br>
					67210 OBERNAI<br>
					Tel: 03 88 95 68 78<br>
					<br>			
				</p2-->
<input type="text" name="numcontact" value="<?php echo $courrier['numcontact']  ; ?>" id="numcontact" hidden/>

				<?php if (isset($courrier['numcontact']) ) {?>
				<?php
				$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$courrier['numcontact'].'';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($courrier2 = mysql_fetch_assoc($req2)) { ?>
			<td style="width:50%">
				<p2 align=left >
					<?php echo $courrier2['nom_firme']; ?><br>
					<?php echo $courrier2['nom']; ?> <?php echo $courrier2['prenom']; ?><br>
					<?php echo $courrier2['adresse']; ?><br>
					<?php echo $courrier2['code_postal']; ?> <?php echo $courrier2['ville']; ?><br>
					<br>

				</p2>
<style type=text/css>
	td.attribut{display:<?php echo $courrier['attribut']; ?>; }
</style>
				</p2>
		<tr height=40 valign=top>
			<td colspan=2 style=text-align:right >
				<?php echo '<p1>Obernai, le : <span style=color:#8aa;>'.$courrier['date'].' </span></p1>' ;?>			
		<tr height=80 valign=top>
			<td colspan=6><h2><?php echo $courrier['objet']; ?></h2>
		<tr align=left height=40 valign=top>
			<td><p><?php echo $courrier2['civilite']; ?> <?php echo $courrier2['nom']; ?>,</p>
		<tr align=justify height=50 >
			<td><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $courrier['texte']; ?></p>
		<tr align=justify height=50>
			<?php } //$getcourrier2 ?>
			<?php } //isset_courrier2 ?>
		<tr align=justify >
			<td class="attribut" >
				<li><a href=><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PIÈCES JOINTES</h4></a>
				<?php
				$sql3 = 'SELECT * FROM pieces_jointes WHERE position = '.$admin['position'].'';
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
				while($pieces_jointes = mysql_fetch_assoc($req3)) { ?>

						<a href=><B><?php echo $pieces_jointes['piece_jointe']; ?></B></a>			<div id="filet"></div>
			<?php } //$get_pieces_jointes ?>
	</table>
			<?php } //$getcourrier ?>
<?php } mysql_close(); ?>
