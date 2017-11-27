<?php 
include('../modelo/conn.php');
include('../controlador/sesion.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>// Lista //</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="">
	<div class="container">
		<header>
			<nav>
				
			</nav>
		</header>			
	</div>		

	<div class="container-fluid">
		<section>
			<div class="col-xs-12">
				<center><h2>Listeros <span class=" glyphicon glyphicon-send"></span></h2></center>
			</div>

				<form class="" method="post" action="#" enctype="application/x-www-form-urlencoded">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="textbuscar" name="textbuscar" placeholder="Buscar..." required>
							<span class="input-group-addon">por:</span>
						</div>  	
					</div>
					<div class="form-group">
						<select  class="form-control" name="categ" required/>
                           	<option value="name">Nombre</option>
                           	<option value="las_name">Apellido</option>
                        </select>	
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default"> Buscar</button>
						<a href="main.php" class="btn btn-default">Volver</a>
					</div>
					<div class="">
					</div>
				</form>	
		</section>
	</div>
	<div class="container-fluid">
		<aside>
			<div class="color6 col-xs-12">
				<?php
					$tipo="one_charge";
					$inn = new Conexion;
					$html = $inn->tableFiles($_SESSION['cod_user'],$_SESSION['categoria'],$tipo);
					if ($html!="") {
						echo $html;
					}
				?>
			</div>
		</aside>
	</div>
	<footer>
			<div class="container">
				<h6><small>ClassicByte©</small></h6>
			</div>
	</footer>
	<!--Bootstrap -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
