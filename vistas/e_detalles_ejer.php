<!--
======================================================================
Modificar el ejercicio seleccionado
Creado por: Ramón Gago Carrera
Fecha: 09/11/2016
======================================================================
-->

<!DOCTYPE HTML>
<html>
    <?php
    include_once('../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("entrenador", "../");
    include_once $includeIdioma;

    include_once('../controladores/ctrl_ejercicio.php');
    //Obtiene el nombre del ejercicio a modificar de la URL
    if(isset($_GET['ejer'])){
        $ejercicio = $_GET['ejer'];
        //Obtiene los datos del ejercicio en un array asociativo
        $ej = new Ejercicio();
        $ejer = $ej->consultar($ejercicio);
    }
    ?>

    <body class="left-sidebar">
        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Include de la barra lateral -->
            <?php	include_once 'nav.php';?>
            <!-- Contenido -->
            <div id="content">
                <div class="inner">
                    <!--INICIO SECCIÓN-->
                    <header><h1 id="logo"><a>- <?php echo $idioma["mod_ejercicios"];?> <?php echo $ejercicio; ?> -</a></h1></header>
                    <!--INICIO TABLA-->
                    <br>
                    <form name='FormModificar_Ejercicio' id='FormModificar_Ejercicio' action='../controladores/ctrl_entren_mod_ejercicio.php' method='post'>
                        <table class='default'>
                            <tr> 
                                <td><?php echo $idioma["reg_ejercicio"]; ?></td> 
                                <td><input type='text' disabled class='text' value="<?php echo $ejer['idejercicicio']; ?>" / name='idejercicio'></td>
                                <input type='hidden' value="<?php echo $ejer['idejercicicio']; ?>" / name='idejercicicio'>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_nombreejercicio"];?></td>
                                <td><input type='email' class='text' value="<?php echo $ejer['nombreejercicio']; ?>" / name='nombreejercicio' required></td>	
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_tipoejercicio"]; ?></td>
                                <td><input type='text' class='text' value="<?php echo $usu['nombreusuario']; ?>"/ name='tipoejercicicio' required></td>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_niveldificultad"]; ?></td>
                                <td><input type='text' class='text' value="<?php echo $ejer['niveldificultad']; ?>"/ name='niveldificultad' required></td>
                            </tr>
                        </table>
                        <table class='alternative'>
                            <tr>
                                <td width='30%'></td>
                                <td width='10%' colspan='4'><input type='submit' name='accion' value='<?php echo $idioma["guardar"]; ?>'></td>
                                <td width='25%'></td>
                            </tr>
                        </table>
                    </form>
                    <!-- FIN TABLA -->
                </div>
            </div>
        </div>
    </body>
</html>