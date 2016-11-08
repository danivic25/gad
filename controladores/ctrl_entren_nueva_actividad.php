<!--
===========================================================================
Controlador para añadir nueva actividad
Creado por: Daniel Victor Lopez Gonzalez
Fecha: 01/11/2016
============================================================================
-->

<?php

include_once "../modelo/model_actividad_entr.php";

$login = $_POST['login'];     /*CAMBIAR ATRITUBUTOS*/
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$pass = $_POST['password'];
$tipo = $_POST['tipo'];

$nuevaAct = new Actividad ($login, $nombre, $email, $pass, "", $tipo);   /*CAMBIAAAAAAR*/

//Modificar el usuario
if ($nuevaAct->crear($nuevaAct))
    header('.....................');    /*INTRODUCIR LOCALIZACION DE LA VISTA */
else
    die("Error al crear la actividad". $login); /*CAMBIAR ESE $LOGIN*/
?>
