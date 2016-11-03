<!--
===========================================================================
Controlador para asegurar el log out del usuario
Creado por: Edgard Ruiz  Gonzalez
Fecha: 01/11/2016
============================================================================
-->


<?php
//Se inicializa la sesión
session_start();
//se destruye la sesión
session_destroy();
//se redirige al Login 
header('Location:../vistas/login.php');
?>
