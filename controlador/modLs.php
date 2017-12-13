<?php 
include('../modelo/conn.php');
include('fecha.php');
$update = datafecha();
$in=new Conexion;
$in->modlistaFinal($_POST['codigo'], $_POST['fecha'], $update);
$in->Cerrar();
?>