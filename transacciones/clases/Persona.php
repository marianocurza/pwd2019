<?php
namespace app\clases;
require_once 'Db.php';

class Persona 
{
    protected $id;
    protected $apellinom;
    protected $dni;
    
    public function __construct(string $apellinom, int $dni, int $id = null)
    {
        $this->apellinom = $apellinom;
        $this->dni = $dni;
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getApelliNom(): string
    {
        return $this->apellinom;
    }
    public function getDni(): int
    {
        return $this->dni;
    }
    
    /**
     * 
     * Recibe un id y devuelve el objeto Persona correspondiente 
     */
    public static function getPersonaPorId(int $id) : Persona
    {
        $conexion = Db::getConexion();
        $stmt = $conexion->prepare('select * from persona where id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $personaArray = $stmt->fetch();
        return new Persona($personaArray['apellinom'], $personaArray['dni'],$personaArray['id']);
    }
    
    /**
     * Inserta una persona en la base, a partir de la información que está en los atributos de la instancia
     * y devuelve el id ingresado actualizando el valor del atributo id en el objeto
     */
    public function insertar(): int
    {
        $conexion = Db::getConexion();
        $stmt = $conexion->prepare('insert into `persona` (`apellinom`, `dni`) values (:apellinom, :dni)');
        $stmt->bindValue(':apellinom', $this->apellinom);
        $stmt->bindValue(':dni', $this->dni);
        $exito = $stmt->execute();
        $this->id = $conexion->lastInsertId();
        return $this->id;
    }
    
}