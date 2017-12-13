<?php 
include('../modelo/conn.php');
include('fecha.php');
$ev = new Conexion;
$codlista=$ev->codEvento();
$user=$_GET['us'];
$fechaevento=$ev->fevento(); // Aqui esta el error. update datafecha() la cual devuelve la fecha actual por fevento()
					 // que da el ultimo evento registrado.
$ev->modVentaRp($user, $fechaevento, $codlista);
$ev->Cerrar();

?>