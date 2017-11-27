<?php 
include('../controlador/sesion.php');
include('../controlador/encryp.php');

if ($_SESSION['categoria']!="Admin") 
{
	header("Location:../vista/login.php");
}
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
				<center><h2><strong>Ingreso de Usuarios </strong><a href="adduser.php"><span class="glyphicon glyphicon-refresh"></span></a></h2></center>
		</div>
	</div>
	
	<div class="container-fluid">
		<?php
		if(isset($_GET['err'])){
			$resultado=decrypt($_GET['err'],"KEY");
			if ($resultado==1) {
				echo '<div class="alert alert-success" role="alert"><center><h4>Usuario <strong>Registrado!</strong></center></h4></div>';
			}elseif ($resultado==2) {
				echo '<div class="alert alert-danger" role="alert"><center><h4>Error al <strong>Guardar</strong></center></h4></div>';
			}elseif ($resultado==3) {
				echo '<div class="alert alert-danger" role="alert"><center><h4>El <strong>CORREO</strong> ya esta en uso!</center></h4></div>';;
			}
	    }else{              	
	   
		?>

		<?php 
			}
		?>	
	</div>	

	<div class=" well container">
		<section class="">
			
			<div class="col-xs-12">
				<form name='' method='post' action='../controlador/validauser.php' enctype='application/x-www-form-urlencoded'>
					<div class="form-group">
						<select  class="form-control" name="categ" required/>
                           	<option value="">Tipo de usuario</option>
                           	<option value="Enlistador">Enlistador</option>
                           	<option value="Usuario">Usuario</option>
                           	<option value="Ventas">Ventas</option>
                        </select>	
					</div>
					<div class="form-group">
						<select  class="form-control" name="tipo" required/>
                           	<option value="Activo">Activo</option>
							<option value="Inactivo">Inactivo</option>
                        </select>	
					</div>
					<div class='form-group'>
						<label class='sr-only' for='correo'>Correo:</label>
						<input class='form-control' id='' type='text' placeholder='correo...' name='correo' required>
					</div>
					<div class="form-gruop">
						<label class='sr-only' for='password'>Contraseña:</label>
						<input class='form-control' id='' type='password' placeholder='contraseña...' name='password' required>
					</div>

					<div class='form-group'>
						<label class='sr-only' for='password'>Repetir Contraseña:</label>
						<input class='form-control' id='' type='password' placeholder='repetir contraseña...' name='password2' required>
						<?php 
							error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING); 
							if ($_GET['message']==2) {
						?>
							<small style="color:red;">debe contener 6 o mas caracteres</small>
						<?php }elseif($_GET['message']==1){?>
							<small style="color:red;">Las contraseñas no coinciden</small>	
						<?php }else{?>
							<small style="color:#848484;">Minimo 6 caracteres</small>
						<?php } ?>
					</div>
					<div class='form-group'>
						<label class='sr-only' for='nombre'>Nombre:</label>
						<input class='form-control' id='' type='text' placeholder='Nombre...' name='nombre' required>
					</div>
					<div class='form-group'>
						<label class='sr-only' for='apellido'>Apellido:</label>
						<input class='form-control' id='' type='text' placeholder='Apellido...' name='apellido' required>
					</div>
					<div class='form-group'>
						<center><img src="img/facebook.png" width="25" height="25" class="img-responsive img-circle"></center>
						<br>
						<input class='form-control' type='text' placeholder='www.facebook.com/usuario...' name='face' required>
					</div>
					<div class='form-group'>
						<center><img src="img/whatsapp.png" width="25" height="25" class="img-responsive img-circle"></center>
						<br>
						<input class='form-control' type='text' placeholder='+569XXXXXXXX' name='whats' required>
					</div>
					<div class='form-group'>
						<center><img src="img/instagram.png" width="25" height="25" class="img-responsive img-circle"></center>
						<br>
						<input class='form-control' type='text' placeholder='www.instagram.com/usuario...' name='insta' required>
					</div>
					
					<div class="btn-gruop">
						<button class='btn btn-success'>Guardar</button>
						<a href="mainControl.php" class="btn btn-primary btn-sm">Volver</a>
					</div>
				</form>
			</div>	
		</section>
		
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