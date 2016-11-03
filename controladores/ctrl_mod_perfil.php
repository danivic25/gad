<!--
===========================================================================
Controlador para modificar los datos de un usuario
Creado por: Edgard Ruiz Gonzalez
Fecha: 01/11/2016
============================================================================
-->

<?php
session_start();
include_once "../modelo/model_usuario.php";

$login = $_POST['login'];
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$pass = $_POST['Password_Usuario'];
$tipo = $_SESSION['tipo'];


$nuevoUsu = new Usuario($login, $nombre, $email, $pass, "", $tipo);

//Modificar el usuario
if ($nuevoUsu->modificar($login, $nuevoUsu))
    header('Location:../vistas/menu.php');
else
    die("Error al modificar los datos de perfil");
?>