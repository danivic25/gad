<!--
===========================================================================
Controlador para borrar usuario
Creado por: Edgard Ruiz  Gonzalez
Fecha: 01/11/2016
============================================================================
-->

<?php

include_once "../modelo/model_usuario.php";

$login = $_POST['login'];

$usu = new Usuario();

//Borrar el usuario
if ($usu->eliminar($login))
    header('Location:../vistas/menu.php');
else
    die("Error al borrar a" . $login);

?>