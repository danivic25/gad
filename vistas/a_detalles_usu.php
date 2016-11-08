<!--
======================================================================
Modificar el usuario seleccionado
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
                    <header><h1 id="logo"><a>- <?php echo $idioma["mod_usuarios"];?> <?php echo $usuario; ?> -</a></h1></header>
                    <!--INICIO TABLA-->
                    <br>
                    <form name='FormModificar_Usuario' id='FormModificar_Usuario' action='../controladores/ctrl_admin_mod_usuario.php' method='post'>
                        <table class='default'>
                            <tr> 
                                <td><?php echo $idioma["reg_usuario"]; ?></td> 
                                <td><input type='text' disabled class='text' value="<?php echo $usu['dni']; ?>" / name='login'></td>
                                <input type='hidden' value="<?php echo $usu['dni']; ?>" / name='login'>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_email"];?></td>
                                <td><input type='email' class='text' value="<?php echo $usu['correo']; ?>" / name='email' required></td>	
                            </tr>
                            <tr>
                                <td><?php echo $idioma["reg_nombre"]; ?></td>
                                <td><input type='text' class='text' value="<?php echo $usu['nombreusuario']; ?>"/ name='nombre' required></td>
                            </tr>
                            <tr>
                                <td width='25%'>Rol:</td>
                                <td width='25%'>
                                    <select name='tipo' required>

                                        <?php switch($usu['tipo']){
                                    case 'admin':
                                        ?>
                                        <option value='admin' selected>admin</option>
                                        <option value='entrenador'>entrenador</option>
                                        <option value='deportista'>deportista</option>
                                        <?php break;
                                    case 'entrenador':
                                        ?>
                                        <option value='admin'>admin</option>
                                        <option value='entrenador' selected>entrenador</option>
                                        <option value='deportista'>deportista</option>
                                        <?php break;
                                    default:
                                        ?>
                                        <option value='admin'>admin</option>
                                        <option value='entrenador'>entrenador</option>
                                        <option value='deportista' selected>deportista</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $idioma["perfil_contrasena"];?></td>
                                <td><input type='password' name='password' id='password' required></td>						
                            </tr>
                        </table>
                        <table class='alternative'>
                            <tr>
                                <td width='30%'></td>
                                <td width='10%' colspan='4'><input type='submit' onclick="cifrar()"  name='accion' value='<?php echo $idioma["guardar"]; ?>'></td>
                                <td width='25%'></td>
                            </tr>
                        </table>
                    </form>
                    <!-- FIN TABLA -->
                </div>
            </div>
        </div>
    </body>

    <script src="../js/md5.js" type="text/javascript"></script> 
    <script>
        function cifrar(){
            var input_pass = document.getElementById("password");
            input_pass.value = hex_md5(input_pass.value);
        }
    </script>
</html>