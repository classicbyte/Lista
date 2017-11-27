<?php  
	function datafecha(){
		date_default_timezone_set('Chile/Continental');
		$fecha_comp = date('d-m-y');
		return $fecha_comp;
	}

	function datahora(){
		date_default_timezone_set('Chile/Continental');
		$hora = date('h:i:s A');
		return $hora;
	}
?>
