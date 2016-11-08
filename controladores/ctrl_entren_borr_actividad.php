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

$act = new Actividad();

//Borrar el usuario
if ($actu->eliminar($idactividad))
    header('Location:../vistas/e_menu.php');
else
    die("Error al borrar a" . $idactividad);

?>
