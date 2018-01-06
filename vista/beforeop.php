<?php 
include('../controlador/sesion.php');
include('../modelo/conn.php');
$in = new Conexion;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::conLista::.</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
				<center><h2><strong>Selecciona el tipo de USUARIO </strong><a href="beforeop.php"><span class="glyphicon glyphicon-refresh"></span></a></h2></center>
				<?php 
					if (isset($_GET['res']))
					{

						$res=decrypt($_GET['res'],"KEY");
						if ($res==1) {
							echo '<div class="alert alert-success" role="alert"><center><h4>usuario <strong>Modificado!</strong></center></h4></div>';
						}
						elseif($res==3)
						{
							echo '<div class="alert alert-danger" role="alert"><center><h4>Usuario <strong>Eliminado!</strong></center></h4></div>';
						}
						elseif($res==4)
						{
							echo '<div class="alert alert-warning" role="alert"><center><h4>No se ha eliminado el usuario.</center></h4></div>';
						}	
					}
				?>	
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-xs-12">
			<div class="well">
				<center>
				<div class="form-group">
			        <form action="opuser.php" method='post' class="form-inline" role="search">
						<div class="form-group">
							<select  class="form-control" name="categoria" required/>
			                  	<option value="Enlistador">Enlistador</option>
			                  	<option value="Usuario">Usuario</option>
			                  	<option value="Ventas">Ventas</option>
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
	</div>
	

	
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
    <!-- Footer End -->
	<!--Bootstrap -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>