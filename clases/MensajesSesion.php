<?php
namespace app\clases;

/**
 * Description of MensajesSesion
 *
 * @author mariano
 */
class MensajesSesion {
    public static function getMensajes(): string
    {
        $mensajes = '';
        if(isset($_SESSION['mensajes'])){
            $mensajes = $_SESSION['mensajes'];
            unset($_SESSION['mensajes']);
        }
        return $mensajes;            
    }
}
