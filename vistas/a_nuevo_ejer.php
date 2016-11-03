<!--
======================================================================
Crea un usuario nuevo
Creado por: Edgard Ruiz Gonzalez
Fecha: 01/11/2016
======================================================================
-->

<!DOCTYPE HTML>
<html>
	<?php
	include_once('../controladores/ctrl_permisos.php');
	$includeIdioma = permisos("admin", "../");
	include_once $includeIdioma;

	include_once('../controladores/ctrl_usuario.php');
	//Obtiene el nombre del usuario a modificar de la URL
	if(isset($_GET['usu'])){
			$usuario = $_GET['usu'];
			//Obtiene los datos del usuario en un array asociativo
			$u = new Usuario();
			$usu = $u->consultar($usuario);
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
									<header><h1 id="logo"><a>- <?php echo $idioma['nuevo_usu'];?> -</a></h1></header>
										<!--INICIO TABLA-->
										<br>
										<form action='../controladores/ctrl_admin_nuevo_ejercicio.php' name="anuevoejer" method='post'>
													<table class='default'> 
														<tr> 
																<td>Idejercicio:</td> 
																<td><input type='text' class='text' name="idejercicio" required>
														<tr>
															<td><?php echo $idioma['perfil_tipoejercicio']; ?></td>
															<td><input type='email' class='text' name='tipoejercicio' required></td>	
														</tr>
														<tr>
															<td><?php echo $idioma['perfil_idejercicio']; ?></td>
																<td><input type='text' class='text' name='idejercicio' required></td>
														</tr>
														<tr>
															<td><?php echo $idioma['perfil_niveldificultad']; ?></td>
															<td><input type='niveldificultad' name='niveldificultad' id='niveldificultad' required></td>						
														</tr>
														<tr>
															<td><?php echo $idioma['perfil_anotaciones']; ?></td>
															<td><input type='anotaciones' name='anotaciones' id='anotaciones' required></td>						
														</tr>
													</table>
												</form>
										<!-- FIN TABLA -->
							</div>
						</div>
			</div>
	</body>
</html>