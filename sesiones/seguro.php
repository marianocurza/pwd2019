<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: /sesiones.php');
    exit;
}

echo "Usted ha entrado a un sitio seguro";

