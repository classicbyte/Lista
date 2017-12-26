<?php 
include('../controlador/fecha.php');
include('../modelo/conn.php');

$in = new Conexion;
$cod= $in->codEvento();
$fecha=$in->fevento();
$create=datafecha();
//echo $_GET['ad'];
$in->rpAddVentas($cod,$fecha,$create);
$in->Cerrar();

?>