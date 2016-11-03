<!--
======================================================================
Modelo de la tabla Usuario
Creado por: Edgard Ruiz Gonzalez   
Fecha: 01/11/2016
======================================================================
-->
<?php 
include_once 'interface.php';

class Usuario implements iModel {
	
    private $dni;
    private $nombreusuario;
    private $correo;
    private $password;
    private $idioma;
    private $tipousuario;
    
    public function __construct($dni="" , $nombreusuario="", $correo="" , $password="" , $idioma="esp", $tipousuario="deportista") {
        $this->dni = $dni;
        $this->nombreusuario = $nombreusuario;
        $this->correo = $correo;
        $this->password = $password;
        $this->idioma = $idioma;
        $this->tipousuario = $tipousuario;
    }
    
    private function getnombreusuario ($pk){
        $db = new Database();
        
        $query = 'SELECT nombreusuario FROM Usuario WHERE dni = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $nombreusuario = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $nombreusuario;
    }

    private function getcorreo ($pk){
        $db = new Database();
        
        $query = 'SELECT correo FROM Usuario WHERE dni = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $correo = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $correo;
    }
    
    public function gettipousuario ($pk){
        $db = new Database();
        
        $query = 'SELECT tipousuario FROM Usuario WHERE dni = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $tipousuario = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $tipousuario;
    }
    
    public function getpassword ($pk){
        $db = new Database();
        
        $query = 'SELECT password FROM Usuario WHERE dni = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $pass = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $pass;
    }

    //Devuelve true o false si realizo el cambio correctamente o no
    private function setpassword($oldPass, $newPass, $pk){
        //Si oldPass coincide con la de la de $pk en la BD, hace UPDATE con newPass
        $db = new Database();

        $pass = $this->getpassword($pk);

        if(strcmp($oldPass, $pass)!== 0){ return false;}
        //Si la contraseña nueva no es la cadena vacia en MD5
        else if (strcmp($newPass, "")!== 0){
                $sql = 'UPDATE Usuario SET password=\''. $newPass . '\' WHERE Usuario.dni = \'' . $pk .  '\'' ;
                $db->consulta($sql) or die('Error al modificar la password');
                $result = $db->consulta($sql);
                $db->desconectar();

                return $result;
        }else return true;
    }
    
		//Este metodo se llama cada vez que se cambia el idioma en la navBar lateral
		//Devuelve true si se realizo correctamente el cambio de idioma
    public function setidioma ($newidioma, $pk){
			$db = new Database();
			$sql = 'UPDATE Usuario SET idioma = \'' .$newidioma. '\' WHERE Usuario.dni = \'' .  $pk .  '\'';
			$resultado = $db->consulta($sql) or die('Error al ejecutar la consulta de modificar idioma');
			$db->desconectar();

			return $resultado;
    }
    
    //Comprueba si existe
    public function exists ($pk) {
        $db = new Database();
        
        //Comprueba si ya existe ese usuario
        $consultaUsuario = 'SELECT * FROM Usuario WHERE dni = \'' .  $pk .  '\'';
        $resultado = $db->consulta($consultaUsuario) or die('Error al ejecutar la consulta de usuario');
        
        // Si el numero de filas es 0 significa que no encontro el usuario
        if (mysqli_num_rows($resultado) == 0){
            $db->desconectar();
            return false;
        } else {
            $db->desconectar();
            return true;
        }
    }
    
    //Devuelve un array asociativo de la tabla de la clase
    public function listar(){
        $db = new Database();
        
        $sqlUsuario = $db->consulta("SELECT * FROM Usuario");
        $arrayUsuario = array();
        while ($row_usuario = mysqli_fetch_assoc($sqlUsuario))
            $arrayUsuario[] = $row_usuario;
        
        $db->desconectar();
        return $arrayUsuario;
    }
    
    //Devuelve un array asociativo de la tabla de la clase de los usuarios empleados
    public function listarEmpleados(){
        $db = new Database();
        
        $result = $db->consulta("SELECT * FROM Usuario WHERE tipousuario='empleado'");
        $arrayEmpleados = array();
        while ($row_usuario = mysqli_fetch_assoc($result))
            $arrayEmpleados[] = $row_usuario;
        
        $db->desconectar();
        return $arrayEmpleados;
    }
    
    //Muestra los datos de la $pk indicada. Devuelve una array asociativo
    public function consultar ($pk){
        //Obtener el nombreusuario
        $usunombreusuario = $this->getnombreusuario($pk);
        //Obtener el correo
        $usucorreo = $this->getcorreo($pk);
        //Obtener contraseña
        $usuPass = $this->getpassword($pk);
        //Obtener tipousuario de usuario
        $tipousuario = $this->gettipousuario($pk);
        
        //Crear array asoc con los datos de $pk
        $usuario = array("dni"=>$pk, "nombreusuario"=>$usunombreusuario, "correo"=>$usucorreo, "password"=>$usuPass, "tipousuario" => $tipousuario);
        
        return $usuario;
    }
    
    //Modifica los datos del objeto con $pk, y lo guarda segun los datos de $objeto pasado
    //No se modifica la primary key, que es el login, el dni en la BD
    public function modificar ($pk, $objeto) {
        $db = new Database();
        //Guardar los datos del objeto $pk antes de modificar
        if ($this->exists($pk)){
            $datos = $this->consultar($pk);
			
            $oldnombreusuario = $datos['nombreusuario'];
            $newnombreusuario = $objeto->nombreusuario;
		
            if ($oldnombreusuario != $newnombreusuario){
                $sql = 'UPDATE Usuario SET nombreusuario=\''. $newnombreusuario . '\' WHERE dni = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el nombreusuario');
            }
		
            $oldcorreo = $datos['correo'];
            $newcorreo = $objeto->correo;
		
            if ($oldcorreo != $newcorreo){
                $sql = 'UPDATE Usuario SET correo=\''. $newcorreo . '\' WHERE dni = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el correo');
            }
					
						$oldtipousuario = $datos['tipousuario'];
            $newtipousuario = $objeto->tipousuario;
		
            if ($oldtipousuario != $newtipousuario){
                $sql = 'UPDATE Usuario SET tipousuario=\''. $newtipousuario . '\' WHERE dni = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el tipousuario');
            }

            $result = true;
        
            $oldPass = $datos['password'];
            $newPass = $objeto->password;
            if (($oldPass != $newPass) && ($newPass != "d41d8cd98f00b204e9800998ecf8427e")){
                 $result = $this->setpassword($oldPass, $newPass, $pk);
            }
        
            $db->desconectar();
            return $result;
        }else {
            return false;
        }
    }
    
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($objeto){
        $db = new Database();
        
        if ($objeto->exists($objeto->dni) == false) 
        {
             //Inserta el usuario en la tabla usuario
            $insertaUsu = "INSERT INTO Usuario (dni, password, nombreusuario, correo , idioma, tipousuario) 
				VALUES ('$objeto->dni','$objeto->password','$objeto->nombreusuario','$objeto->correo','$objeto->idioma', '$objeto->tipousuario')";
            $db->consulta($insertaUsu) or die('Error al crear el Usuario');
            return true;
        } else return false;
        
        $db->desconectar();
    }
    
    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($pk){
			$db = new Database();
			$result = $db->consulta('DELETE FROM Usuario WHERE dni = \'' .  $pk .  '\'') or die('Error al eliminar el usuario');
			$db->desconectar();
			return result;
    }
}
?>