<?php
require_once 'clases'.DIRECTORY_SEPARATOR.'Traductor.php';
use app\clases\Traductor;

if(isset($_COOKIE['visitas']))
{
    $visitasAnteriores = $_COOKIE['visitas'];
    $visitasActuales = $visitasAnteriores + 1;
    setcookie('visitas', $visitasActuales);    
}else{
    setcookie('visitas', '1');    
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PWD 2018 - Cookies</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <header>
            <nav id="barra-navegacion">
                <?php
                    if(!(isset($_COOKIE['usuario']) || isset($_POST['input-usuario']))){ 
                ?>
                    <form action="redireccion.php" class="search-form" method="post">
                        <input type="text" name="input-usuario" id="input-usuario" placeholder="<?= Traductor::t($_GET['lang']??$_COOKIE['lang']??'es', 'Ingrese su usuario y presione ENTER') ?>">
                    </form>
                <?php
                    }else{
                ?>
                <span>Usuario Conectado:<?=$_POST['input-usuario']??$_COOKIE['usuario']??''?></span>
                <?php
                    }
                ?>
                <ul id="opciones-idioma">
                    <li><a href="redireccion.php?lang=es"><img src="imagenes/espanol.jpg" alt="Opción español"></a></li>
                    <li><a href="redireccion.php?lang=eng"><img src="imagenes/ingles.jpg" alt="English option"></a></li>
                </ul>
            </nav>            
        </header>
