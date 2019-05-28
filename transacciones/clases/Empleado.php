<?php

namespace app\clases;

require_once 'Persona.php';
require_once 'Db.php';
/*
* La clase extiende de persona, en una relación UNO A UNO, Por eso su clave principal es id_persona, que a 
* su vez es clave foránea
*/
class Empleado extends Persona
{
    private $puesto;

    /*
     * Recibe todos los parámetros para construir una persona y un empleado, de manera transparente
    */
    public function __construct(string $apellinom, int $dni, string $puesto, int $id=null)
    {
        parent::__construct($apellinom,$dni,$id);
        $this->puesto = $puesto;
    }
    
    public function getPuesto():string
    {
        return $this->puesto;
    }
    
    /*
     * recibe un array asociativo con la información completa (datos de empleado + persona)
     * y dependiendo de si el id existe o si no existe, actualiza o crea uno nuevo respectivamente.
    */
    public static function guardar(array $parametros)
    {
        $empleado = self::crearDesdeParametros($parametros);
        if($empleado->id===null){
            $empleado->insertar();
        }else{
            $empleado->actualizar();
        }
    }
    
    /**
     * Devuelve un array de objetos Empleado
     */
   public static function listaEmpleados(): array
    {
        $conexion = Db::getConexion();
        $todosEmpleados = $conexion->query('select * from empleado')->fetchAll();
        $resultado = [];
        foreach($todosEmpleados as $empleado)
        {
             $persona = Persona::getPersonaPorId($empleado['id_persona']);
             $resultado[] = new Empleado($persona->getApellinom(), $persona->getDni(), $empleado['puesto'], $persona->getId());
        }
        return $resultado;
    }    
    
    /**
     * Recibe un arreglo asociativo, con todos los valores necesarios para instanciar un nuevo
     * Empleado y luego de instanciarlo lo devuelve
     */
    public static function crearDesdeParametros(array $parametros): Empleado
    {
        $id = $parametros['id']??null;
        $apellinom = $parametros['apellinom']??null;
        $dni = $parametros['dni']??null;
        $puesto = $parametros['puesto']??null;
        $empleado = new Empleado($apellinom, $dni, $puesto, $id);
        return $empleado;
    }
    
    /**
     * Realiza una inserción en la tabla, de manera transaccional, primero inserta la persona
     * Luego obtiene el id de esa persona y lo usa para insertar la información del empleado
     */
    public function insertar(): int
    {
        $conexion = Db::getConexion();
        $conexion->beginTransaction();
        try{
            // insertamos en persona
            parent::insertar();
            $stmt = $conexion->prepare('insert into `empleado` (`id_persona`, `puesto`) values (:idpersona, :puesto)');
            $stmt->bindValue(':idpersona', $this->id); // utilizamos el id generado en persona
            $stmt->bindValue(':puesto', $this->puesto);
            $stmt->execute();
            $conexion->commit();
            return $this->id;
        }catch(\Exception $ex){
            $conexion->rollBack();
            error_log($ex->getMessage());
            throw $ex;
        }
    }
    
}