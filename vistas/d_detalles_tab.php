<!--
======================================================================
Modificar la tabla seleccionada
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
    //Obtiene el nombre de la tabla a modificar de la URL
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
                    <header><h1 id="logo"><a>- <?php echo $idioma["mod_tabla"];?> <?php echo $tabla; ?> -</a></h1></header>
                    <!--INICIO TABLA-->
                    <br>
                    <form name='FormModificar_Tabla' id='FormModificar_Tabla' action='../controladores/ctrl_depor_mod_tablaejercicios.php' method='post'>
                        <table class='default'>
                            <tr>
                                <td><?php echo $idioma["reg_tabla"]; ?></td>
                                <td><input type='text' disabled class='text' value="<?php echo $tab['idtabla']; ?>" / name='idtabla'></td>
                                <input type='hidden' value="<?php echo $tab['idtabla']; ?>" / name='idtabla'>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_nombretabla"];?></td>
                                <td><input type='text' class='text' value="<?php echo $tab['nombretabla']; ?>" / name='nombretabla' required></td>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_tipotabla"]; ?></td>
                                <td><input type='text' class='text' value="<?php echo $tab['tipotabla']; ?>"/ name='tipotabla' required></td>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_niveldificultadglobal"]; ?></td>
                                <td><input type='text' class='text' value="<?php echo $tab['niveldificultadglobal']; ?>"/ name='niveldificultadglobal' required></td>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_responsable"]; ?></td>
                                <td><input type='text' class='text' value="<?php echo $tab['responsable']; ?>"/ name='responsable' required></td>
                            </tr>
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
