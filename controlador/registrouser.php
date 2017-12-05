<?php
include('../modelo/conn.php');
include('fecha.php');

$in = new Conexion;
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$what=$_POST['whatsapp'];
$face=$_POST['facebook'];
$insta=$_POST['instagram'];
$mensaje=$_POST['mensaje'];
$fecha=datafecha();
if ($nombre or $correo or $what or $face or $insta) 
{
	$in->regUserExtern($nombre,$correo,$what,$face,$insta,$mensaje,$fecha);

}
else
{
	echo "Variables nulas";
}

?>