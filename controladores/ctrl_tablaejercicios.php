<!--
===========================================================================
Controlador para mostrar los datos de las tablas de ejercicios
Creado por: Ramón Gago Carrera	
Fecha: 08/11/2016
============================================================================
-->
<?php
    include_once "../modelo/model_tablaejercicios.php";

    //Conectar con el modelo de tablas de ejercicios
    $tablaejercicios = new TablaEjercicios();
    
    //Array asociativo de las tablas de ejercicios
    $arrayTablaEjercicios = $tablaejercicios->listar();
?>