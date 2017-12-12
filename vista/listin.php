<?php
include('../controlador/sesion.php');
include('../modelo/conn.php');
$ev = new Conexion;
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
<body>
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
							<!--
							<form action="#" class="navbar-form navbar-right" role="search">
								<div class="form-group">
									<select  class="form-control" name="categ" required/>
			                           	<option value="">Selecciona</option>
			                           	<option value="Enlistador">Enlistador</option>
			                           	<option value="Usuario">Usuario</option>
			                        </select>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Buscar..." required>
										<span class="input-group-btn">
											<button class="btn btn-success">
											<span class="glyphicon glyphicon-search"></span>
											</button>
										</span>	
									</div>
								</div>
							</form>
							-->
							<ul class="nav nav-pills navbar-right" role="tablist">
							  <li role="presentation"><a href="login.php">Mensajes <span class="badge">00</span></a></li>
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
				<center><h2><strong>Opciones de Lista </strong><a href="listin.php"><span class="glyphicon glyphicon-refresh"></span></a></h2></center>
				<?php 
					if (isset($_GET['res']))
					{

						$res=decrypt($_GET['res'],"KEY");
						if ($res==1) {
							echo '<div class="alert alert-success" role="alert"><center><h4>Lista <strong>Modificada!</strong></center></h4></div>';
						}
						elseif($res==3)
						{
							echo '<div class="alert alert-danger" role="alert"><center><h4>Lista <strong>Eliminada!</strong></center></h4></div>';
						}
						elseif($res==4)
						{
							echo '<div class="alert alert-warning" role="alert"><center><h4>No se ha eliminado la lista.</center></h4></div>';
						}	
					}
					
					else 
					{
						echo '<div class="alert alert-info" role="alert"><center>Selecciona modificar o eliminar.</center></div>';
					}
					

				?>	
		</div>
	</div>

	<div class="container-fluid">
		<?php $ev->listaOp(); ?>
	</div>

	<!-- Footer Start -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
               
      <div class="col-md-4 text-left">
       <p><span><a href="#about" class="smoth-scroll"></a></span><span><a href="#portfolio" class="smoth-scroll"></a></span></p>
          </div>
               
            <div class="col-md-4 text-center">
               <p>A poca luz</p>
             </div>
              
             <div class="col-md-4 uipasta-credit text-right">
                
             </div>
                
             </div>
        </div>
    </footer>
    <!-- Footer End -->
	<!--Bootstrap -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>