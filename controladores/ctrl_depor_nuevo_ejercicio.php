<!--
===========================================================================
Controlador para añadir nuevo usuario
Creado por: Edgard Ruiz  Gonzalez
Fecha: 01/11/2016
============================================================================
-->

<?php

include_once "../modelo/model_ejercicio.php";

$idejercicio = $_POST['idejercicio'];
$nombre = $_POST['nombre'];
$tipoejercicio = $_POST['tipoejercicio'];
$niveldificultad = $_POST['niveldificultad'];
$anotacion = $_POST['anotacion'];

$nuevoejer = new Ejercicio($idejercicio, $nombre, $tipoejercicio, $niveldificultad, $anotacion);

//Crea el ejercicio
if ($nuevoejer->crear($nuevoejer))
    header('Location:../vistas/menu.php');
else
    die("Error al crear el ejercicio". $idejercicio);
?>