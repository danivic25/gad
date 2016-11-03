<!--
======================================================================
Modelo de la tabla Incidencia
Creado por: David, Edgard
Fecha: 04/01/2016
======================================================================
-->
<?php 
include_once 'interface.php';

class Incidencia {

    private $idProyecto;
    private $idHito;
    private $idUsuario;   
    private $idTarea;
    private $idIncidencia;
    private $DescIncidencia; 
    private $resuelta;

    public function __construct($idProyecto="" , $idHito="", $idUsuario="" , $idTarea="" , $idIncidencia="", $DescIncidencia="", $resuelta=false) {
        $this->idProyecto = $idProyecto;
        $this->idHito = $idHito;
        $this->idUsuario = $idUsuario;
        $this->idTarea = $idTarea;
        $this->idIncidencia = $idIncidencia;
        $this->DescIncidencia = $DescIncidencia;
        $this->resuelta = $resuelta;
    }

    /*-------------------------- GET DE CADA ATRIBUTO ----------------------------------------*/
    private function getId ($idProyecto, $idHito, $idIncidencia, $idTarea){
        $db = new Database();

        $query = 'SELECT idIncidencia FROM Incidencia WHERE idIncidencia = \'' . $idIncidencia .  '\' AND Tarea_Hito_Proyecto_idProyecto = \'' . $idProyecto .  '\' AND Tarea_Hito_idHito =\'' . $idHito .  '\' AND Tarea_idTarea = \'' . $idTarea .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $id = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $id;
    }

    private function getDesc ($idProyecto, $idHito, $idIncidencia, $idTarea){
        $db = new Database();

        $query = 'SELECT DescIncidencia FROM Incidencia WHERE idIncidencia = \'' . $idIncidencia .  '\' AND Tarea_Hito_Proyecto_idProyecto = \'' . $idProyecto .  '\' AND Tarea_Hito_idHito =\'' . $idHito .  '\' AND Tarea_idTarea = \'' . $idTarea .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $desc = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $desc;
    }

    private function getUsu ($idProyecto, $idHito, $idIncidencia, $idTarea){
        $db = new Database();

        $query = 'SELECT Usuario_idUsuario FROM Incidencia WHERE idIncidencia = \'' . $idIncidencia .  '\' AND Tarea_Hito_Proyecto_idProyecto = \'' . $idProyecto .  '\' AND Tarea_Hito_idHito =\'' . $idHito .  '\' AND Tarea_idTarea = \'' . $idTarea .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $usu = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $usu;
    }

    private function getResuelta ($idProyecto, $idHito, $idIncidencia, $idTarea){
        $db = new Database();

        $query = 'SELECT IncidenciaResuelta FROM Incidencia WHERE idIncidencia = \'' . $idIncidencia .  '\' AND Tarea_Hito_Proyecto_idProyecto = \'' . $idProyecto .  '\' AND Tarea_Hito_idHito =\'' . $idHito .  '\' AND Tarea_idTarea = \'' . $idTarea .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $resuelta = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();

        return $resuelta;
    }





    /* -------------------------- FUNCIONES PUBLICAS COMUNES ----------------------------------------*/
    //Comprueba si existe la incidencia
    public function exists ($idProyecto, $idHito, $idIncidencia, $idTarea) {
        $db = new Database();

        //Comprueba si ya existe ese usuario
        $consulta = 'SELECT * FROM Incidencia WHERE idIncidencia = \'' . $idIncidencia .  '\' AND Tarea_Hito_Proyecto_idProyecto = \'' . $idProyecto .  '\' AND Tarea_Hito_idHito =\'' . $idHito .  '\' AND Tarea_idTarea = \'' . $idTarea .  '\'';
        $resultado = $db->consulta($consulta) or die('Error al ejecutar la consulta de incidencia');

        // Si el numero de filas es 0 significa que no encontro la incidencia
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

        $sql = $db->consulta("SELECT * FROM Incidencia");
        $arrayIncidencia = array();
        while ($row = mysqli_fetch_assoc($sql)) {
            $arrayIncidencia[] = $row;
        }

        $db->desconectar();
        return $arrayIncidencia;
    }

    //Muestra los datos del ticket $pk indicada. Devuelve una array asociativo
    public function consultar ($idProyecto, $idHito, $idIncidencia, $idTarea){
        //Obtener el nombre
        $id = $this->getId($idProyecto, $idHito, $idIncidencia, $idTarea);
        //Obtener la descripcion
        $desc = $this->getDesc($idProyecto, $idHito, $idIncidencia, $idTarea);
        //Obtener usuario
        $usu = $this->getUsu($idProyecto, $idHito, $idIncidencia, $idTarea);
        //Obtener estado
        $resuelta = $this->getResuelta($idProyecto, $idHito, $idIncidencia, $idTarea);

        //Crear array asoc con los datos del ticket
        $incidencia = array("idIncidencia"=>$id, "descripcion"=>$desc, "usuario"=>$usu, "resuelta"=>$resuelta);

        return $incidencia;
    }

