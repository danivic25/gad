<!--
===========================================================================
Controlador para añadir nuevo usuario
Creado por: Edgard Ruiz  Gonzalez
Fecha: 01/11/2016
============================================================================
-->

<?php

include_once "../modelo/model_usuario.php";

$login = $_POST['login'];
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$pass = $_POST['password'];
$tipo = $_POST['tipo'];

$nuevoUsu = new Usuario($login, $nombre, $email, $pass, "", $tipo);

//Modificar el usuario
if ($nuevoUsu->crear($nuevoUsu))
    header('Location:../vistas/menu.php');
else
    die("Error al crear el usuario". $login);
?>