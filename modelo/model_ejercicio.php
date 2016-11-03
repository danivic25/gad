<!--
======================================================================
Modelo de la tabla Ejercicio
Creado por: Edgard Ruiz Gonzalez   
Fecha: 01/11/2016
======================================================================
-->
<?php 
include_once 'interface.php';

class ejercicio implements iModel {

    private $idejercio;
    private $nombreejercicio;
    private $tipoejercicio;
    private $niveldificultad;
    private $anotaciones;
    private $TablaEjercicios_idtabla;
    
    public function __construct($idejercicio="" , $nombreejercicio="", $tipoejercicio="" , $niveldificultad="" , $anotaciones="esp", $TablaEjercicios_idtabla="") {
        $this->idejercicio = $idejercicio;
        $this->nombreejercicio = $nombreejercicio;
        $this->tipoejercicio = $tipoejercicio;
        $this->niveldificultad = $niveldificultad;
        $this->anotaciones = $anotaciones;
        $this->TablaEjercicios_idtabla = $TablaEjercicios_idtabla;
    }
    
    private function getnombreejercicio ($pk){
        $db = new Database();
        
        $query = 'SELECT nombreejercicio FROM Ejercicio WHERE idejercicio = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $nombreejercicio = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $nombreejercicio;
    }

    private function gettipoejercicio ($pk){
        $db = new Database();
        
        $query = 'SELECT tipoejercicio FROM Ejercicio WHERE idejercicio = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $tipoejercicio = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $tipoejercicio;
    }
    
    public function getTablaEjercicios_idtabla ($pk){
        $db = new Database();
        
        $query = 'SELECT TablaEjercicios_idtabla FROM Ejercicio WHERE idejercicio = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $TablaEjercicios_idtabla = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $TablaEjercicios_idtabla;
    }
    
    public function getniveldificultad ($pk){
        $db = new Database();
        
        $query = 'SELECT niveldificultad FROM Ejercicio WHERE idejercicio = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $dificultad = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $dificultad;
    }

