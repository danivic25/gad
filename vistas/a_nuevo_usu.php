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
										<form action='../controladores/ctrl_admin_nuevo_usuario.php' name="anuevousu" method='post'>
													<table class='default'> 
														<tr> 
																<td>Login:</td> 
																<td><input type='text' class='text' name="login" required>
														<tr>
															<td><?php echo $idioma['perfil_correo']; ?></td>
															<td><input type='email' class='text' name='email' required></td>	
														</tr>
														<tr>
															<td><?php echo $idioma['perfil_nombre']; ?></td>
																<td><input type='text' class='text' name='nombre' required></td>
														</tr>
														<tr>
														<td width='25%'>Rol:</td>
                            <td width='25%'>
															 <select name='tipo' required>
																 	<option value='admin' selected>--</option>
																 	<option value='admin'>Admin</option>
																	<option value='gestor'>Entrenador</option>
																	<option value='empleado'>Deportista</option>
																</select>
                            </td>
														</tr>
														<tr>
															<td><?php echo $idioma['perfil_contrasena']; ?></td>
															<td><input type='password' name='password' id='password' required></td>						
														</tr>
													</table>
												<table class='alternative'>
													<tr>
														<td width='30%'></td>
														<td width='10%' colspan='4'><input type='submit' onclick="cifrar()"  name='accion' value='<?php echo $idioma['guardar']; ?>'></td>
								<td width='25%'></td>
													</tr>
												</table>
											</form>
										<!-- FIN TABLA -->
							</div>
						</div>
			</div>
	</body>

    <script src="../js/md5.js" type="text/javascript"></script> 
    <script>
        function cifrar(){
            var input_pass = document.getElementById("password");
            input_pass.value = hex_md5(input_pass.value);
        }
    </script>
</html>