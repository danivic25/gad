<!--
===========================================================================
Controlador para añadir una nueva tabla de ejercicios
Creado por: Ramón Gago Carrera
Fecha: 08/11/2016
============================================================================
-->

<?php

include_once "../modelo/model_tablaejercicios.php";

$idtabla = $_POST['idtabla'];
$nombretabla = $_POST['nombretabla'];
$tipotabla = $_POST['tipotabla'];
$niveldificultadglobal = $_POST['niveldificultadglobal'];
$responsable = $_POST['responsable'];

$nuevatab = new TablaEjercicios($idtabla, $nombretabla, $tipotabla, $niveldificultadglobal, $responsable);

//Crea la tabla
if ($nuevatab->crear($nuevatab))
    header('Location:../vistas/menu.php');
else
    die("Error al crear la tabla". $idtabla);
?>