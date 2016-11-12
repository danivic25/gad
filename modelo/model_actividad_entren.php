<!--
======================================================================
Modelo de la tabla Axtividad
Creado por: Daniel Victor Lopez Gonzalez
Fecha: 07/11/2016
======================================================================
-->
<?php
include_once 'interface.php';

class Actividad implements iModel {

    private $idactividad;
    private $nombreactividad;
    private $horainicio;
    private $horafin;
    private $responsable;
    private $tipoactividad;
	  private $numplazasmax;
	  private $idsesion;
	  private $usuario_dni;
	  private $entrenador_dni;

    public function __construct($idactividad="" , $nombreactividad="", $horainicio="" , $horafin="" , $responsable="",
		$tipoactividad="", $numplazasmax="", $idsesion="", $usuario_dni="", $entrenador_dni="") {

		$this->idactividad = $idactividad;
    $this->nombreactividad = $nombreactividad;
    $this->horainicio = $horainicio;
    $this->horafin = $horafin;
    $this->responsable = $responsable;
    $this->tipoactividad = $tipoactividad;
		$this->numplazasmax = $numplazasmax;
		$this->idsesion = $idsesion;
		$this->entrenador_dni = $entrenador_dni;
    }

		/*-------------------------- GET DE CADA ATRIBUTO ----------------------------------------*/


		/* FALTAN LOS GETTERS DE LOS IDS*/
		private function getidactividad ($idactividad, $idsesion, $entrenador_dni){
        $db = new Database();

        $query = 'SELECT idactividad FROM Actividad WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $id = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $id;
    }

		private function getnombreactividad ($idactividad, $idsesion, $entrenador_dni){
        $db = new Database();

        $query = 'SELECT nombreactividad FROM Actividad WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $nombreactividad = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $nombreactividad;
    }

    private function gethorainicio ($idactividad, $idsesion, $entrenador_dni){
        $db = new Database();

        $query = 'SELECT horainicio FROM Actividad WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $correo = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $horainicio;
    }

		private function gethorafin ($idactividad, $idsesion, $entrenador_dni){
        $db = new Database();

        $query = 'SELECT horafin FROM Actividad WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $correo = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $horafin;
    }

    public function gettipoactividad ($idactividad, $idsesion, $entrenador_dni){
        $db = new Database();

        $query = 'SELECT tipoactividad FROM Actividad WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $tipousuario = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $tipoactividad;
    }

    public function getresponsable ($idactividad, $idsesion, $entrenador_dni){
        $db = new Database();

        $query = 'SELECT responsable FROM Actividad WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $pass = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $responsable;
    }

