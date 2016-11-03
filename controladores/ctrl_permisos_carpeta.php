<!--
===========================================================================
Controlador para dar permisos a una carpeta del servidor y poder subir archivos
Creado por: Edgard Ruiz  Gonzalez
Fecha: 01/11/2016
============================================================================
-->

<?php

<?php
$connection = ssh2_connect('193.146.46.24', 22);
ssh2_auth_password($connection, 'root', 'iu');
$sftp = ssh2_sftp($connection);


mkdir("ssh2.sftp://$sftp/var/www/html/ET3/entregables"); 
?>


/*
<?php
// Make our connection
$connection = ssh2_connect('193.146.46.24');
 
// Authenticate
if (!ssh2_auth_password($connection, 'root', 'iu')) {
    throw new Exception('Unable to connect.');
}
 
// Create our SFTP resource
if (!$sftp = ssh2_sftp($connection)) {
    throw new Exception('Unable to create SFTP connection.');
}
 
ssh2_sftp_chmod($sftp, '../entregables', 0777);


  */  





/*
include('SFTP.php');

$sftp = new Net_SFTP('193.146.46.24');
if (!$sftp->login('root', 'iu')) {
    exit('Login Failed');
}

$sftp->chmod(0777, '../entregables/');
*/

/*
$strServer = "193.146.46.24";
$strServerPort = "22";
$strServerUsername = "root";
$strServerPassword = "iu";

//connect to server
$resConnection = ssh2_connect($strServer, $strServerPort);

if(ssh2_auth_password($resConnection, $strServerUsername, $strServerPassword)){
	//Initialize SFTP subsystem
	$resSFTP = ssh2_sftp($resConnection);
	
	//
	ssh2_sftp_chmod($resSFTP, '/var/www/ET3/entregables', 0777);
	//
}else{
	echo "Unable to authenticate on server";
}
*/




/*
$connection = ssh2_connect('193.146.46.24', 22);
ssh2_auth_password($connection, 'root', 'iu');
$sftp = ssh2_sftp($connection);

ssh2_sftp_chmod($sftp, '/var/www/html/ET3/entregables', 0777);
*/



/*
$localFile='/files/myfile.zip';
$remoteFile='/filesDir/myfile.zip';
$host = "193.146.46.24";
$port = 22;
$user = "root";
$pass = "iu";
 
$connection = ssh2_connect($host, $port);
ssh2_auth_password($connection, $user, $pass);
$sftp = ssh2_sftp($connection);

*/




?>