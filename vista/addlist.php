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
	<link href="datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body class="">
	<div class="container">
		<header>
			<nav>
				
			</nav>
		</header>			
	</div>
	<?php
	if(isset($_GET['err'])){
		$resultado=decrypt($_GET['err'],"KEY");
		if ($resultado==1) {
			echo "<div class='col-md-12'><br><center><h2 style='color:#01DF01; font-size:1.5em;'>Datos Guardados.</h2></center></div>";
		}elseif ($resultado==2) {
			echo "<br><center><h2 style='color:#F00; font-size:1.5em;'>Error al adjuntar link</h2></center>";
		}
    }else{              	
   
?>

<?php 
	}
?>		

	<div class="container">
		<section class="">
			<div class="col-xs-12">
				<center><h3></h3></center>
			</div>

			<div class="col-xs-12">
				<form name='' method='post' action='../controlador/validauser.php' enctype='application/x-www-form-urlencoded' class=''>
					<div class='form-group'>
						<label class='sr-only' for='correo'>Correo:</label>
						<input class='form-control' id='' type='text' placeholder='correo...' name='correo' required>
					</div>

					<div class="form-group">
		                <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="" readonly>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="dtp_input2" value="" /><br/>
		            </div>
					
					<div class="btn-gruop">
						<button class='btn btn-success'>Guardar</button>
						<a href="mainControl.php" class="btn btn-primary btn-sm">Volver</a>
					</div>
				</form>
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