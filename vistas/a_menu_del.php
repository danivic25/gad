<!--
======================================================================
Menu principal del usuario administrador, donde puede ver la lista de usuarios que puede gestionar
Creado por: Edgard Ruiz Gonzalez
Fecha: 01/11/2016
======================================================================
-->

<!DOCTYPE HTML>
<html>
    <?php
    include_once('../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("admin", "../");
    include_once $includeIdioma;

    include_once('../controladores/ctrl_usuario.php');
    //Obtiene el nombre del usuario a modificar de la URL
    if(isset($_GET['usu'])){
        $usuario = $_GET['usu'];
        //Obtiene los datos del usuario en un array asociativo
        $u = new Usuario();
        $usu = $u->consultar($usuario);
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
                    <header><h1 id="logo"><a>- <?php echo $idioma['borrar_usuario'];?> -</a></h1></header>
                    <!--INICIO TABLA-->
                    <h3 align="center"> <?php echo $idioma["seguro_borrar_usuario"];?> </h3>
                    <br>
                    <form name='FormBorrar_Usuario' id='FormBorrar_Usuario' action='../controladores/ctrl_admin_borr_usuario.php' method='post'>
                        <table class='default'>
                            <tr>  
                                <td>Login:</td> 
                                <td><input type='text' disabled value="<?php echo $usu['dni']; ?>" ></td>
                                <input type='hidden' value="<?php echo $usu['dni']; ?>" / name='login'>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_email"];?></td>
                                <td><input type='text' disabled value="<?php echo $usu['correo']; ?>"></td>	
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_nombre"]; ?></td>
                                <td><input type='text' disabled value="<?php echo $usu['nombreusuario']; ?>"></td>
                            </tr>

                        </table>
                        <table class='alternative'>
                            <tr>
                                <td width='30%'></td>
                                <td width='10%' colspan='4'><input type='submit'  name='accion' value='<?php echo $idioma["si"]; ?>'></a></td>
                        <td width='10%' colspan='4'><input type="button" value="<?php echo $idioma["no"]; ?>" onClick="document.location.href='menu.php'" /></td>
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