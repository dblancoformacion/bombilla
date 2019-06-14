<?php
Class Bombilla{
	public $estado;
	// modelo
	function __construct($n){
		for($i=0;$i<$n;$i++)
			$this->estado[$i]='off';
	}
	function cambia(){
		foreach($this->estado as $i=>$estado){
			if($_GET['cambia']==$i){
				if($estado=='off')
					$this->estado[$i]='on';
				else $this->estado[$i]='off';
			}
		}
	}	
	// vista
	function muestra(){
		$txt=null;
		foreach($this->estado as $i=>$estado)
			$txt.='
				<a href="?cambia='.$i.'">
					<img src="bombilla_'.$estado.'.jpg" style="height:200px"/>
				</a>
			';
		return $txt;
	}
}
// sesión
session_start();
if(isset($_GET['salir'])){
	session_destroy();
	session_start();
}
// controlador
if(isset($_SESSION['b']))
	$b=$_SESSION['b'];
else $b=new Bombilla(5);
if( isset($_GET['cambia']) )
	$b->cambia();
echo $b->muestra();
// sesión
$_SESSION['b']=$b;
echo '<a href="?salir=1">Cerrar</a>';
?>