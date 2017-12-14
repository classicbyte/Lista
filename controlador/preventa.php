<?php 
include('../modelo/conn.php');
include('fecha.php');
$ev = new Conexion;
$codlista=$ev->codEvento();
$user=$_GET['us'];
$fechaevento=$ev->fevento();
$ev->modVentaRp($user, $fechaevento, $codlista);
$ev->Cerrar();

?>