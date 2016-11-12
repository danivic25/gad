<!--
======================================================================
Menu principal del usuario deportista, donde puede ver la lista de tablas que puede gestionar
Creado por: Daniel Victor Lopez Gonzalez
Fecha: 09/11/2016
======================================================================
-->

<!DOCTYPE HTML>
<html>
    <?php
    include_once('../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("deportista", "../");
    include_once $includeIdioma;

    include_once('../controladores/ctrl_tablaejercicios.php');
    //Obtiene el nombre del ejercicio a modificar de la URL
    if(isset($_GET['tab'])){
        $tabla = $_GET['tab'];
        //Obtiene los datos de la tabla en un array asociativo
        $ta = new Tabla();
        $tab = $ta->consultar($tabla);
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
                    <header><h1 id="logo"><a>- <?php echo $idioma['borrar_tabla'];?> -</a></h1></header>
                    <!--INICIO TABLA-->
                    <h3 align="center"> <?php echo $idioma["seguro_borrar_tabla"];?> </h3>
                    <br>
                    <form name='FormBorrar_Tabla' id='FormBorrar_Tabla' action='../controladores/ctrl_admin_borr_ejercicio.php' method='post'>
                        <table class='default'>
                            <tr>
                                <td>idtabla:</td>
                                <td><input type='text' disabled value="<?php echo $tab['idejercicio']; ?>" ></td>
                                <input type='hidden' value="<?php echo $tab['idejercicio']; ?>" / name='idejercicio'>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_nombretabla"];?></td>
                                <td><input type='text' disabled value="<?php echo $tab['nombretabla']; ?>"></td>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_tipotabla"]; ?></td>
                                <td><input type='text' disabled value="<?php echo $tab['tipotabla']; ?>"></td>
                            </tr>
                             <tr>
                                <td><?php echo $idioma["reg_niveldificultadglobal"]; ?></td>
                                <td><input type='text' disabled value="<?php echo $tab['niveldificultadglobal']; ?>"></td>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_responsable"]; ?></td>
                                <td><input type='text' disabled value="<?php echo $tab['responsable']; ?>"></td>
                            </tr>
                        </table>
                        <table class='alternative'>
                            <tr>
                                <td width='30%'></td>
                                <td width='10%' colspan='4'><input type='submit'  name='accion' value='<?php echo $idioma["si"]; ?>'></a></td>
                        <td width='10%' colspan='4'><input type="button" value="<?php echo $idioma["no"]; ?>" onClick="document.location.href='d_menu.php'" /></td>
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
