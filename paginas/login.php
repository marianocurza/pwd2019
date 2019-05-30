<?php
require_once '../clases/Usuario.php';
use app\clases\Usuario;
$usuario = new Usuario();
if($usuario->esLoginValido('mariano', 'mariano')){
    echo "login válido";
}else{
    echo "login inválido";
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

