<?php
session_start();

require_once '../clases/Uploads.php';
require_once '../clases/Correo.php';
use app\clases\Uploads;
use app\clases\Correo;

$dir_subida = dirname(__FILE__).'/../archivos/';

$uploads = new Uploads($dir_subida, 'fichero_usuario');
if($uploads->procesarUpload()){
    Correo::enviarCorreo($uploads->getArchivoCargado());
    $_SESSION['mensajes'] = 'operación exitosa';    
}else{
    $_SESSION['mensajes'] = $uploads->getErrores();
}

header('Location: /index.php');