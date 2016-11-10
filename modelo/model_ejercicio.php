<!--
======================================================================
Modelo de la tabla Ejercicio
Creado por: Ramón Gago Carrera   
Fecha: 08/11/2016
======================================================================
-->
<?php 
include_once 'interface.php';

class ejercicio implements iModel {

    private $idejercicio;
    private $nombreejercicio;
    private $tipoejercicio;
    private $niveldificultad;
    
    public function __construct($idejercicio="" , $nombreejercicio="", $tipoejercicio="" , $niveldificultad="") {
        $this->idejercicio = $idejercicio;
        $this->nombreejercicio = $nombreejercicio;
        $this->tipoejercicio = $tipoejercicio;
        $this->niveldificultad = $niveldificultad;
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
    
    //Muestra los datos de la $pk indicada. Devuelve una array asociativo
    public function consultar ($pk){
        //Obtener el nombreejercicio
        $ejernombreejercicio = $this->getnombreejercicio($pk);
        //Obtener el tipoejercicio
        $ejertipoejercicio = $this->gettipoejercicio($pk);
        //Obtener niveldificultad
        $ejerniveldificultad = $this->getniveldificultad($pk);
        //Crear array asoc con los datos de $pk
        $Ejercicio = array("idejercicio"=>$pk, "nombreejercicio"=>$ejernombreejercicio, "tipoejercicio"=>$ejertipoejercicio, "niveldificultad"=>$ejerniveldificultad);
        
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

                $db->consulta($sql) or die('Error al modificar el tipo de ejercicio');
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
            $insertaEjer = "INSERT INTO Ejercicio (idejercicio, niveldificultad, nombreejercicio, tipoejercicio) 
				VALUES ('$objeto->idejercicio','$objeto->niveldificultad','$objeto->nombreejercicio','$objeto->tipoejercicio')";
            $db->consulta($insertaEjer) or die('Error al crear el ejercicio');
            return true;
        } else return false;
        
        $db->desconectar();
    }
    
    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($pk){
			$db = new Database();
			$result = $db->consulta('DELETE FROM Ejercicio WHERE idejercicio = \'' .  $pk .  '\'') or die('Error al eliminar el ejercicio');
			$db->desconectar();
			return result;
    }
}
?>