<html>
<head>
	<title>Musth &#8250; Accueil</title>
	<link href="../../../../../musth.co/public/stylesheet/musth.css" 	rel="stylesheet" 	type="text/css">
	<link href="../../../../../musth.co/public/stylesheet/print.css" 	rel="stylesheet" 	type="text/css" media="print">
	<link href="../../../../../musth.co/public/images/favicon/icn.musth.hover.png"	rel="icon" 		type="image/png"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<div class="logo" align=center><a href="http://musth.co.tld/Musth-master" >	<img rel="icon" alt="Musth" src="../../../../../musth.co/public/images/logo/musth_logos.png"/></a> 
	<?php
	// on se connecte à MySQL
	include "connexion_sql.php";
	include "config_menu.php";
?>
<?php
// Lit un fichier, et le place dans une chaîne
$filename = "../tmp/menu.tmp";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
?>
<?php
// Lit un fichier, et le place dans une chaîne
$filename2 = "../tmp/nacre.tmp";
$handle2 = fopen($filename2, "r");
$contents_nacre = fread($handle2, filesize($filename2));
fclose($handle2);
?>


<?php
//echo '<a>contenu: '.$contents.'</a>'  ;

 ?>
	<body class=white bgcolor=#ffffff>
		<div class=conteneur>
			<center>
				<div id="filet"></div><a href=""></a>
				<header>		
				<?php 
					$i=0;
					while (list($key, $value) = each($valeurmenu))
					{
						if($i++)echo '<a> | </a>';				
						if($key ==  $contents )
						{
							echo '<a href="../menu.php?'.$key.'" style=color:#214d7e>'.$value.'</a>';
						}
						else
						{
							echo '<a href="../menu.php?'.$key.'">'.$value.'</a>';
						}
					}
				?>
				<div id="filet"></div>			
				<p style=color:#788088 class="navbar">
				<div id="filetblanc"></div><a></a>
				<?php 
					$i=0;
					while (list($key, $value) = each($valeur_ss_menu))
					{
						if($i++)echo '<a> | </a>';				
						if($key == $contents_rd)
						{
							echo '<a href="../../nacre.php?'.$key.'" style=color:#214d7e>'.$value.'</a>';
						}
						else
						{
							echo '<a href="../../nacre.php?'.$key.'">'.$value.'</a>';
						}
					}
				?>
				<div id="filetblanc"></div>
				<p style=color:#788088 class="navbar">					
				</header>
		<div class=fondbleuprint>
	</body>
