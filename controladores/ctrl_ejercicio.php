<!--
===========================================================================
Controlador para mostrar los datos de los ejercicios
Creado por: Ramón Gago Carrera	
Fecha: 08/11/2016
============================================================================
-->
<?php
    include_once "../modelo/model_ejercicio.php";

    //Conectar con el modelo de tablas de ejercicios
    $ejercicio = new Ejercicio();
    
    //Array asociativo de las tablas de ejercicios
    $arrayEjercicio = $Ejercicio->listar();
?>