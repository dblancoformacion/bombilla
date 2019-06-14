<?php
Class Bombilla{
	public $estado;
	private $conn;
	// modelo
	function __construct(){
		$this->conn=new mysqli('localhost','root','','db2019');
		$r=$this->conn->query("
			SELECT * FROM bombillas;
		")->fetch_all(MYSQLI_ASSOC);
		foreach($r as $i=>$bombilla)
			$this->estado[$bombilla['id_bombilla']]=$bombilla['estado'];
	}
	function cambia(){
		foreach($this->estado as $i=>$estado){
			if($_GET['cambia']==$i){
				if($estado=='off')
					$this->estado[$i]='on';
				else $this->estado[$i]='off';
				$this->conn->query("
					UPDATE bombillas SET estado='".$this->estado[$i]."'
						WHERE id_bombilla=".$i."
				");
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
// controlador
if(isset($_SESSION['b']))
	$b=$_SESSION['b'];
else $b=new Bombilla();
if( isset($_GET['cambia']) )
	$b->cambia();
echo $b->muestra();
?>