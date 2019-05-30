<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\clases;

require_once 'Bd.php';

use \PDO;

/**
 * Description of Usuario
 *
 * @author mariano
 */
class Usuario {
    // conexión
    /**
     *
     * @var \PDO 
     */
    protected $bd;
        
    public function __construct() {
        $this->bd = Bd::getConexion();
    }
    
    public function esLoginValido(string $usuario, string $password): bool{
        $sql = 'select * from usuarios where usuario = :usuario';
        $pst = $this->bd->prepare($sql);
        $pst->bindValue(':usuario', $usuario, PDO::PARAM_STR);
        $pst->execute();
        $resultados = $pst->fetchAll();
        if(count($resultados)===1){
            return password_verify($password, $resultados[0]['password']);
        }else{
            return false;
        }
    }
    
    
}
