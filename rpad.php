<?php 
include('../controlador/sesion.php');
include('../controlador/encryp.php')

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
	<br>
	<ul class="nav nav-tabs">
		<li role="presentation"><a href="#">Incio</a></li>
		<li role="presentation" class="active"><a href="#">Agregar Amigos</a></li>
		<li role="presentation"><a href="rplista.php">Listas</a></li>
		<li role="presentation"><a href="../controlador/salir.php?sal=salir">Cerrar Sesion</a></li>
	</ul>
	<br>
	<div class="container-fluid">
		<div class="well">
				<center><h2><strong>Ingreso de Usuarios </strong><a href="rpad.php"><span class="glyphicon glyphicon-refresh"></span></a></h2></center>
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
				<form name='' method='post' action='../controlador/rpad.php' enctype='application/x-www-form-urlencoded'>
					
					<div class='form-group'>
						<label class='sr-only' for='nombre'>Nombre:</label>
						<input class='form-control' id='' type='text' placeholder='Nombre...' name='nombre' required>
					</div>
					<div class='form-group'>
						<label class='sr-only' for='apellido'>Apellido:</label>
						<input class='form-control' id='' type='text' placeholder='Apellido...' name='apellido' required>
					</div>
					<div class='form-group'>
						<label class='sr-only' for='correo'>Correo:</label>
						<input class='form-control' id='' type='text' placeholder='Correo...' name='correo' required>
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
						<center><button class='btn btn-success'>Guardar</button></center>
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