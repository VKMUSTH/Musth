	<?php require '../../../header.php'; ?>
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

		<input type="text" name="numcontact" value="<?php echo $courrier['numcontact']  ; ?>" id="numcontact" hidden/>

				<?php if (isset($courrier['numcontact']) ) {?>
				<?php
				$sql2 = 'SELECT * FROM contacts WHERE numcontact = '.$courrier['numcontact'].'';
				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				while($courrier2 = mysql_fetch_assoc($req2)) { ?>

		<tr height=80 valign=top>
			<td colspan=6><h2><?php echo $courrier['objet']; ?></h2>

		<tr height=40 valign=top>
			<td colspan=2 style=text-align:right >
				<?php echo '<p1>Obernai, le : <span style=color:#8aa;>'.$courrier['date'].' </span></p1>' ;?>			
		<tr align=justify height=50 >
			<td><p><?php echo $courrier['texte']; ?></p>
		<tr align=justify height=50>
			<?php } //$getcourrier2 ?>
			<?php } //isset_courrier2 ?>
		<tr align=justify >
			<td class="attribut" >
				<li><a href=><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ANNEXES</h4></a>
			<td class="inputnum">	<input type="button" onclick="location.href='nouveau'" value="Nouveau" />									</td>
			
		
				<?php
				$sql3 = 'SELECT * FROM annexes WHERE attribut = '.$courrier['position'].'';
				$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
				while($annexes = mysql_fetch_assoc($req3)) { ?>
<tr>	
	<td>
						<a href="<?php echo $annexes['lien']; ?>"><B>> <?php echo $annexes['titre']; ?></B></a>			<div id="filet"></div>
				<form name="modifier" action="modifier.php" method="post" >
				<input type="text" name="position" id="position" value="<?php echo $annexes['position']  ; ?>" HIDDEN />

			<TD STYLE="border-right: 1px solid #b8bec3;" ><button type="submit" class="button">[Modifier]</button>				</TD>
				</form>
			<?php } //$get_annexes ?>
	</table>
			<?php } //$getcourrier ?>
	<?php } mysql_close(); ?>
