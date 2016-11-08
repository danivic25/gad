<!--
===========================================================================
Controlador para borrar una tabla de ejercicios
Creado por: Ramón Gago Carrera
Fecha: 08/11/2016
============================================================================
-->

<?php

include_once "../modelo/model_tablaejercicios.php";

$idtabla = $_POST['idtabla'];

$tab = new TablaEjercicios();

//Borrar la tabla de ejercicios
if ($tab->eliminar($idtabla))
    header('Location:../vistas/menu.php');
else
    die("Error al borrar tabla" . $idtabla);

?>