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
	<link href="https://cloud.githubusercontent.com/assets/22053566/23463399/9a964af2-fe91-11e6-9f00-5060337cf164.png"	rel="icon" 		type="image/png"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<div class="logo" align=center><a href="http://musth.co.tld/" >	<img rel="icon" alt="Musth" src="https://cloud.githubusercontent.com/assets/22053566/23463411/a7c885fa-fe91-11e6-9172-c0b1a8e15e6e.png"/></a> 
</head>

	<body class=white bgcolor=#ffffff>
		<div class=conteneur>
		<div class=fondblancprint>
		<?php
			include "musth.co/admin.php"; 

		?>
	</body>

</html>
