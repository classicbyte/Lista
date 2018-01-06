<?php 
include('../controlador/sesion.php');
include('../modelo/conn.php');
$ev = new Conexion;
$resulfe=$ev->fevento();
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
	<br>
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="#">Ingreso de invitaciones</a></li>
		<li role="presentation"><a href="../controlador/salir.php?sal=salir">Cerrar Sesion</a></li>
	</ul>
	<br>
	
	<div class="container-fluid">
		<div class="well">
			<center>
				<h2><strong>Ingreso de visitas para el evento: </strong><a href="rpventa.php"><span class="glyphicon glyphicon-refresh"></span></a></h2>
				<h3><?php echo $resulfe ?></h3>
				<?php 
					if (isset($_GET['err']))
					{

						$res=decrypt($_GET['err'],"KEY");
						if ($res==1) {
							echo '<div class="alert alert-success" role="alert"><h4>Venta <strong>registrada!</strong></h4></div>';
						}
						else
						{
							echo '<div class="alert alert-info" role="alert">Busca el nombre del rrpp y suma una visita.</div>';
						}
						
						
					}
					
					else 
					{
						echo '<div class="alert alert-info" role="alert">Busca el nombre del rrpp y suma una visita.</div>';
					}
					

				?>				

			</center>
		</div>
	</div>

	<div class="container-fluid">
		<aside>
			<div class="color6 col-xs-12">
				<?php
					$inn = new Conexion;
					$html = $inn->rpListaActivos($resulfe);
					if ($html!="") {
						echo $html;
					}
					$inn->Cerrar();
				?>
			</div>
		</aside>
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