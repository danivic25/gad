<!--
======================================================================
Menu principal del usuario entrenador, donde puede ver la lista de ejercicios que puede gestionar
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
                    <header><h1 id="logo"><a>- <?php echo $idioma['borrar_ejercicio'];?> -</a></h1></header>
                    <!--INICIO TABLA-->
                    <h3 align="center"> <?php echo $idioma["seguro_borrar_ejercicio"];?> </h3>
                    <br>
                    <form name='FormBorrar_Ejercicio' id='FormBorrar_Ejercicio' action='../controladores/ctrl_admin_borr_ejercicio.php' method='post'>
                        <table class='default'>
                            <tr>  
                                <td>idejercicio</td> 
                                <td><input type='text' disabled value="<?php echo $ejer['idejercicio']; ?>" ></td>
                                <input type='hidden' value="<?php echo $ejer['idejercicio']; ?>" / name='idejercicio'>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_nombreejercicio"];?></td>
                                <td><input type='text' disabled value="<?php echo $ejer['nombreejercicio']; ?>"></td>	
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_tipoejercicio"]; ?></td>
                                <td><input type='text' disabled value="<?php echo $ejer['tipoejercicio']; ?>"></td>
                            </tr>
                             <tr>
                                <td><?php echo $idioma["reg_niveldificultad"]; ?></td>
                                <td><input type='text' disabled value="<?php echo $ejer['niveldificultad']; ?>"></td>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_descripcionejercicio"]; ?></td>
                                <td><input type='text' disabled value="<?php echo $ejer['descripcionejercicio']; ?>"></td>
                            </tr>
                        </table>
                        <table class='alternative'>
                            <tr>
                                <td width='30%'></td>
                                <td width='10%' colspan='4'><input type='submit'  name='accion' value='<?php echo $idioma["si"]; ?>'></a></td>
                        <td width='10%' colspan='4'><input type="button" value="<?php echo $idioma["no"]; ?>" onClick="document.location.href='e_menu.php'" /></td>
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