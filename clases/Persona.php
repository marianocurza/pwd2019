<?php
declare(strict_types=1);

namespace app\clases;
require_once 'Db.php';
require_once 'IRegistro.php';
require_once 'Amigo.php';
require_once 'Compania.php';
require_once 'NullObjectError.php';


use \Exception;
use app\clases\NullObjectError;
use app\clases\Amigo;
use app\clases\Compania;
use app\clases\IRegistro;
use app\clases\Db;

class Persona implements IRegistro
{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $direccion;
    
    public function __construct(string $nombre, string $apellido, string $direccion, int $id = null)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->id = $id;
    }
    
    // -------------------- Getters ----------------------
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellido(): string
    {
        return $this->apellido;
    }
    
    public function getDireccion(): string
    {
        return $this->direccion;
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
        $stmt = $conexion->prepare('select * from persona where id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $personaArray = $stmt->fetch();
        // si no hay coincidencia disparo una excepción
        if($personaArray===FALSE){
            throw new NullObjectError('Objeto inexistente');
        }
        
        return new Persona($personaArray['nombre'], $personaArray['apellido'], $personaArray['direccion'], $personaArray['id']);
        
    }
    
    public static function buscarPorParametros(array $parametros, string $tipo='AND'):array
    {
        throw new Exception('Método no implementado');
    }
    
    public static function crearDesdeParametros(array $parametros):self
    {
        $id = $parametros['id']??null;
        $nombre = $parametros['nombre']??null;
        $apellido = $parametros['apellido']??null;
        $direccion = $parametros['direccion']??null;
        $persona = new Persona($nombre, $apellido, $direccion, $id);
        return $persona;
    }
    

    // -------------------- Métodos adicionales ------------------------
    
    /**
     * Devuelve un array de objetos Amigo asociado a la persona actual o un array vacío en
     * caso de no tenér amigos
     */
    public function getInformacionAmigos(): array
    {
        // si no tengo id todavía, no puedo tener amigos
        if(!$this->id)
            return [];
        return  Amigo::buscarPorParametros(['idPersona'=>$this->id]);
    }
    
    /**
     * Devuelve un de objeto Compania asociado a la persona actual o null en caso de no tener
     * completa la información
     */
    public function getCompania(): Compania
    {
        // si no tengo id todavía, no puedo tener compañia
        if(!$this->id)
            return null;
        // obtengo un array y devuelvo la primer ocurrencia
        $arregloCompania = Compania::buscarPorParametros(['idPersona'=>$this->id]);
        // si la búsqueda no tiene resultados
        if(count($arregloCompania)===0){
            throw new NullObjectError('Objeto inexistente');
        }
        // como la búsqueda no es 0, es seguro devolver la posición 0
        return $arregloCompania[0];
    }
    
    public function getApellidoYNombre(): string
    {
        $this->getApellido().', '.$this->getNombre();
    }
    
    public function getResumen():string
    {
        return $this->getApellidoYNombre().' - '.$this->getDireccion();
    }
    

}