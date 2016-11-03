<!--
===========================================================================
Controlador para mostrar los datos de los usuarios
Creado por: Edgard Ruiz  Gonzalez
Fecha: 01/11/2016
============================================================================
-->
<?php
    include_once "../modelo/model_usuario.php";

    //Conectar con el modelo de Usuario
    $usuarios = new Usuario();
    
    //Array asociativo de la tabla Usuario
    $arrayUsuarios = $usuarios->listar();

    //Array asociativo de los empleados de la BD, usador por el gestor en g_nuevo_e.php
    $empleados = $usuarios->listarEmpleados();
?>