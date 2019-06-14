<?php
// controlador
if( isset($_GET['on']) ) echo on();
else echo off();

function on(){
	return '
		<a href="?off=1">
			<img src="bombilla_on.jpg" style="height:200px"/>
		</a>
	';
}
function off(){
	return '
		<a href="?on=1">
			<img src="bombilla_off.jpg" style="height:200px"/>
		<a/>
	';
}
?>