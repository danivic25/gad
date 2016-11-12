<!--
======================================================================
Menu principal del usuario deportista, donde puede ver la lista de tablas de ejercicios que puede gestionar
Creado por: Daniel Victor Lopez Gonzalez
Fecha: 01/11/2016
======================================================================
-->

<!DOCTYPE HTML>
<html>
<?php
include_once('../controladores/ctrl_permisos.php');
$includeIdioma = permisos("deportista", "../");
include_once $includeIdioma;

include_once('../controladores/ctrl_tablaejercicios.php');
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
									<h1 id="logo"><a><?php echo $idioma["tabla"];?></a></h1>
									<!--INICIO TABLA-->
									<br>
										<table class="default">
											<tr>
												<th width='14%'><?php echo $idioma["idtabla"];?></th>
												<th width='14%'><?php echo $idioma["nombretabla"];?></th>
												<th width='14%'><?php echo $idioma["tipotabla"];?></th>
												<th width='14%'><?php echo $idioma["niveldificultadglobal"];?></th>
												<th width='14%'><?php echo $idioma["responsable"];?></th>
												<th width='15%'><?php echo $idioma["editar"];?></th>
												<th width='15%'><?php echo $idioma["eliminar"];?></th>
											</tr>14
											</table>
											<table class="default">
												<!-- Listar Usuarios -->
												<?php
												foreach ($arrayTablaEjercicios as $tab)  {
												?>
												<tr>
													<td width='14%'> <?php echo $tab['idtabla'] ?> </td>
													<td width='14%'> <?php echo $tab['nombretabla'] ?> </td>
													<td width='14%'> <?php echo $tab['tipotabla'] ?> </td>
													<td width='14%'> <?php echo $tab['niveldificultadglobal'] ?> </td>
													<td width='14%'> <?php echo $tab['responsable'] ?> </td>
													<td width='15%'><a class="icon-edit" href="d_detalles_tab.php?usu=<?php echo $tab['dni']?>"> <div class='glyphicon glyphicon-edit'> </div></a></td>
													<td width='15%'><a class="icon-trash" href="d_menu_del.php?usu=<?php echo $tab['dni']?>"> <div class='glyphicon glyphicon-trash'> </div></a></td>
												</tr>
												<?php
												}
												?>
											</table>
											<!-- Boton crear tabla -->
											<table class='alternative'>
												<tr>
													<td width='25%'></td>
													<td width='15%' colspan='4'><div class='button'><a href="d_nueva_tab.php" class="boton"><?php echo $idioma['nueva_tabla'];?></a></div></td>
													<td width='25%'></td>
												</tr>
											</table>
									<!-- FIN TABLA -->
							</div>
						</div>
			</div>
	</body>
</html>
