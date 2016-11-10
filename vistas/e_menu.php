<!--
======================================================================
Menu principal del usuario entrenador, donde puede ver la lista de actividades, tablas y ejercicios que puede gestionar
Creado por: Edgard Ruiz Gonzalez
Fecha: 01/11/2016
======================================================================
-->

<!DOCTYPE HTML>
<html>
<?php
include_once('../controladores/ctrl_permisos.php');
$includeIdioma = permisos("entrenador", "../");
include_once $includeIdioma;

include_once('../controladores/ctrl_ejercicio.php');
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
									<h1 id="logo"><a><?php echo $idioma["ejercicios"];?></a></h1>
										<!--INICIO TABLA-->
										<br>
											<table class="default">
													<!-- Listar Ejercicios -->
													<?php 
													foreach ($arrayEjercicio as $ejer)  {
													?>
													<tr>
														<td width='20%'> <?php echo $ejer['idejercicio'] ?> </td>
														<td width='20%'> <?php echo $ejer['nombreejercicio'] ?> </td>
														<td width='20%'> <?php echo $ejer['tipoejercicio'] ?> </td>
														<td width='20%'> <?php echo $ejer['niveldificultad'] ?> </td>
														<td width='10%'><a class="icon-edit" href="e_detalles_ejer.php?ejer=<?php echo $ejer['idejercicio']?>"> <div class='glyphicon glyphicon-edit'> </div></a></td>
														<td width='10%'><a class="icon-trash" href="e_menu_del.php?usu=<?php echo $ejer['idejercicio']?>"> <div class='glyphicon glyphicon-trash'> </div></a></td>
													</tr>
													<?php
													}
													?>
												</table>
												<!-- Boton crear ejercicio-->
												<table class='alternative'>
													<tr>
														<td width='25%'></td>
														<td width='15%' colspan='4'><div class='button'><a href="e_nuevo_ejer.php" class="boton"><?php echo $idioma['nuevo_ejer'];?></a></div></td>
														<td width='25%'></td>
													</tr>
												</table>
												<!--
										<br>
											<table class="default">
													<!-- Listar Actividades --><!--
													<?php 
													foreach ($arrayActividades as $act)  {
													?>
													<tr>
														<td width='12%'> <?php echo $act['idactividad'] ?> </td>
														<td width='12%'> <?php echo $act['nombreactividad'] ?> </td>
														<td width='12%'> <?php echo $act['horainicio'] ?> </td>
														<td width='12%'> <?php echo $act['horafin'] ?> </td>
														<td width='12%'> <?php echo $act['responsable'] ?> </td>
														<td width='12%'> <?php echo $act['tipoactividad'] ?> </td>
														<td width='12%'> <?php echo $act['numplazas'] ?> </td>
														<td width='5%'><a class="icon-edit" href="e_detalles_act.php?usu=<?php echo $act['idactividad']?>"> <div class='glyphicon glyphicon-edit'> </div></a></td>
														<td width='5%'><a class="icon-trash" href="e_menu_del.php?usu=<?php echo $act['idactividad']?>"> <div class='glyphicon glyphicon-trash'> </div></a></td>
													</tr>
													<?php
													}
													?>
												</table>-->
												<!-- Boton crear actividad --><!--
												<table class='alternative'>
													<tr>
														<td width='25%'></td>
														<td width='15%' colspan='4'><div class='button'><a href="e_nuevo_act.php" class="boton"><?php echo $idioma['e_nuevo_act'];?></a></div></td>
														<td width='25%'></td>
													</tr>
												</table>-->
										<!-- FIN TABLA -->
							</div>
						</div>
			</div>
	</body>
</html>