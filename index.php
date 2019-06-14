<?php
Class Bombilla{
	public $id;
	public $estado=0;
	// modelo
	function __construct($i){
		$this->id=$i;
	}
	// vista
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
}
// controlador
for($i=0;$i<5;$i++){
	$b[$i]=new Bombilla($i);
	if( isset($_GET['on']) )
		echo $b[$i]->on();
	else
		echo $b[$i]->off();
}
?>