<?php 
include('../modelo/conn.php');
$in= new Conexion;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::A Poca Luz::.</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="../vista/css/estilos.css">
	<link rel="stylesheet" href="../vista/css/bootstrap.min.css">
	<link href="../vista/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body class="">
		<div class="">
			<header>
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
								<span class="sr-only">Menu</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<!--<a href="#" class="navbar-brand">ApocaLuz</a>-->
						</div>
						<div class="collapse navbar-collapse" id="navbar-1">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
									USUARIOS <span class="caret"></span>
							  		 </a>
							  		<ul class="dropdown-menu">
							  			<li><a href="../vista/adduser.php">Agregar</a></li>
							  		</ul> 
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
									INVITACION <span class="caret"></span>
							  		 </a>
							  		<ul class="dropdown-menu">
							  			<li><a href="../vista/ventas.php">Agregar</a></li>
							  			<li><a href="../vista/venin.php">Ingresadas</a></li>
							  		</ul> 
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
									LISTAS <span class="caret"></span>
							  		 </a>
							  		<ul class="dropdown-menu">
							  			<li><a href="listin.php">Opciones</a></li>
							  		</ul> 
								</li>
								<li>
									<a href="../vista/mainControl.php">Menu</a>
								</li>
							</ul>
							 <ul class="nav navbar-nav">
        						<li><a href="../controlador/salir.php?sal=salir">Cerrar sesión</a></li>
        					</ul>
						</div>
					</div>
				</nav>
			</header>
		</div>

	<div class="container-fluid">
		<aside>
			<div class="color6 col-xs-12">
				<?php 
					$in->listaVentas($_POST['selectordefecha']);
				?>
			</div>
		</aside>
	</div>

	<div class="container-fliud">
		<div class="col-xs-12">
			<div class='alert alert-info' role='alert'>
				<center><h3><a href="../vista/venin.php" class="alert-link" style="text-decoration:none">Volver <span class="glyphicon glyphicon-share"></span></a></h3></center>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<h6><small>ClassicByte©</small></h6>
		</div>
	</footer>

	
	<!--Bootstrap -->
	<script src="../vista/js/jquery.min.js"></script>
	<script src="../vista/js/bootstrap.min.js"></script>
</body>

</html>