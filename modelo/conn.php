<?php 
session_start();
include('../controlador/encryp.php');
	class Conexion
	{
		public $conexion;
		private $server = "localhost";
		private $usuario = "root";
		private $password = "";
		private $database = "apocaluz";



		public function __construct()
		{	
			//funcion creadora de conexión a BD
			$this->conexion = new mysqli($this->server, $this->usuario, $this->password, $this->database);
	
			if($this->conexion->connect_errno)
			{
				//Si la conexion no se realiza, envia alerta con el tipo de error.
				die("Error de conexion: (". $this->conexion->connect_errno.")");
			}
		}//end construct

		public function Cerrar()
		{
			//funcion para cerrar conexion a BD.
			$this->conexion->close();
		}//end cerrar

		public function login($usuario, $pass)
		{
			$this->email = $usuario;
			$this->password = $pass;
			$query="select * from users where email = '".$this->email."' and password = '".$this->password."' ";
			$consulta = $this->conexion->query($query);
			if ($row = mysqli_fetch_array($consulta) ) 
			{
				if ($row['activo']==0) 
				{
					header("Location:../vista/login.php?tip=inactivo");
				}
				else
				{
					$_SESSION['activo'] = true;
					$_SESSION['cod_user'] = $row['cod_user'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['categoria'] = $row['category_users'];
					$_SESSION['email'] = $row['email'];
					if ($_SESSION['categoria']=="Admin") 
					{					
						header("Location:../vista/mainControl.php");
					}
					elseif($_SESSION['categoria']=="Enlistador")
					{
						header("Location:../vista/rpad.php");
					}	
				}	
			}
			else
			{
				$resultado=encrypt("errordeusuario","KEY");
				header("Location:../vista/login.php?err=".$resultado."");
			}
		}//End Login/

		public function rpListaActivos()
		{
			$query="select * from lista";			
			$consulta = $this->conexion->query($query);

			if (mysqli_num_rows($consulta)==0)
			{
				echo "<div class='well'><center><h2>Debes ingresar una fecha de evento para ingresar ventas</h2></center><br></div>";
			}
			else
			{
				$query2="select * from users order by cod_user desc";			
				$consulta2 = $this->conexion->query($query2);

				if (mysqli_num_rows($consulta2)==0)
				{
					echo "<center><h1>No se encontraron resultados</h1></center>";
				}
				else
				{
					echo "<div class='table-responsive'>";
					
					echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
						echo "<thead>";
							echo "<tr class='info'>";      	  
								echo "<th>Nombre</th>";
								echo "<th>Apellido</th>";
								echo "<th><center>Accion</center></th>";
							echo "</tr>";
						echo "</thead>";
						echo "<tbody>"; 

					while ($row = mysqli_fetch_array($consulta2)) 
					{
						if ($row['activo']==1 && $row['category_users']=="Enlistador") 
						{
							echo "<tr>";
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'. $row['last_name'].'</td>';
							$resultado=encrypt($row['cod_user'],"KEY");
							echo '<td>
										<form method="post" action="../controlador/preventa.php?us='.$resultado.'" enctype="application/x-www-form-urlencoded">
												<div class="form-group">
												<center>
													<button type="submit" class="btn btn-success">
													  <span class="glyphicon glyphicon-plus"></span> Sumar</button>
												</center>	  
												</div>
											
										</form>
									</td>';
							echo "</tr>";
						}						
					}
						echo "</tbody>"; 
					echo "</table>";
					echo "</div>";
				}
			}	
		}//fin rpListaActivos


		public function addUser($categoria,$actividad, $nombre, $apellido, $correo, $password, $whatsapp, $facebook, $instagram, $fecha)
		{
			$this->email = $correo;
			$query="select * from users where email = '".$this->email."' ";
			$consulta = $this->conexion->query($query);
			if (mysqli_num_rows($consulta)==0) 
			{
				$query="insert into users (name, last_name, category_users, email, password, activo, whatsapp, facebook, instagram, create_at) values ('".$nombre."','".$apellido."','".$categoria."','".$correo."','".$password."','".$actividad."','".$whatsapp."','".$facebook."','".$instagram."','".$fecha."')";
				if ($this->conexion->query($query)) {
					$resp=1;
					$resultado=encrypt($resp,"KEY");
					header("Location:../vista/adduser.php?err=".$resultado."");	
				}else{
					$resp=2;
					$resultado=encrypt($resp,"KEY");
					header("Location:../vista/adduser.php?err=".$resultado."");
				}
			}
			else
			{
				$resp=3;
				$resultado=encrypt($resp,"KEY");
				header("Location:../vista/adduser.php?err=".$resultado."");
			}					
		}//end addUser

		public function addList($usuario, $fechaevento, $create, $update)
		{
			$query="select * from lista where fecha_event = '$fechaevento'  ";
			$consulta = $this->conexion->query($query);
			
			if (mysqli_num_rows($consulta)==0)
			{
				$query="insert into lista (cod_user, fecha_event, create_at, update_at) values ('".$usuario."', '".$fechaevento."', '".$create."', '".$update."')";
				if ($this->conexion->query($query)) 
				{
					$resp=1;
					$resultado=encrypt($resp,"KEY");
					header("Location:../vista/mainControl.php?err=".$resultado."");	
				}
				else
				{
					$resp=2;
					$resultado=encrypt($resp,"KEY");
					header("Location:../vista/mainControl.php?err=".$resultado."");
				}
	
			}
			else
			{
				$resp=3;
				$resultado=encrypt($resp,"KEY");
				header("Location:../vista/mainControl.php?err=".$resultado."");
			}
		}//end addList
		
		public function fevento()
		{
			$query="select * from lista order by cod_lista desc limit 1";
			$consulta = $this->conexion->query($query);
			if ($row = mysqli_fetch_array($consulta) ) 
			{
				$fecha_event= $row['fecha_event'];
				return $fecha_event;		
			}
		}//end fevento

		public function codEvento()
		{
			$query="select * from lista order by cod_lista desc limit 1";
			$consulta = $this->conexion->query($query);
			if ($row = mysqli_fetch_array($consulta) ) 
			{
				$cod_lista= $row['cod_lista'];
				return $cod_lista;		
			}
		}//end fevento

		public function rpAddVentas($codevento, $fechaevento, $create)
		{
			$update=$create;
			
			$query="select * from users";
			$consulta = $this->conexion->query($query);

			while($row = mysqli_fetch_array($consulta))
			{
				if ($row['activo']==1 && $row['category_users']=="Enlistador") 
				{
					$query2="insert into ventas(cod_user, cod_lista, tramo, can_ventas, total, fecha_event, create_at, update_at) values ('".$row['cod_user']."','".$codevento."','0','0','0','".$fechaevento."','".$create."','".$update."') ";
					
					if ($this->conexion->query($query2)) 
					{

					}
					else
					{
						echo "Error al ingresar rrpp a ventas";
						echo "<br>";
					}
					
				}
			}			
		}//fin rpVentas

		public function rpActivos()
		{
			$query="select * from users";
			$consulta = $this->conexion->query($query);

			if (mysqli_num_rows($consulta)==0)
			{
				echo "<center><h1>No se encontraron resultados</h1></center>";
			}
			else
			{
				echo "<div class='table-responsive'>";
				
				echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
					echo "<thead>";
						echo "<tr class='info'>"; 
							echo "<th>Codigo</th>";     	  
							echo "<th>Nombre</th>";
							echo "<th>Apellido</th>";
							echo "<th>Correo</th>";
							echo "<th>WhatsApp</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>"; 

				while ($row = mysqli_fetch_array($consulta)) 
				{
					if ($row['activo']==1 && $row['category_users']=="Enlistador") 
					{
						echo "<tr>";
							echo '<td>'.$row['cod_user'].'</td>';
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'. $row['last_name'].'</td>';
							echo '<td>'.$row['email'].'</td>';
							echo '<td>'.$row['whatsapp'].'</td>';
						echo "</tr>";
					}							
				}
					echo "</tbody>"; 
					echo "</table>";
				echo "</div>";
			}	
		}//end rpActivos

		public function modVentaRp($usuario, $update, $codigolista)
		{
			/*
			Calcular Tramo  
				tramo 1: 0 a 15 = $0
				tramo 2: 16 a 25 = $250
				tramo 3: 26 a 55 = $350
				tramo 4: 56 a 80 = $450
				tramo 5: 81 a 1000 = $550 
			Extraer cantidad de ventas y sumar 1.
			Extraer total, este 
			*/
			$resul=decrypt($usuario,"KEY");
			$query="select * from ventas where cod_user='".$resul."' ";
			$consulta = $this->conexion->query($query);
			if ($row = mysqli_fetch_array($consulta) ) {
				$cod_venta=$row['cod_venta'];
				$tramo=$row['tramo'];
				$can_ventas=$row['can_ventas'];
				$total=$row['total'];
				$fecha=$row['fecha_event'];
				$create=$row['create_at'];
			}
			else
			{
				echo "error";
			}

			$can_ventas=$can_ventas+1; 
			if ($can_ventas < 16) 
			{
				$tramo = 0;
			}
			elseif ($can_ventas>=16 and $can_ventas<=25) 
			{
				$tramo = 250;
			}
			elseif ($can_ventas>=26 and $can_ventas<=55) 
			{
				$tramo = 350;
			}
			elseif ($can_ventas>=56 and $can_ventas<=80) 
			{
				$tramo = 450;
			}
			elseif ($can_ventas>=81) 
			{
				$tramo = 550;
			}

			$total = $tramo * $can_ventas;

			$query2="update ventas set cod_user='".$resul."', cod_lista='".$codigolista."', tramo='".$tramo."', can_ventas='".$can_ventas."', total='".$total."', fecha_event='".$fecha."', create_at='".$create."', update_at='".$update."' where cod_venta='".$cod_venta."'  ";
			if ($this->conexion->query($query2)) 
			{
				$resp=1;
				$resultado=encrypt($resp,"KEY");
				header("Location:../vista/ventas.php?err=".$resultado."");
			}
			else
			{
				$resp=2;
				$resultado=encrypt($resp,"KEY");
				header("Location:../vista/ventas.php?err=".$resultado."");
			}
		}//end modVentaRp

		public function listaVentas($fechaevento)
		{
			$query="select * from ventas where fecha_event='".$fechaevento."' order by fecha_event desc";
			$consulta = $this->conexion->query($query);
			if (mysqli_num_rows($consulta)==0)
			{
				echo "<center><h1>No se encontraron resultados</h1></center>";
			}
			else
			{
				echo "<div class='table-responsive'>";
				echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
					echo "<thead>";
						echo "<tr class='info'>";      	  
							echo "<th>Usuario</th>";
							echo "<th>Tramo</th>";
							echo "<th>Invitaciones</th>";
							echo "<th>Total a pagar</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>"; 

				while ($row = mysqli_fetch_array($consulta)) 
				{
					echo "<tr>";
						echo '<td>';
								$usuario=$row['cod_user'];
								$query2="select * from users where cod_user='".$usuario."' ";
								$consulta2 = $this->conexion->query($query2);
								if ($row2 = mysqli_fetch_array($consulta2) ) 
								{
									echo $row2['name']." ".$row2['last_name'];
								}

						echo '</td>';
						echo '<td>'. $row['tramo'].'</td>';
						echo '<td>'.$row['can_ventas'].'</td>';
						echo '<td>$'.$row['total'].'</td>';
					echo '</tr>';
				}
				echo "<tr class='success'>";
						echo '<td>';
						echo '</td>';
						echo '<td>';
						echo '</td>';
						echo '<td>';
						echo '</td>';
						echo '<td>';
						echo '</td>';
				echo '</tr>';

				echo "</tbody>"; 
				echo "</table>";
				echo "</div>";
			}
		}// end listaVentas

		public function todasListas()
		{
			$query="select * from lista order by fecha_event desc";
			$consulta = $this->conexion->query($query);
			if (mysqli_num_rows($consulta)==0)
			{
				echo "<option value=''>No se han ingresado listas</option>";
			}
			else
			{
				while ($row = mysqli_fetch_array($consulta)) 
				{
					echo "<option value='".$row['fecha_event']."'>".$row['fecha_event']."</option>";
				}
			}
		}//end todoListas

		public function opUser($categoria)
		{
			$query="select * from users where category_users='".$categoria."' ";
			$consulta=$this->conexion->query($query);

			if (mysqli_num_rows($consulta)==0){
				echo "<div class='alert alert-success' role='alert'><center><h4>No se encontraron <strong>resultados!</strong></center></h4></div>";//cambiar por un alert
			}else{
				echo "<div class='table-responsive'>";
				echo "<br>";
				echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
					echo "<thead>";
						echo "<tr class='success'>";	         	  
							echo "<th>Nombre</th>";
							echo "<th>Apellido</th>";
							echo "<th>Correo</th>";
							echo "<th><center>Modificar / Eliminar</center></th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>"; 
				while ($row = mysqli_fetch_array($consulta)) {
						echo "<tr>";							
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'. $row['last_name'].'</td>';
							echo '<td>'.$row['email'].'</td>';
							$cod=encrypt($row['cod_user'],"KEY");
							echo '<td>
									<div class="col-xs-6">
									<form method="post" action="../vista/modUs.php?us='.$cod.'" enctype="application/x-www-form-urlencoded" class="">
											<div class="form-group">
												<center>
													<button type="submit" class="btn btn-warning">
													<span class="glyphicon glyphicon-pencil"></span></button>
												</center>	  
											</div>	
										</form>
									</div>
									<div class="col-xs-6">
										<form method="post" action="../vista/delUs.php?us='.$cod.'" enctype="application/x-www-form-urlencoded">
											<div class="form-group">
												<center>
													<button type="submit" class="btn btn-danger">
													<span class="glyphicon glyphicon-remove"></span></button>
												</center>	  
											</div>
										</form>
									</div>
								 </td>';
						echo "</tr>";
											
				}
					echo "</tbody>"; 
				echo "</table>";
				echo "</div>";
			}
		}//end opUser

		public function modUser ($codigo)
		{
			$codigo=decrypt($codigo,"KEY");
			$query="select * from users where cod_user=".$codigo."";
			$consulta=$this->conexion->query($query);
			if (mysqli_num_rows($consulta)==0)
			{
				echo "<center><h1>No se encontraron resultados</h1></center>";
			}
			else
			{

				echo "<div class='table-responsive'>";
				echo "<br>";
				echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
					echo "<thead>";

					echo "</thead>";
					echo "<tbody>"; 
				while ($row = mysqli_fetch_array($consulta)) 
				{
							echo '<form method="post" class="form-inline" action="../controlador/modUs.php" enctype="application/x-www-form-urlencoded">';
							echo '<input type="hidden" name="codigo" value="'.$row['cod_user'].'">';
							echo '<tr>';
							echo '<td>Categoria <select class="form-control" name="categoria" required>
											      <option value="'.$row['category_users'].'">'.$row['category_users'].'</option>
											      <option value="Enlistador">Enlistador</option>
											      <option value="Usuario">Usuario</option>
				                                  <option value="Ventas">Ventas</option>
											    </select></td>';
							echo '</tr>';
							
							if ($row['activo']==1) 
							{
								$actividad="Activo";
							}
							else
							{
								$actividad="Inactivo";
							}
							echo '<tr>';
							echo '<td>Actividad <select class="form-control" name="actividad" required>
											      <option value="'.$actividad.'">'.$actividad.'</option>
											      <option value="Activo">Activo</option>
											      <option value="Inactivo">Inactivo</option>
											    </select></td>';
							echo '</tr>';

							echo "<tr>";		
							echo '<td>Nombre<input class="form-control" name="name" type="text" value="'.$row['name'].'"></td>';
							echo '</tr>';

							echo "<tr>";
							echo '<td>Apellido<input class="form-control" name="last_name" type="text" value="'.$row['last_name'].'"></td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>Correo<input class="form-control" name="correo" type="text" value="'.$row['email'].'" required></td>';
							echo '</tr>';
							echo '<input type="hidden" name="password" value="'.$row['password'].'">';

							echo '</tr>';
							

							echo '<tr>';
							echo '<td>WhatsApp<input class="form-control" name="whatsapp" type="text" value="'.$row['whatsapp'].'"required></td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>Facebook<input class="form-control" name="facebook" type="text" value="'.$row['facebook'].'"required></td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>Instagram<input class="form-control" name="instagram" type="text" value="'.$row['instagram'].'"required></td>';
							echo '</tr>';
						
				}
				echo "</tbody>"; 
				echo "</table>";
				echo '<center>
						<button type="submit" class="btn btn-warning btn-lg">Modificar</button> 		
					</center>';
				echo "</form>";
				echo "</div>";
			}	
		}//end modUser

		public function modUserListo($codigo, $name,$last_name,$categoria,$email,$pass,$actividad,$whatsapp,$facebook,$instagram,$update)
		{
			$query="update users set name='".$name."', last_name='".$last_name."', category_users='".$categoria."', email='".$email."', password='".$pass."', activo='".$actividad."', whatsapp='".$whatsapp."', facebook='".$facebook."', instagram='".$instagram."', update_at='".$update."' where cod_user='".$codigo."' ";
			if ($this->conexion->query($query)) 
			{
				$resp=1;
				$resultado=encrypt($resp,"KEY");
				header("Location:../vista/opuser.php?res=".$resultado."");
			}
			else
			{
				$resp=2;
				$resultado=encrypt($resp,"KEY");
				header("Location:../vista/ventas.php?res=".$resultado."");
			}
		}//end modUserListo	

		public function elUs($codigo)
		{
			$cod=decrypt($codigo,"KEY");
			$query="delete from users where cod_user='".$cod."' ";
			if ($this->conexion->query($query)){
				$resultado=encrypt(3,"KEY");
				header("Location:../vista/opuser.php?res=".$resultado."");
			}else{
				$resultado=encrypt(4,"KEY");
				header("Location:../vista/opuser.php?res=".$resultado."");
			}
		}//end elUs

		public function todasCategorias()
		{
			$query="select * from users";
			$consulta = $this->conexion->query($query);
			if (mysqli_num_rows($consulta)==0)
			{
				echo "<option value=''>No se han ingresado listas</option>";
			}
			else
			{
				while ($row = mysqli_fetch_array($consulta)) 
				{
					echo "<option value='".$row['category_users']."'>".$row['category_users']."</option>";
				}
			}
		}//end todoListas

		public function listaOp()
		{
			$query="select * from lista";
			$consulta=$this->conexion->query($query);

			if (mysqli_num_rows($consulta)==0){
				echo "<div class='alert alert-success' role='alert'><center><h4>No se encontraron <strong>resultados!</strong></center></h4></div>";//cambiar por un alert
			}else{
				echo "<div class='table-responsive'>";
				echo "<br>";
				echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
					echo "<thead>";
						echo "<tr class='success'>";	         	  
							echo "<th><center>Fecha Evento</center></th>";
							echo "<th><center>Modificar / Eliminar</center></th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>"; 
				while ($row = mysqli_fetch_array($consulta)) {
						echo "<tr>";							
							echo '<td><center><strong>'.$row['fecha_event'].'</strong></center></td>';
							$cod=encrypt($row['cod_lista'],"KEY");
							echo '<td>
									<div class="col-xs-6">
									<form method="post" action="../vista/modLs.php?us='.$cod.'" enctype="application/x-www-form-urlencoded" class="">
											<div class="form-group">
												<center>
													<button type="submit" class="btn btn-warning">
													<span class="glyphicon glyphicon-pencil"></span></button>
												</center>	  
											</div>	
										</form>
									</div>
									<div class="col-xs-6">
										<form method="post" action="../vista/delLs.php?us='.$cod.'" enctype="application/x-www-form-urlencoded">
											<div class="form-group">
												<center>
													<button type="submit" class="btn btn-danger">
													<span class="glyphicon glyphicon-remove"></span></button>
												</center>	  
											</div>
										</form>
									</div>
								 </td>';
						echo "</tr>";
											
				}
					echo "</tbody>"; 
				echo "</table>";
				echo "</div>";
			}
		}//end listaOp

		public function modLs ($codigo)
		{
			$codigo=decrypt($codigo,"KEY");
			$query="select * from lista where cod_lista=".$codigo."";
			$consulta=$this->conexion->query($query);
			if (mysqli_num_rows($consulta)==0)
			{
				echo "<center><h1>No se encontraron resultados</h1></center>";//cambiar por alert

			}
			else
			{

				echo "<div class='well container'>";
				echo "<section>";
				echo "<div class='col-xs-12'>";
				
				while ($row = mysqli_fetch_array($consulta)) 
				{
							echo '<form method="post" class="" action="../controlador/modLs.php" enctype="application/x-www-form-urlencoded">';
							echo '<input type="hidden" name="codigo" value="'.$row['cod_lista'].'">';

							echo "<div class='form-group'>
									<label class='sr-only' for='fecha'>Fecha:</label>
									<input class='form-control' type='text' value='".$row['fecha_event']."' name='fecha' required>
								</div>";
							echo "<div class='btn-gruop'>
									<center><button type='submit' class='btn btn-warning btn-lg'>Modificar</button></center>
								</div>";
							echo "</form>";							
				}
				echo "</div>	
					</section>
					</div>";
				
			
				echo "<br>";
				echo "<br>";
				echo "<br>";
			}	
		}//end modUser

		public function modlistaFinal($codigo,$fecha,$update)
		{
			//$codigo." // ". $fecha." // ".$update;
		
			$query="update lista set fecha_event='".$fecha."', update_at='".$update."' where cod_lista='".$codigo."' ";
			
			if ($this->conexion->query($query)) 
			{
				$resp=1;
				$resultado=encrypt($resp,"KEY");
				header("Location:../vista/listin.php?res=".$resultado."");
			}
			else
			{
				$resp=2;
				$resultado=encrypt($resp,"KEY");
				header("Location:../vista/listin.php?res=".$resultado."");
			}
		}//end modUserListo

		public function elLs($codigo)
		{
			$cod=decrypt($codigo,"KEY");
			$query="delete from lista where cod_lista='".$cod."' ";
			if ($this->conexion->query($query)){
				$resultado=encrypt(3,"KEY");
				header("Location:../vista/listin.php?res=".$resultado."");
			}else{
				$resultado=encrypt(4,"KEY");
				header("Location:../vista/listin.php?res=".$resultado."");
			}
		}//end elUs

		public function addUserExtern($nombre, $apellido, $correo, $whatsapp, $facebook, $instagram, $fecha)
		{
			$this->email = $correo;
			$query="select * from users_extern where email = '".$this->email."' ";
			$consulta = $this->conexion->query($query);
			if (mysqli_num_rows($consulta)==0) 
			{
				$query="insert into users_extern (name, last_name, email, whatsapp, facebook, instagram, create_at) values ('".$nombre."','".$apellido."','".$correo."','".$whatsapp."','".$facebook."','".$instagram."','".$fecha."')";
				if ($this->conexion->query($query)) {
					$resp=1;
					$resultado=encrypt($resp,"KEY");
					header("Location:../vista/rpad.php?err=".$resultado."");	
				}else{
					$resp=2;
					$resultado=encrypt($resp,"KEY");
					header("Location:../vista/rpad.php?err=".$resultado."");
				}
			}
			else
			{
				$resp=3;
				$resultado=encrypt($resp,"KEY");
				header("Location:../vista/adduser.php?err=".$resultado."");
			}
		}//end addUserExtern

		public function listaRp($codigo)
		{
			$query="select * from ventas where cod_user='".$codigo."' order by fecha_event desc";
			$consulta = $this->conexion->query($query);
			if (mysqli_num_rows($consulta)==0)
			{
				echo "<center><h1>No se encontraron resultados</h1></center>";
			}
			else
			{
				echo "<div class='table-responsive'>";
				echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
					echo "<thead>";
						echo "<tr class='info'>";
							echo "<th>Fecha</th>";      	  
							echo "<th>Usuario</th>";
							echo "<th>Tramo</th>";
							echo "<th>Invitaciones</th>";
							echo "<th>Total a pagar</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>"; 

				while ($row = mysqli_fetch_array($consulta)) 
				{
					echo "<tr>";
						echo '<td>'. $row['fecha_event'].'</td>';
						echo '<td>';
								$usuario=$row['cod_user'];
								$query2="select * from users where cod_user='".$usuario."' ";
								$consulta2 = $this->conexion->query($query2);
								if ($row2 = mysqli_fetch_array($consulta2) ) 
								{
									echo $row2['name']." ".$row2['last_name'];
								}

						echo '</td>';
						echo '<td>'. $row['tramo'].'</td>';
						echo '<td>'.$row['can_ventas'].'</td>';
						echo '<td>$'.$row['total'].'</td>';
					echo '</tr>';
				}
				echo "<tr class='success'>";
						echo '<td>';
						echo '</td>';
						echo '<td>';
						echo '</td>';
						echo '<td>';
						echo '</td>';
						echo '<td>';
						echo '</td>';
						echo '<td>';
						echo '</td>';
				echo '</tr>';

				echo "</tbody>"; 
				echo "</table>";
				echo "</div>";
			}
		}// end listaVentas	
	}//end class
?>