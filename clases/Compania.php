<?php
declare(strict_types=1);

namespace app\clases;

require_once 'Db.php';
require_once 'IRegistro.php';
require_once 'NullObjectError.php';

use app\clases\Db;
use app\clases\IRegistro;
use app\clases\NullObjectError;

class Compania implements IRegistro
{
    protected $id;
    protected $idPersona;
    protected $denominacion;
    protected $direccion;

    /*
     * Recibe todos los parámetros para construir una persona y un empleado, de manera transparente
    */
    public function __construct(string $denominacion, string $direccion, int $idPersona, int $id=null)
    {
        $this->denominacion = $puesto;
        $this->direccion = $direccion;
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
    
    public function getDireccion():string
    {
        return $this->direccion;
    }

    public function getDenominacion():string
    {
        return $this->denominacion;
    }
    // -------------------- Interfaz IRegistro ----------------------

    /**
     * Inserta un registro de compañia en la base, a partir de la información que está en los atributos de la instancia
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
        $stmt = $conexion->prepare('select * from compania where id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $companiaArray = $stmt->fetch();
        // si no hay coincidencia disparo una excepción
        if($companiaArray===FALSE){
            throw new NullObjectError('Objeto inexistente');
        }
        
        return new Compania($companiaArray['denominacion'], $companiaArray['direccion'], $companiaArray['id_persona'], $companiaArray['id']);
        
    }
    
    public static function buscarPorParametros(array $parametros, string $tipo='AND'):array
    {
        throw new Exception('Método no implementado');
    }
    
    public static function crearDesdeParametros(array $parametros):self
    {
        $id = $parametros['id']??null;
        $idPersona = $parametros['id_persona']??null;
        $denominacion = $parametros['denominacion']??null;
        $direccion = $parametros['direccion']??null;
        $compania = new Compania($denominacion, $direccion, $idPersona, $id);
        return $compania;
    }
    
    // -------------------- Métodos adicionales ------------------------
    
    public function getResumen(): string
    {
        return $this->getDenominacion().' '.$this->getDireccion();
    }

}