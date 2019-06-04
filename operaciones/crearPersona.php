<?php
require_once '..'.DIRECTORY_SEPARATOR.'header.php';
require_once '..'.DIRECTORY_SEPARATOR.'menu.php';
require_once '..'.DIRECTORY_SEPARATOR.'clases'.DIRECTORY_SEPARATOR.'Persona.php';
require_once '..'.DIRECTORY_SEPARATOR.'clases'.DIRECTORY_SEPARATOR.'Amigo.php';
require_once '..'.DIRECTORY_SEPARATOR.'clases'.DIRECTORY_SEPARATOR.'Compania.php';
require_once '..'.DIRECTORY_SEPARATOR.'clases'.DIRECTORY_SEPARATOR.'Db.php';

use app\clases\Db;
use app\clases\Amigo;
use app\clases\Persona;
use app\clases\Compania;
use \TypeError;
use \Throwable;
use \Exception;

if(isset($_POST['btnGuardarPersona']))
{
    try 
    {
        throw new Exception('Lógica no implementada');
        // pasos para realizar la operación:
        // obtener una conexión a la bd
        // usar esa conexión para iniciar una transacción
        // crear una persona desde parámetros usando el método provisto
        // invocar el método insertar de la persona creada
        // crear una instancia de compania desde parámetros usando el método provisto
        // invocar el método insertar del objeto compania creado
        // iniciar un bucle, recorriendo el arreglo de amigos
        for($i = 0;$i < count($_POST['nombreAmigo']);$i++)
        {
            // dentro de cada iteracion crear una instancia de objeto amigo usando el método provisto 
            // en la instancia de amigo creada invocar el método insertar
            
            // código de ejemplo para mostrar el acceso a la info recibida
            echo "Nombre: {$_POST['nombreAmigo'][$i]} - Teléfono: {$_POST['telefonoAmigo'][$i]} <br>";
        }
        // realizar el commit de la transaccion
        $mensaje = 'Operación exitosa';
        
    }catch(TypeError $e){
        // hacer rollback de la transacción
        $mensaje = 'Error al obtener la información del amigo en la base de datos';
    }catch(Throwable $e){
        // hacer rollback de la transacción
        error_log($e->getMessage());
        $mensaje = 'Error inesperado, consulte con su administrador';
    }
}else{
    $mensaje = 'No se recibió la información necesaria para crear una persona';
}
?>
<div>
    <?= $mensaje ?>
</div>
