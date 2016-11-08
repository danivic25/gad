<!--
===========================================================================
Controlador para borrar ejercicio
Creado por: Ramón Gago Carrera	
Fecha: 08/11/2016
============================================================================
-->

<?php

include_once "../modelo/model_ejercicio.php";

$idejercicio = $_POST['idejercicio'];

$ejer = new Ejercicio();

//Borrar el ejercicio
if ($ejer->eliminar($idejercicio))
    header('Location:../vistas/menu.php');
else
    die("Error al borrar ejercicio" . $idejercicio);

?>