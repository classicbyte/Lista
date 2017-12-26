<?php
//include('../controlador/encryp.php');
include('../controlador/inuslt.php');
include('../controlador/sesion.php');
include('../modelo/conn.php');
$ev = new Conexion;
$resul=$ev->fevento();
if ($_SESSION['categoria']!="Admin") 
{
	header("Location:../vista/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::ConLista::.</title>
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
		
		<!-- Seccion Ingreso de fecha evento -->
		<div class="col-xs-12 col-sm-12">
			<div class="well">
					<form name='' method='post' action='../controlador/evento.php' enctype='application/x-www-form-urlencoded' class=''>
						<div class='form-group'>
							<center>
								<h3>
									<strong>Fecha proximo evento. </strong><a href="mainControl.php"><span class="glyphicon glyphicon-refresh"></span></a>
								</h3>
									<?php
										if(isset($_GET['err']))
										{
											$resultado=decrypt($_GET['err'],"KEY");
											if ($resultado==1) 
											{
												rpaventa();
												echo "<div class='alert alert-success' role='alert'>Lista <strong>creada!</strong></div>";	
											}
											elseif ($resultado==2) 
											{
												echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> al crear Lista</div>";
											}
											elseif ($resultado==3) 
											{
												echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> la fecha ya esta en uso</div>";
											}
											elseif ($resultado==4) 
											{
												echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Debes selecionar una fecha</div>";
											}
											elseif ($resultado==5) 
											{
												echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Debes selecionar una fecha mayor a la fecha actual</div>";
											}
									    }
									    else
									    {  
									?>
									<?php
											if ($resul=="") 
											{
												echo "<div class='alert alert-info' role='alert'><strong><h4>Antes de crear una lista, ingresa a los enlistadores que participaran en ella.</h4></strong></div>";
											}
											else
											{
												echo $div1="<div class='alert alert-info' role='alert'><h3><strong>".$resul."</strong></h3></div>";
											}
										
										}
									?>
							</center>
						</div>
						

						<div class="form-group">
			                <div class="input-group date form_date" data-date="" data-date-format="dd-mm-yy" data-link-field="dtp_input2" data-link-format="yy-mm-dd">
			                    <input class="form-control" type="text" name="fecha_event" readonly>
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								<span class="input-group-btn">
									<button class="btn btn-success">
										<span class="glyphicon glyphicon-arrow-right"></span>
									</button>
								</span>	
			                </div>
							<input type="hidden" id="dtp_input2" value="" /><br/>
							<!-- Respuesta datos Lista-->
							

			            </div>
					</form>
			</div>
		</div>	
	</div>

	<div class="container-fluid">
		<aside>
			<div class="color6 col-xs-12">
				<div class="well">
					<center><h3><strong>RRPP Activos</strong></h3>
					
					

					</center>
					<?php 
					echo $act = $ev->rpActivos();
					$ev->Cerrar();
				?>
				</div>
				
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
	<script type="text/javascript" src="datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

	<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</body>

</html>