    /*Modifica los datos del objeto $pk, y lo guarda segun los datos de $objeto pasado
    Este metodo es para un usuario empleado que añade sus datos de trabajo a un ticket 
		Un empleado puede modificar: horas trabajadas, fecha real de inicio, fecha real de fin, ticket resuelto
		Las horas trabajadas se añaden a la tabla Usuario_has_Tarea, y se suman a la Tarea*/
    public function modificar ($idProyecto, $idHito, $idIncidencia, $idTarea, $objeto) {
        $db = new Database();
        //Si la incidencia existe
        if ($this->exists($idProyecto, $idHito, $idIncidencia, $idTarea)){
            $datos = $this->consultar($idProyecto, $idHito, $idIncidencia, $idTarea);

            //Estado de la incidencia.
            $newDesc = $objeto->DescIncidencia;

            $sql = 'UPDATE Incidencia SET DescIncidencia = \'' . $newDesc . '\' WHERE idIncidencia = \'' . $idIncidencia .  '\' AND Tarea_Hito_Proyecto_idProyecto = \'' . $idProyecto .  '\' AND Tarea_Hito_idHito = \'' . $idHito .  '\' AND Tarea_idTarea = \'' . $idTarea .  '\'';

            $db->consulta($sql) or die('Error al modificar la descripcion de la incidencia');
            
            //Estado de la incidencia.
            $newResuelta = $objeto->resuelta;
            $oldResuelta = $datos['resuelta'];

            if ($newResuelta != $oldResuelta){
                $sql = 'UPDATE Incidencia SET IncidenciaResuelta = \'' . $newResuelta . '\' WHERE idIncidencia = \'' . $idIncidencia .  '\' AND Tarea_Hito_Proyecto_idProyecto = \'' . $idProyecto .  '\' AND Tarea_Hito_idHito = \'' . $idHito .  '\' AND Tarea_idTarea = \'' . $idTarea .  '\'';

                $db->consulta($sql) or die('Error al modificar el estado de la incidencia');
            }
            $db->desconectar();
            return true;
        }else {
            return false;
        }
    }

    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($objeto){
        $db = new Database();

        if ($objeto->exists($objeto->idProyecto, $objeto->idHito, $objeto->idIncidencia, $objeto->idTarea) == false) 
        {
            //Inserta la incidencia
            $insertaInc = "INSERT INTO Incidencia (Tarea_Hito_Proyecto_idProyecto, Tarea_Hito_idHito, Tarea_idTarea, idIncidencia, DescIncidencia, Usuario_idUsuario, IncidenciaResuelta) VALUES ('$objeto->idProyecto', '$objeto->idHito', '$objeto->idTarea', '$objeto->idIncidencia', '$objeto->DescIncidencia', '$objeto->idUsuario', '$objeto->resuelta')";

            $db->consulta($insertaInc) or die('Error al crear la incidencia');
            return true;
        } else return false;

        $db->desconectar();
    }

    //Elimina de la base de datos segun la primary key pasada, y devuelve si fue correctamente
    public function eliminar($idProyecto, $idHito, $idTarea, $idInci){
        $db = new Database();
        $result = $db->consulta('DELETE FROM Incidencia WHERE Tarea_Hito_Proyecto_idProyecto = \'' . $idProyecto .  '\' AND Tarea_Hito_idHito =\'' . $idHito .  '\' AND Tarea_idTarea =\'' . $idTarea .  '\' AND idIncidencia =\'' . $idInci .  '\'') or die('Error al eliminar la incidencia');
        $db->desconectar();
        return $result;
    }

    /*------------------ FUNCIONES PUBLICAS PROPIAS DE LA CLASE ----------------------------------*/
    /*Devuelve un array con los tickets que el idUsuario tiene sin acabar en el idProyecto indicado
	Devuelve todos los atributos de la tabla Ticket_has_Usuario*/
    public function incidenciasPendientes ($idProyecto, $idHito, $idIncidencia, $idTarea){
        $db = new Database();

        //Selecciona todas las incidencias
        $sql = 'SELECT * FROM Incidencia WHERE idIncidencia = \'' . $idIncidencia .  '\' AND Tarea_Hito_Proyecto_idProyecto = \'' . $idProyecto .  '\' AND Tarea_Hito_idHito =\'' . $idHito .  '\' AND Tarea_idTarea = \'' . $idTarea .  '\' ORDER BY IncidenciaResuelta DESC';
        $result = $db->consulta($sql) or die('Error al ejecutar la consulta de incidencias'); 

        $arrayIncidencias = array();


        $db->desconectar();
        return $arrayIncidencias;
    }
}
?>