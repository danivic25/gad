<!--
======================================================================
Crea un ejercicio nuevo
Creado por: Ramón Gago Carrera
Fecha: 08/11/2016
======================================================================
-->

<!DOCTYPE HTML>
<html>
	<?php
	include_once('../controladores/ctrl_permisos.php');
	$includeIdioma = permisos("entrenador", "../");
	include_once $includeIdioma;

	include_once('../controladores/ctrl_ejercicio.php');
	//Obtiene el nombre del ejercicio a modificar de la URL
	if(isset($_GET['ejer'])){
			$ejercicio = $_GET['ejer'];
			//Obtiene los datos del ejercicio en un array asociativo
			$ej = new Ejercicio();
			$ejer = $ej->consultar($ejercicio);
	}
	?>
	
	<body class="left-sidebar">
		<!-- Wrapper -->
			<div id="wrapper">
			<!-- Include de la barra lateral -->
			<?php	include_once 'nav.php';?>
				<!-- Contenido -->
					<div id="content">
						<div class="inner">
							<!--INICIO SECCIÓN-->
									<header><h1 id="logo"><a>- <?php echo $idioma['nuevo_ejer'];?> -</a></h1></header>
										<!--INICIO TABLA-->
										<br>
										<form action='../controladores/ctrl_entren_nuevo_ejercicio.php' name="enuevoejer" method='post'>
													<table class='default'> 
														<td><?php echo $idioma['reg_nombreejercicio']; ?></td>
														<td><input type='text' class='text' name='nombreejercicio' required></td>
														</tr>
														<tr>
															<td><?php echo $idioma['reg_tipoejercicio']; ?></td>
															<td> <select name='tipo' required>
																 	<option value='musculacion' selected>--</option>
																 	<option value='musculacion'>musculacion</option>
																	<option value='cardio'>cardio</option>
																	<option value='estiramiento'>estiramiento</option>
																</select></td>						
														</tr>
														<tr>
															<td><?php echo $idioma['reg_niveldificultad']; ?></td>
															<td> <select name='tipo' required>
																 	<option value='bajo' selected>--</option>
																 	<option value='bajo'>bajo</option>
																	<option value='medio'>medio</option>
																	<option value='alto'>alto</option>
																</select></td>						
														</tr>
														<table class='alternative'>
														<tr>
														<td width='30%'></td>
														<td width='10%' colspan='4'><input type='submit' name='accion' value='<?php echo $idioma['guardar']; ?>'></td>
														<td width='25%'></td>
													</tr>
												</table>
													</table>
												</form>
										<!-- FIN TABLA -->
							</div>
						</div>
			</div>
	</body>
</html>