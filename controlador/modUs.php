<?php 
include('../modelo/conn.php');
include('fecha.php');

if ($_POST['actividad']=="Activo") 
{
	$actividad=1;
}
else
{
	$actividad=0;
}
$update=datafecha();
$in = new Conexion;
$in->modUserListo($_POST['codigo'],$_POST['name'],$_POST['last_name'],$_POST['categoria'],$_POST['correo'],$_POST['password'],$actividad,$_POST['whatsapp'],$_POST['facebook'],$_POST['instagram'],$update);
?>