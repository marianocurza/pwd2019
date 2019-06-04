<?php
declare(strict_types=1);

namespace app\clases;

require_once 'Db.php';
require_once 'IRegistro.php';
require_once 'NullObjectError.php';

use app\clases\NullObjectError;
use \Exception;
use app\clases\IRegistro;
use app\clases\Db;

class Amigo implements IRegistro
{
    protected $id;
    protected $iPersona;
    protected $apelliNom;
    protected $telefono;

    /*
     * Recibe todos los parámetros para construir una persona y un empleado, de manera transparente
    */
    public function __construct(string $apelliNom, string $telefono, int $idPersona, int $id=null)
    {
        $this->apelliNom = $apelliNom;
        $this->telefono = $telefono;
        $this->idPersona = $idPersona;
        $this->id = $id;
    }
    
    
    // -------------------- Getters ----------------------
    
    public function getId():int
    {
        return $this->id;
    }

    public function getIdPersona():int
    {
        return $this->idPersona;
    }

    public function getApellinom():string
    {
        return $this->apelliNom;
    }
    
    public function getTelefono():string
    {
        return $this->telefono;
    }

    // -------------------- Interfaz IRegistro ----------------------

    /**
     * Inserta un registro de amigo en la base, a partir de la información que está en los atributos de la instancia
     * y devuelve TRUE o FALSE dependiendo de si la operación se realizó correctamente o no
     */
    public function insertar(): bool {
        throw new Exception('Método no implementado');
    }
    
    public function actualizar(): bool {
        throw new Exception('Método no implementado');
    }
    
    public function eliminar(): bool {
        throw new Exception('Método no implementado');
    }
    
    public static function buscarPorId(int $id): self
    {
        $conexion = Db::getConexion();
        $stmt = $conexion->prepare('select * from amigos where id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $amigoArray = $stmt->fetch();
        // si no hay coincidencia disparo una excepción
        if($amigoArray===FALSE){
            throw new NullObjectError('Objeto inexistente');
        }
        
        return new Amigo($amigoArray['apellinom'], $amigoArray['telefono'], $amigoArray['id_persona'], $amigoArray['id']);
        
    }
    
    public static function buscarPorParametros(array $parametros, string $tipo='AND'):array
    {
        throw new Exception('Método no implementado');
    }
    
    public static function crearDesdeParametros(array $parametros):self
    {
        $id = $parametros['id']??null;
        $idPersona = $parametros['id_persona']??null;
        $apelliNom = $parametros['apellinom']??null;
        $telefono = $parametros['telefono']??null;
        $amigo = new Amigo($apelliNom, $telefono, $idPersona, $id);
        return $amigo;
    }
    
    
    


    
}