<!--
===========================================================================
Controlador para mostrar los datos de los usuarios
Creado por: Edgard Ruiz  Gonzalez
Fecha: 01/11/2016
============================================================================
-->
<?php
    include_once "../modelo/model_actividad_entren.php";

    //Conectar con el modelo de Actividad
    $actividades = new Actividad();

    //Array asociativo de la tabla Actividad
    $arrayActividades = $actividades->listar();

?>
