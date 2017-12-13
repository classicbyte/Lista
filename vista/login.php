<?php 
	//include('../controlador/sesion.php');
	include('../controlador/encryp.php');
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
<body style="background-color:;">
	<header>
		<div class="container">
			
			<div class="row">
				<div class="col-xs-8 col-sm-9">
					<h2></h2>
				</div>
				<div class="col-xs-4 col-sm-3">
					<h3></h3>
				</div>		
			</div>
		</div>		
	</header>
	<br>
	<br>
	<div class="container">
		<section class="">
			<div class="col-xs-12">
				<div class="well">
					<center><h1><strong>Sistema interno</strong></h1></center>
				</div>
				<?php
                    error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING); 
                    //Mensaje de validacion denegada.
                    if (isset($_GET['err'])) 
                    {
                    	$resultado=decrypt($_GET['err'],"KEY");
                    	if ($resultado=="errordeusuario") 
                    	{
                    		echo '<div class="alert alert-danger" role="alert"><center><h4>Usuario y/o contraseña erroneos</h4></center></div>';
                    	}
                    }
                    if(isset($_GET['tip']))
                    {
                    	echo '<div class="alert alert-danger" role="alert"><center><h4>Tu usuario se encuentra inactivo :(</h4></center></div>';
                    }
                ?>
			</div>
			<div class="col-xs-12 col-sm-12">
				<div class="well">
					<center>
					<form name='login' method='post' action='../controlador/valida.php' enctype='application/x-www-form-urlencoded' class=''>
						<div class='form-group'>
							<label class='sr-only' for='correo'>Correo:</label>
							<input class='form-control' id='ema' type='text' placeholder='correo...' name='correo' required>
						</div>
						<div class='form-group'>
							<label class='sr-only' for='password'>Contraseña:</label>
							<input class='form-control' id='pss' type='password' placeholder='contraseña...' name='password' required>
						</div>
						<div class="btn-gruop">
							<a href="../front/index.php" class="btn btn-default">Volver</a>
							<button class='btn btn-default'>Ingresar</button>
						</div>
					</form>
					</center>
				</div>
			</div>
		</section>
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

</html>