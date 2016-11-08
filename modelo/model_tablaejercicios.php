<!--
======================================================================
Modelo de la tabla Tabla de ejercicios
Creado por: Ramón Gago Carrera        
Fecha: 08/11/2016
======================================================================
-->
<?php 
include_once 'interface.php';

class TablaEjercicios implements iModel {
	
    private $idtabla;
    private $nombretabla;
    private $responsable;
    private $niveldificultadglobal;
    private $tipotabla;
    
    public function __construct($idtabla="" , $nombretabla="", $responsable="" , $niveldificultadglobal="bajo", $tipotabla="deportistaTDU") {
        $this->idtabla = $idtabla;
        $this->nombretabla = $nombretabla;
        $this->responsable = $responsable;
        $this->niveldificultadglobal = $niveldificultadglobal;
        $this->tipotabla = $tipotabla;
    }
    
    private function getnombretabla ($pk){
        $db = new Database();
        
        $query = 'SELECT nombretabla FROM TablaEjercicios WHERE idtabla = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $nombretabla = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $nombretabla;
    }

    private function getresponsable ($pk){
        $db = new Database();
        
        $query = 'SELECT responsable FROM TablaEjercicios WHERE idtabla = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $responsable = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $responsable;
    }
    
    public function gettipotabla ($pk){
        $db = new Database();
        
        $query = 'SELECT tipotabla FROM TablaEjercicios WHERE idtabla = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $tipotabla = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $tipotabla;
    }

		//Este metodo se llama cada vez que se cambia el niveldificultadglobal en la navBar lateral
		//Devuelve true si se realizo correctamente el cambio de niveldificultadglobal
    public function setniveldificultadglobal ($newniveldificultadglobal, $pk){
			$db = new Database();
			$sql = 'UPDATE TablaEjercicios SET niveldificultadglobal = \'' .$newniveldificultadglobal. '\' WHERE TablaEjercicios.idtabla = \'' .  $pk .  '\'';
			$resultado = $db->consulta($sql) or die('Error al ejecutar la consulta de modificar niveldificultadglobal');
			$db->desconectar();

			return $resultado;
    }
    
    //Comprueba si existe
    public function exists ($pk) {
        $db = new Database();
        
        //Comprueba si ya existe esA Tabla de ejercicios
        $consultaTablaEjercicios = 'SELECT * FROM TablaEjercicios WHERE idtabla = \'' .  $pk .  '\'';
        $resultado = $db->consulta($consultaTablaEjercicios) or die('Error al ejecutar la consulta de tabla de ejercicios');
        
        // Si el numero de filas es 0 significa que no encontro la tabla de ejercicios
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
        
        $sqlTablaEjercicios = $db->consulta("SELECT * FROM TablaEjercicios");
        $arrayTablaEjercicios = array();
        while ($row_TablaEjercicios = mysqli_fetch_assoc($sqlTablaEjercicios))
            $arrayTablaEjercicios[] = $row_TablaEjercicios;
        
        $db->desconectar();
        return $arrayTablaEjercicios;
    }
    
    //Muestra los datos de la $pk indicada. Devuelve una array asociativo
    public function consultar ($pk){
        //Obtener el nombretabla
        $tabnombretabla = $this->getnombretabla($pk);
        //Obtener el responsable
        $tabresponsable = $this->getresponsable($pk);
        //Obtener niveldificultadglobal
        $tabniveldificultadglobal = $this->getniveldificultadglobal($pk);
        //Obtener tipotabla de tabla
        $tabtipotabla = $this->gettipotabla($pk);
        //Crear array asoc con los datos de $pk
        $tablaejercicios = array("idtabla"=>$pk, "nombretabla"=>$tabnombretabla, "responsable"=>$tabresponsable, "niveldificultadglobal"=>$tabniveldificultadglobal, "tipotabla" => $tabtipotabla);
        
        return $tablaejercicios;
    }
    
    //Modifica los datos del objeto con $pk, y lo guarda segun los datos de $objeto pasado
    //No se modifica la primary key, que es el login, el idtabla en la BD
    public function modificar ($pk, $objeto) {
        $db = new Database();
        //Guardar los datos del objeto $pk antes de modificar
        if ($this->exists($pk)){
            $datos = $this->consultar($pk);
			
            $oldnombretabla = $datos['nombretabla'];
            $newnombretabla = $objeto->nombretabla;
		
            if ($oldnombretabla != $newnombretabla){
                $sql = 'UPDATE TablaEjercicios SET nombretabla=\''. $newnombretabla . '\' WHERE idtabla = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el nombretabla');
            }
		
            $oldresponsable = $datos['responsable'];
            $newresponsable = $objeto->responsable;
		
            if ($oldresponsable != $newresponsable){
                $sql = 'UPDATE TablaEjercicios SET responsable=\''. $newresponsable . '\' WHERE idtabla = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el responsable');
            }
					
			$oldtipotabla = $datos['tipotabla'];
            $newtipotabla = $objeto->tipotabla;
		
            if ($oldtipotabla != $newtipotabla){
                $sql = 'UPDATE TablaEjercicios SET tipotabla=\''. $newtipotabla . '\' WHERE idtabla = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el tipotabla');
            }

            $result = true;

            $oldniveldificultadglobal = $datos['niveldificultadglobal'];
            $newniveldificultadglobal = $objeto->tipotabla;
        
            if ($oldniveldificultadglobal != $newniveldificultadglobal){
                $sql = 'UPDATE TablaEjercicios SET niveldificultadglobal=\''. $newniveldificultadglobal . '\' WHERE idtabla = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el tipotabla');
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
        
        if ($objeto->exists($objeto->idtabla) == false) 
        {
             //Inserta la tabla en la tabla Tablaejercicios
            $insertaTab = "INSERT INTO TablaEjercicios (idtabla, nombretabla, responsable, niveldificultadglobal, tipotabla) 
				VALUES ('$objeto->idtabla','$objeto->nombretabla','$objeto->responsable','$objeto->niveldificultadglobal', '$objeto->tipotabla')";
            $db->consulta($insertaTab) or die('Error al crear la tabla de ejercicios');
            return true;
        } else return false;
        
        $db->desconectar();
    }
    
    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($pk){
			$db = new Database();
			$result = $db->consulta('DELETE FROM TablaEjercicios WHERE idtabla = \'' .  $pk .  '\'') or die('Error al eliminar la tabla de ejercicios');
			$db->desconectar();
			return result;
    }
}
?>