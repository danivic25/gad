<!--
===========================================================================
Controlador para idioma de usuario en español
Creado por: Edgard Ruiz  Gonzalez
Fecha: 01/11/2016
============================================================================
-->


<?php
include_once '../modelo/model_usuario.php';

session_start();

$usu = new Usuario();
$idUsu = $_SESSION['login_usuario'];

if($usu->setIdioma('esp', $idUsu)){
	$_SESSION["idioma"] = 'esp';
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>