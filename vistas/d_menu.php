<!--
======================================================================
Menu principal del usuario deportista, donde puede ver la lista de tablas de ejercicios que puede gestionar
Creado por: Ramón Gago Carrera
Fecha: 01/11/2016
======================================================================
-->

<!DOCTYPE HTML>
<html>
<?php
include_once('../controladores/ctrl_permisos.php');
$includeIdioma = permisos("deportista", "../");
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
													<!-- Listar Tablas de ejercicios -->
													<?php 
													foreach ($arrayTablasEjercicios as $tab)  {
													?>
													<tr>
														<td width='16%'> <?php echo $tab['idtabla'] ?> </td>
														<td width='16%'> <?php echo $tab['nombretabla'] ?> </td>
														<td width='16%'> <?php echo $tab['tipotabla'] ?> </td>
														<td width='16%'> <?php echo $tab['responsable'] ?> </td>
														<td width='16%'> <?php echo $tab['niveldificultadglobal'] ?> </td>
														<td width='10%'><a class="icon-edit" href="d_detalles_tab.php?usu=<?php echo $tab['idtabla']?>"> <div class='glyphicon glyphicon-edit'> </div></a></td>
														<td width='10%'><a class="icon-trash" href="d_menu_del.php?usu=<?php echo $tab['idtabla']?>"> <div class='glyphicon glyphicon-trash'> </div></a></td>
													</tr>
													<?php
													}
													?>
												</table>
												<!-- Boton crear actividad -->
												<table class='alternative'>
													<tr>
														<td width='25%'></td>
														<td width='15%' colspan='4'><div class='button'><a href="d_nuevo_tab.php" class="boton"><?php echo $idioma['d_nuevo_tab'];?></a></div></td>
														<td width='25%'></td>
													</tr>
												</table>
										<!-- FIN TABLA -->
							</div>
						</div>
			</div>
	</body>
</html>