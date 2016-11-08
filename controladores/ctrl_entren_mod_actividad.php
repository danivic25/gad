<!--
===========================================================================
Controlador para añadir nueva actividad
Creado por: Daniel Victor Lopez Gonzalez
Fecha: 01/11/2016
============================================================================
-->

<?php

include_once "../modelo/model_actividad_entren.php";

$idactividad = $_POST['idactividad'];
$horainicio = $_POST['horainicio'];
$horafin = $_POST['horafin'];
$nombreactividad = $_POST['nombreactividad'];
$responsable = $_POST['responsable'];
$tipoactividad = $_POST['tipoactividad'];
$numplazasmax = $_POST['numplazasmax'];
$idsesion = $_POST['idsesion'];
$usuario_dni = $_POST['usuario_dni'];
$entrenador_dni = $_POST['entrenador_dni'];

$nuevaAct = new Actividad ($idactividad, $nombreactividad, $horainicio, $horafin, $responsable, $tipoactividad, $numplazasmax, $numplazasmax, $idsesion, $usuario_dni, $entrenador_dni);   /*CAMBIAAAAAAR*/

//Modificar la actividad
if ($nuevaAct->modificar($nuevaAct))
    header('Location:../vistas/e_menu.php');
else
    die("Error al crear la actividad". $idactividad);
?>
