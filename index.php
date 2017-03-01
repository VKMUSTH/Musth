<?php
include "common-libs.php";
include "config.php";
mysql_connect($hostname, $username, $password);
mysql_select_db($database);
?>
<?php include "musth.co/header_tbb.php"; ?>
<html>
<head>
	<title>Musth &#8250; Accueil</title>
	<link href="musth.co/public/stylesheet/musth.css" 	rel="stylesheet" 	type="text/css">
	<link href="musth.co/public/stylesheet/print.css" 	rel="stylesheet" 	type="text/css" media="print">
	<link href="musth.co/public/images/favicon/icn.musth.hover.png"	rel="icon" 		type="image/png"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<div class="logo" align=center><a href="http://musth.co.tld/" >	<img rel="icon" alt="Musth" src="musth.co/public/images/logo/musth_logos.png"/></a> 
</head>

	<body class=white bgcolor=#ffffff>
		<div class=conteneur>
		<div class=fondblancprint>
		<?php
			include "musth.co/admin.php"; 

		?>
	</body>

