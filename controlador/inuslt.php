<?php 
include('../controlador/fecha.php');
function preAdd()
{
	$in = new Conexion;
	$cod= $in->codEvento();
	$fecha=$in->fevento();
	$create=datafecha();
	//echo $_GET['ad'];
	$in->rpAddVentas($cod,$fecha,$create);
}

?>