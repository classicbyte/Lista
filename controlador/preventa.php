<?php 
include('../modelo/conn.php');
include('fecha.php');
$ev = new Conexion;
$codlista=$ev->codEvento();
$user=$_GET['us'];
$update=datafecha();
$ev->modVentaRp($user, $update, $codlista);

?>