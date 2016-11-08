<!--
===========================================================================
Controlador para modificar ejercicio
Creado por: Ramón Gago Carrera
Fecha: 08/11/2016
============================================================================
-->

<?php

include_once "../modelo/model_ejercicio.php";

$idejercicio; = $_POST['$idejercicio'];
$nombreejercicio = $_POST['nombreejercicio'];
$tipoejercicio = $_POST['tipoejercicio'];
$niveldificultad = $_POST['niveldificultad'];
$anotaciones = $_POST['anotaciones'];


$nuevoEjer = new Ejercicio($idejercio, $nombreejercicio, $tipoejercicio, $niveldificultad, $anotaciones);

//Modificar el ejercicio
if ($nuevoEjer->modificar($idejercicio, $nuevoEjer))
    header('Location:../vistas/menu.php');
else
    die("Error al modificar el ejercicio". $idejercicio);
?>