		private function getnumplazasmax ($idactividad, $idsesion, $entrenador_dni){
				$db = new Database();

				$query = 'SELECT numplazasmax FROM Actividad WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';
				$result = $db->consulta($query);

				/* array numérico */
				$row = $result->fetch_array(MYSQLI_NUM);
				$nombreactividad = $row[0];

				/* liberar la serie de resultados */
				$result->free();
				$db->desconectar();

				return $numplazasmax;
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

    //Comprueba si existe la actividad
    public function exists ($idactividad, $idsesion, $entrenador_dni) {
        $db = new Database();

        //Comprueba si ya existe ese usuario
        $consultaActividad = 'SELECT * FROM Actividad WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';
        $resultado = $db->consulta($consultaActividad) or die('Error al ejecutar la consulta de actividad');

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

        $sqlActividad = $db->consulta("SELECT * FROM Actividad");
        $arrayActividad = array();
        while ($row_actividad = mysqli_fetch_assoc($sqlActividad))
            $arrayActividad[] = $row_actividad;

        $db->desconectar();
        return $arrayActividad;
    }

    //Muestra los datos de la $pk indicada. Devuelve una array asociativo
    public function consultar ($idactividad, $idsesion, $entrenador_dni){
        //Obtener el nombre actividad
        $actnombreactividad = $this->getnombreactividad($idactividad, $idsesion, $entrenador_dni);
        //Obtener la hora de inicio
        $acthorainicio = $this->gethorainicio($idactividad, $idsesion, $entrenador_dni);
				//Obtener la hora de fin
        $acthorafin = $this->gethorafin($idactividad, $idsesion, $entrenador_dni);
        //Obtener responsable
        $actresponsable = $this->getresponsable($idactividad, $idsesion, $entrenador_dni);
        //Obtener tipo de actividad
        $acttipoactividad = $this->gettipoactividad($idactividad, $idsesion, $entrenador_dni);
				//Obtener numero de plazas maximo
				$actnumplazasmax = $this->getnumplazasmax($idactividad, $idsesion, $entrenador_dni);
				//Obtener numero de plazas maximo
				$actidactividad = $this->getidactividad($pk, $idsesion, $entrenador_dni);

        //Crear array asoc con los datos de $pk
        $usuario = array("idactividad"=>$pk, "nombreactividad"=>$actnombreactividad, "horainicio"=>$acthorainicio, "horafin"=>$acthorafin, "responsable" => $actresponsable, "tipoactividad" => $acttipoactividad, "numplazasmax" => $actnumplazasmax);

        return $actividad;
    }

    //Modifica los datos del objeto con $pk, y lo guarda segun los datos de $objeto pasado
    //No se modifica la primary key, que es el login, el dni en la BD
    public function modificar ($idactividad, $idsesion, $entrenador_dni, $objeto) {
        $db = new Database();
        //Guardar los datos del objeto $pk antes de modificar
        if ($this->exists($pk)){
            $datos = $this->consultar($pk);

            $oldnombreactividad = $datos['nombreactividad'];
            $newnombreactividad = $objeto->nombreactividad;

            if ($oldnombreactividad != $newnombreactividad){
                $sql = 'UPDATE Actividad SET nombreactividad=\''. $newnombreactividad . '\' WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';

                $db->consulta($sql) or die('Error al modificar el nombreactividad');
            }

            $oldhorainicio = $datos['horainicio'];
            $newhorainicio = $objeto->horainicio;

            if ($oldhorainicio != $newhorainicio){
                $sql = 'UPDATE Actividad SET horainicio=\''. $newhorainicio . '\' WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';

                $db->consulta($sql) or die('Error al modificar la hora de inicio');
            }

						$oldhorafin = $datos['horafin'];
            $newhorafin = $objeto->horafin;

						if ($oldhorafin != $newhorafin){
                $sql = 'UPDATE Actividad SET horafin=\''. $newhorafin . '\' WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';

                $db->consulta($sql) or die('Error al modificar la hora de fin');
            }

						$oldtipoactividad = $datos['tipoactividad'];
            $newtipoactividad = $objeto->tipoactividad;

            if ($oldtipoactividad != $newtipoactividad){
                $sql = 'UPDATE Actividad SET tipoactividad=\''. $newtipoactividad . '\' WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';

                $db->consulta($sql) or die('Error al modificar el tipo de actividad');
            }

						$oldresponsable = $datos['responsable'];
            $newresponsable = $objeto->responsable;

            if ($oldresponsable != $newtipoactividad){
                $sql = 'UPDATE Actividad SET responsable=\''. $newresponsable . '\' WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';

                $db->consulta($sql) or die('Error al modificar el responsable');
            }

            $oldnumplazasmax= $datos['numplazasmax'];
            $newnumplazasmax = $objeto->numplazasmax;

						if ($oldnumplazasmax != $newnumplazasmax){
                $sql = 'UPDATE Actividad SET numplazasmax=\''. $newnumplazasmax . '\' WHERE idactividad = \'' . $idactividad .  '\' AND SesionEntrenamiento_idsesion = \'' . $idsesion .  '\' AND Entrenador_dni =\'' . $entrenador_dni . '\'';

                $db->consulta($sql) or die('Error al modificar el numero de plazas');
            }

						$result = true;

            $db->desconectar();
            return $result;
        }else {
            return false;
        }
    }

    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($objeto){
        $db = new Database();

        if ($objeto->exists($objeto->idactividad) == false)
        {
             //Inserta la actividad en la tabla actividad
            $insertaAct = "INSERT INTO Actividad (idactividad, nombreactividad, horainicio, horafin, responsable, tipoactividad, numplazasmax, idsesion, usuario_dni, entrenador_dni, idioma)
				VALUES ('$objeto->idactividad','$objeto->nombreactividad','$objeto->horainicio','$objeto->horafin','$objeto->responsable', '$objeto->tipoactividad', '$objeto->numplazasmax', '$objeto->idsesion', '$objeto->usuario_dni', '$objeto->entrenador_dni', '$objeto->idioma')";
            $db->consulta($insertaAct) or die('Error al crear la actividad');
            return true;
        } else return false;

        $db->desconectar();
    }

    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($idactividad){
			$db = new Database();
			$result = $db->consulta('DELETE FROM Actividad WHERE idactividad = \'' .  $idactividad .  '\'') or die('Error al eliminar la actividad');
			$db->desconectar();
			return result;
    }
}
?>
