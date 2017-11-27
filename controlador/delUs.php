<?php 
include('../modelo/conn.php');
if (isset($_POST['cod'])) {
	$in=new Conexion;
	$in->elUs($_POST['cod']);
	$in->cerrar();
}

?>