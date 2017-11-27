<?php 
include('../modelo/conn.php');
$query="select fecha_event from lista order by fecha_event desc";
$in = new Conexion;
$consulta = $in->conexion->query($query);
$cont=mysqli_num_rows($consulta);
while ($row = mysqli_fetch_array($consulta)) 
{
	for ($i=0; $i <= $cont; $i++) { 
		
	}
}


	 
?>
