<?php 
include('../modelo/conn.php');
include('fecha.php');
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$whatsapp=$_POST['whats'];
$facebook=$_POST['face'];
$instagram=$_POST['insta'];
$fecha=datafecha();
$mystring = $nombre;
$findme   = ' ';
$pos = strpos($mystring, $findme);
if ($pos === false) 
{
    if (isset($nombre, $apellido, $correo, $whatsapp, $facebook, $instagram, $fecha)) 
	{
		$in= new Conexion;
		$in->addUserExtern($nombre, $apellido, $correo, $whatsapp, $facebook, $instagram, $fecha);		
	}
	else
	{
		echo "Falso.";
	}
}
else 
{
    echo "Error. No debes incluir espacios";
}
?>