<?php 

function rpaventa()
{
	include('fecha.php');
	$in = new Conexion;
	$cod= $in->codEvento();
	$fecha=$in->fevento();
	$create=datafecha();
	//echo $_GET['ad'];
	$in->rpAddVentas($cod,$fecha,$create);
	$in->Cerrar();
}
	

?>