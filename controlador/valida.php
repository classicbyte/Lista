<?php 
include('../modelo/conn.php');
//Validacion de datos post consulta.
$correo=$_POST['correo'];
$password=md5($_POST['password']);
if (($correo != "") and ($password!="")) {
	$in = new Conexion();
	$in->Login($correo, $password);
	$in->Cerrar();
}
?>