<?php
Class Bombilla{
	public $estado;
	// modelo
	function __construct($n){
		for($i=0;$i<$n;$i++){
			$this->estado[$i]='off';
			if(isset($_GET['estados'][$i]))
				$this->estado[$i]=$_GET['estados'][$i];
		}
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
		$url=null;
		foreach($this->estado as $i=>$estado){
			$url.='&estados[]='.$estado;
		}
		foreach($this->estado as $i=>$estado){
			$txt.='
				<a href="?cambia='.$i.$url.'">
					<img src="bombilla_'.$estado.'.jpg" style="height:200px"/>
				</a>
			';
		}			
		return $txt;
	}
}
// controlador
$b=new Bombilla(5);
if( isset($_GET['cambia']) )
	$b->cambia();
echo $b->muestra();
?>