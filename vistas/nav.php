<!--
======================================================================
Layout para el sidebar de cada pagina, que muestra diferente contenido segun el usuario logueado
Creado por: Edgard Ruiz
Fecha: 01/11/2016
======================================================================
-->
<!-- SIDEBAR segun el usuario logueado -->
<?php 
switch ($_SESSION['tipo'])
	{
	case 'admin':
		?>
		<div id="sidebarAdmin"> 
			<h1 id='header'><a href='menu.php'>GAD</a></h1>		
      <nav id='nav'> 
        <ul>
					<div align='center'>
						<li class='current'><strong><a href="perfil.php?usu=<?php echo $_SESSION['login_usuario']?>"><img src="../img/avatar.png"><br><?php echo $_SESSION['login_usuario'] ?></a></strong></li>
						<li class='current'><a href="a_menu.php"><?php echo $idioma["gestionar_usuarios"];?></a></li>
						<li class='current'><a href="../controladores/ctrl_log_out.php" id='Logout_Usuario' onclick ='return Salir_Usuario()'>Log Out</a></li>
						<!-- Iconos de idioma -->
						<div class="col-sm-6 col-md-6">
							<li class="ico-idioma"><a href="../controladores/ctrl_cambio_idioma_espanol.php"><img class="ico-idioma" src="../img/ES.png"></a></li>
						</div>
						<div class="col-sm-6 col-md-6">
						<li class="ico-idioma"><a href="../controladores/ctrl_cambio_idioma_ingles.php"><img class="ico-idioma" src="../img/EN.png"></a></li>
						</div>
					</div>
				</ul>
			</nav>
		</div>
		<?php break;
		
	case 'entrenador':
		?>
		<div id="sidebarAdmin"> 
			<h1 id='header'><a href='e_menu.php'>GAD</a></h1>		
      <nav id='nav'> 
        <ul>
          <div align='center'>
            <li class='current'><strong><a href="perfil.php?usu=<?php echo $_SESSION['login_usuario']?>"><img src="../img/avatar.png"><br><?php echo $_SESSION['login_usuario'] ?></a></strong></li>
						<li class='current'><a href="e_menu.php"><?php echo $idioma["gestionar_ejercicios"];?></a></li>
						<li class='current'><a href="../controladores/ctrl_log_out.php" id='Logout_Usuario' onclick ='return Salir_Usuario()'>Log Out</a></li>
						<!-- Iconos de idioma -->
						<div class="col-sm-6 col-md-6">
							<li class="ico-idioma"><a href="../controladores/ctrl_cambio_idioma_espanol.php"><img class="ico-idioma" src="../img/ES.png"></a></li>
						</div>
						<div class="col-sm-6 col-md-6">
						<li class="ico-idioma"><a href="../controladores/ctrl_cambio_idioma_ingles.php"><img class="ico-idioma" src="../img/EN.png"></a></li>
						</div>
           </div>
				</ul>
			</nav>
		</div>
		<?php
		break;
		
	default:
		?>
		<div id="sidebarAdmin"> 
			<h1 id='header'><a href='d_menu.php'>GAD</a></h1>		
      <nav id='nav'> 
        <ul>
          <div align='center'>
             <li class='current'><strong><a href="perfil.php?usu=<?php echo $_SESSION['login_usuario']?>"><img src="../img/avatar.png"><br><?php echo $_SESSION['login_usuario'] ?></a></strong></li>
							<li class='current'><a href="d_menu.php"><?php echo $idioma["gestionar tablasejercicios"];?></a></li>
							<li class='current'><a href="../controladores/ctrl_log_out.php" id='Logout_Usuario' onclick ='return Salir_Usuario()'>Log Out</a></li>
						<!-- Iconos de idioma -->
						<div class="col-sm-6 col-md-6">
							<li class="ico-idioma"><a href="../controladores/ctrl_cambio_idioma_espanol.php"><img class="ico-idioma" src="../img/ES.png"></a></li>
						</div>
						<div class="col-sm-6 col-md-6">
						<li class="ico-idioma"><a href="../controladores/ctrl_cambio_idioma_ingles.php"><img class="ico-idioma" src="../img/EN.png"></a></li>
						</div>
           </div>
				</ul>
			</nav>
		</div>
		<?php
		break;
	}
?>