<?php
	$resultado=$_GET['sal'];

	if($resultado=='salir')
	{
		session_start();
		session_destroy();
		header("Location:../vista/login.php");
	}
?>