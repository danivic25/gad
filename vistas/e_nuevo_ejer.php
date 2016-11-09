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
														<tr> 
																<td>Idejercicio:</td> 
																<td><input type='text' class='text' name="idejercicio" required>
														<tr>
															<td><?php echo $idioma['reg_tipoejercicio']; ?></td>
															<td><input type='email' class='text' name='tipoejercicio' required></td>	
														</tr>
														<tr>
															<td><?php echo $idioma['reg_idejercicio']; ?></td>
																<td><input type='text' class='text' name='idejercicio' required></td>
														</tr>
														<tr>
															<td><?php echo $idioma['reg_niveldificultad']; ?></td>
															<td><input type='niveldificultad' name='niveldificultad' id='niveldificultad' required></td>						
														</tr>
													</table>
												</form>
										<!-- FIN TABLA -->
							</div>
						</div>
			</div>
	</body>
</html>