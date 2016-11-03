<!--
======================================================================
Menu principal del usuario administrador, donde puede ver la lista de usuarios que puede gestionar
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
									<h1 id="logo"><a><?php echo $idioma["usuarios"];?></a></h1>
										<!--INICIO TABLA-->
										<br>
											<table class="default">
												<tr>
													<th width='20%'>Login</th>
													<th width='20%'><?php echo $idioma["reg_nombre"];?></th>
													<th width='20%'>Email</th>
													<th width='20%'>Rol</th>
													<th width='10%'><?php echo $idioma["editar"];?></th>
													<th width='10%'><?php echo $idioma["eliminar"];?></th>
												</tr>
												</table>
												<table class="default">
													<!-- Listar Usuarios -->
													<?php 
													foreach ($arrayUsuarios as $usu)  {
													?>
													<tr>
														<td width='20%'> <?php echo $usu['dni'] ?> </td>
														<td width='20%'> <?php echo $usu['nombreusuario'] ?> </td>
														<td width='20%'> <?php echo $usu['correo'] ?> </td>
														<td width='20%'> <?php echo $usu['tipousuario'] ?> </td>
														<td width='10%'><a class="icon-edit" href="a_detalles_usu.php?usu=<?php echo $usu['dni']?>"> <div class='glyphicon glyphicon-edit'> </div></a></td>
														<td width='10%'><a class="icon-trash" href="a_menu_del.php?usu=<?php echo $usu['dni']?>"> <div class='glyphicon glyphicon-trash'> </div></a></td>
													</tr>
													<?php
													}
													?>
												</table>
												<!-- Boton crear usuario -->
												<table class='alternative'>
													<tr>
														<td width='25%'></td>
														<td width='15%' colspan='4'><div class='button'><a href="a_nuevo_usu.php" class="boton"><?php echo $idioma['nuevo_usu'];?></a></div></td>
														<td width='25%'></td>
													</tr>
												</table>
										<!-- FIN TABLA -->
							</div>
						</div>
			</div>
	</body>
</html>