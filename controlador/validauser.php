<?php 
include('../modelo/conn.php');
include('fecha.php');
//Validacion de datos post consulta.
$categoria=$_POST['categ'];
if ($_POST['tipo']=="Activo") 
{
	$actividad=1;
}
else
{
	$actividad=0;
}
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$whatsapp=$_POST['whats'];
$facebook=$_POST['face'];
$instagram=$_POST['insta'];
$fecha=datafecha();
//echo $categoria ." // ".$nombre ." // ".$apellido." // ".$correo ." // ".$password." // ".strlen($password)." // ".$whatsapp." // ".$facebook." // ".$instagram." // ".$fecha ;
if ($password == $password2) 
{
	$respass = $password2;
	if (strlen($respass) < 6) 
	{
		$e=2;
		header("Location:../vista/adduser.php?message=".$e."");
	}
	elseif ($categoria or $nombre or $apellido or $correo or $password or $fecha) 
	{
		$in = new Conexion;
		$in->addUser($categoria,$actividad,$nombre,$apellido,$correo,md5($respass),$whatsapp,$facebook,$instagram,$fecha);
		$in->Cerrar();
	}
}
else
{
	$e=1;
	header("Location:../vista/adduser.php?message=".$e."");
}




?>