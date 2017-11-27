<?php 
include('../controlador/sesion.php');
include('../modelo/conn.php');
$in= new Conexion;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::A Poca Luz::.</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
							  			<li><a href="adduser.php">Agregar</a></li>
							  			<li><a href="beforeop.php">Opciones</a></li>
							  		</ul> 
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
									INVITACION <span class="caret"></span>
							  		 </a>
							  		<ul class="dropdown-menu">
							  			<li><a href="ventas.php">Agregar</a></li>
							  			<li><a href="venin.php">Ingresadas</a></li>
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
									<a href="mainControl.php">Menu</a>
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
		<div class="well">
			<center>
				<h2><strong>Listado de ventas </strong><a href="venin.php"><span class="glyphicon glyphicon-refresh"></span></a></h2>
			</center>
		</div>
	</div>

	<div class="container-fluid">
		<div class="col-xs-12 col-sm-6">
			<div class="well">
				<center>
				<h3>Selecciona la fecha</h3>
				<div class="form-group">
			        <form action="../controlador/vistalist.php" method='post' class="form-inline" role="search">
						<div class="form-group">
							<select  class="form-control" name="selectordefecha" required/>
			                  	<?php 
			    					$in->todasListas();
								?>
			                </select>
						</div>
						<div class="form-group">
							<div class="input-group">
									<button class="btn btn-success">
									<span class="glyphicon glyphicon-search"></span>
									</button>
								</span>	
							</div>
						</div>
					</form>
				</div>
				</center>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
				<div class="well">
				<center>
				<h3>Ingresa la fecha</h3>
				<div class="form-group">
			        <form action="../controlador/vistalist.php" method='post' class="form-inline" role="search">
						<div class="form-group">
							<input class='form-control' type='text' placeholder='DD-MM-AAAA' name='selectordefecha' required>
						</div>
						<div class="form-group">
							<div class="input-group">
									<button class="btn btn-success">
									<span class="glyphicon glyphicon-search"></span>
									</button>
								</span>	
							</div>
						</div>
					</form>
				</div>
				</center>
			</div>
		</div>
	</div>

	<div class="container-fliud">
		<div class="col-xs-12">
			<div class='alert alert-info' role='alert'>
				<center><h3><a href="ventas.php" class="alert-link" style="text-decoration:none">Ingresar visitas - ir  <span class="glyphicon glyphicon-share"></span></a></h3></center>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>

	<!-- Footer Start -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
               
      <div class="col-md-4 text-left">
       <p><span><a href="#about" class="smoth-scroll"></a></span>  <span><a href="#portfolio" class="smoth-scroll"></a></span></p>
          </div>
               
            <div class="col-md-4 text-center">
               <p>A poca luz</p>
             </div>
              
             <div class="col-md-4 uipasta-credit text-right">
                
             </div>
                
             </div>
        </div>
    </footer>
    <!-- Footer End -->r>

	
	<!--Bootstrap -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>