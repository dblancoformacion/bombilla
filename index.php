<?php
// controlador
if( isset($_GET['on']) ) echo '
	<a href="?off=1">
		<img src="bombilla_on.jpg" style="height:200px"/>
	</a>
';
else echo '
	<a href="?on=1">
		<img src="bombilla_off.jpg" style="height:200px"/>
	<a/>
';
?>