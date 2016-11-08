<!--
===========================================================================
Controlador para modificar una tabla ejercicios
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

//Modificar la tabla de ejercicios
if ($nuevatab->modificar($idtabla, $nuevatab))
    header('Location:../vistas/menu.php');
else
    die("Error al modificar la tabla de ejercicios". $idtabla);
?>