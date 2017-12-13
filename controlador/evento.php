<?php 
include('../modelo/conn.php');
include('fecha.php');
include('sesion.php');

$fecha_event = $_POST['fecha_event'];
if ($fecha_event=="") {
	$resp=4;
	$resultado=encrypt($resp,"KEY");
	header("Location:../vista/mainControl.php?err=".$resultado."");
}
else
{
	$fechahoy = datafecha();
	if ($fecha_event < $fechahoy) {
		$resp=5;
		$resultado=encrypt($resp,"KEY");
		header("Location:../vista/mainControl.php?err=".$resultado."");
	}
	else
	{
		$_SESSION['cod_user'];
		$create=datafecha(). " " .datahora();
		$update=$create;

		if ($fecha_event or $_SESSION['cod_user'] or $create != "") {
			$in = new Conexion;
			$in->addList($_SESSION['cod_user'], $fecha_event, $create, $update);
			$in->Cerrar();
		}
	}
}
?>