        //Este metodo se llama cada vez que se cambia el nivel de dificultad en la navBar lateral
        //Devuelve true si se realizo correctamente el cambio de nivel de dificultad
    private function setniveldificultad($newniveldificultad, $pk){
        $db = new Database();
            $sql = 'UPDATE Ejercicio SET niveldificultad = \'' .$newniveldificultad. '\' WHERE Ejercicio.idejercicio = \'' .  $pk .  '\'';
            $resultado = $db->consulta($sql) or die('Error al ejecutar la consulta de modificar niveldificultad');
            $db->desconectar();

            return $resultado;
        }else return true;
    }
    
		//Este metodo se llama cada vez que se cambia el anotaciones en la navBar lateral
		//Devuelve true si se realizo correctamente el cambio de anotaciones
    public function setanotaciones ($newanotaciones, $pk){
			$db = new Database();
			$sql = 'UPDATE Ejercicio SET anotaciones = \'' .$newanotaciones. '\' WHERE Ejercicio.idejercicio = \'' .  $pk .  '\'';
			$resultado = $db->consulta($sql) or die('Error al ejecutar la consulta de modificar anotaciones');
			$db->desconectar();

			return $resultado;
    }
    
    //Comprueba si existe
    public function exists ($pk) {
        $db = new Database();
        
        //Comprueba si ya existe ese Ejercicio
        $consultaEjercicio = 'SELECT * FROM Ejercicio WHERE idejercicio = \'' .  $pk .  '\'';
        $resultado = $db->consulta($consultaEjercicio) or die('Error al ejecutar la consulta de Ejercicio');
        
        // Si el numero de filas es 0 significa que no encontro el Ejercicio
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
        
        $sqlEjercicio = $db->consulta("SELECT * FROM Ejercicio");
        $arrayEjercicio = array();
        while ($row_Ejercicio = mysqli_fetch_assoc($sqlEjercicio))
            $arrayEjercicio[] = $row_Ejercicio;
        
        $db->desconectar();
        return $arrayEjercicio;
    }
    
    //Devuelve un array asociativo de la tabla de la clase de los Ejercicios empleados
    public function listarEmpleados(){
        $db = new Database();
        
        $result = $db->consulta("SELECT * FROM Ejercicio WHERE TablaEjercicios_idtabla='empleado'");
        $arrayEmpleados = array();
        while ($row_Ejercicio = mysqli_fetch_assoc($result))
            $arrayEmpleados[] = $row_Ejercicio;
        
        $db->desconectar();
        return $arrayEmpleados;
    }
    
    //Muestra los datos de la $pk indicada. Devuelve una array asociativo
    public function consultar ($pk){
        //Obtener el nombreejercicio
        $ejernombreejercicio = $this->getnombreejercicio($pk);
        //Obtener el tipoejercicio
        $ejertipoejercicio = $this->gettipoejercicio($pk);
        //Obtener contraseña
        $ejerniveldificultad = $this->getniveldificultad($pk);
        //Obtener TablaEjercicios_idtabla de Ejercicio
        $ejerTablaEjercicios_idtabla = $this->getTablaEjercicios_idtabla($pk);
        
        //Crear array asoc con los datos de $pk
        $Ejercicio = array("idejercicio"=>$pk, "nombreejercicio"=>$ejernombreejercicio, "tipoejercicio"=>$ejertipoejercicio, "niveldificultad"=>$ejerniveldificultad, "TablaEjercicios_idtabla" => $ejerTablaEjercicios_idtabla);
        
        return $Ejercicio;
    }
    
    //Modifica los datos del objeto con $pk, y lo guarda segun los datos de $objeto pasado
    //No se modifica la primary key, que es el login, el idejercicio en la BD
    public function modificar ($pk, $objeto) {
        $db = new Database();
        //Guardar los datos del objeto $pk antes de modificar
        if ($this->exists($pk)){
            $datos = $this->consultar($pk);
			
            $oldnombreejercicio = $datos['nombreejercicio'];
            $newnombreejercicio = $objeto->nombreejercicio;
		
            if ($oldnombreejercicio != $newnombreejercicio){
                $sql = 'UPDATE Ejercicio SET nombreejercicio=\''. $newnombreejercicio . '\' WHERE idejercicio = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el nombreejercicio');
            }
		
            $oldtipoejercicio = $datos['tipoejercicio'];
            $newtipoejercicio = $objeto->tipoejercicio;
		
            if ($oldtipoejercicio != $newtipoejercicio){
                $sql = 'UPDATE Ejercicio SET tipoejercicio=\''. $newtipoejercicio . '\' WHERE idejercicio = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el tipoejercicio');
            }
					
						$oldTablaEjercicios_idtabla = $datos['TablaEjercicios_idtabla'];
            $newTablaEjercicios_idtabla = $objeto->TablaEjercicios_idtabla;
		
            if ($oldTablaEjercicios_idtabla != $newTablaEjercicios_idtabla){
                $sql = 'UPDATE Ejercicio SET TablaEjercicios_idtabla=\''. $newTablaEjercicios_idtabla . '\' WHERE idejercicio = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el TablaEjercicios_idtabla');
            }

            $result = true;
        
            $oldniveldificultad = $datos['niveldificultad'];
            $newniveldificultad = $objeto->niveldificultad;
            if (($oldniveldificultad != $newniveldificultad) && ($newniveldificultad != "bajo")){
                 $result = $this->setniveldificultad($oldniveldificultad, $newniveldificultad, $pk);
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
        
        if ($objeto->exists($objeto->idejercicio) == false) 
        {
             //Inserta el Ejercicio en la tabla Ejercicio
            $insertaEjer = "INSERT INTO Ejercicio (idejercicio, niveldificultad, nombreejercicio, tipoejercicio, anotaciones, TablaEjercicios_idtabla) 
				VALUES ('$objeto->idejercicio','$objeto->niveldificultad','$objeto->nombreejercicio','$objeto->tipoejercicio','$objeto->anotaciones', '$objeto->TablaEjercicios_idtabla')";
            $db->consulta($insertaUsu) or die('Error al crear el Ejercicio');
            return true;
        } else return false;
        
        $db->desconectar();
    }
    
    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($pk){
			$db = new Database();
			$result = $db->consulta('DELETE FROM Ejercicio WHERE idejercicio = \'' .  $pk .  '\'') or die('Error al eliminar el Ejercicio');
			$db->desconectar();
			return result;
    }
}
?>