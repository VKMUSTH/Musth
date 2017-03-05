	<?php require "../../header.php"; ?>
	<?php
	$sql = 'SELECT * FROM admin WHERE id = \'1\'';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($admin = mysql_fetch_assoc($req)) { ?>
		<img class=banniere src="../../images/bannieres/<?php echo $admin['numproduit']; ?>/<?php echo $admin['numdossier']; ?>/banniere.png" alt="Musth" width="100%" />
	<?php
	$sql1 = 'SELECT * FROM video WHERE numdossier = '.$admin['numdossier'].' ';
	$req1 = mysql_query($sql1) or die('Erreur SQL !<br>'.$sql1.'<br>'.mysql_error());
	while($client = mysql_fetch_assoc($req1)) { ?>
	<!--VIDEO-->
	<div id="vid">
	<object type="application/x-mplayer2" width="100%" height="73%" data="../../videos/<?php echo $admin['numdossier']; ?>/video.mp4" >
		<param name="movie" value="../../videos/<?php echo $admin['numdossier']; ?>/video.mp4" />
		<param name="autostart" value="true" />
		<param name="volume" value="0" />
		<param name="controller" value="false"/>
		<param name="allowFullScreen" value="true" />
	</object>
	</div>
<style type="text/css">
	#vid {position: relative;top: 0px; text-align: center ; z-index:-0}
</style>
	<?php } //$get_video ?>		
	<?php } mysql_close(); ?>
