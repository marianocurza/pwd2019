<?php
namespace app;
require_once 'Vista.php';

class Noticia 
{
    private $cabecera;
    private $cuerpo;
    private $pie;

    public function __construct(string $cabecera, string $cuerpo, string $pie)
    {
        $this->cabecera = $cabecera;
        $this->cuerpo = $cuerpo;
        $this->pie = $pie;
    }
    
    public function obtenerHtmlSimple() : string
    {
        $archivo = dirname(__FILE__).DIRECTORY_SEPARATOR.'noticia'.DIRECTORY_SEPARATOR.'vista_simple.php';
        $vista = new Vista($archivo, ['cabecera'=>$this->cabecera]);
        return $vista->render();
    }
    
    public function obtenerHtmlAmpliado(): string
    {
        $archivo = dirname(__FILE__).DIRECTORY_SEPARATOR.'noticia'.DIRECTORY_SEPARATOR.'vista_ampliada.php';
        $vista = new Vista($archivo, [
                'cabecera'=>$this->cabecera,
                'cuerpo'=>$this->cuerpo,
                'pie'=>$this->pie
                ]);
        return $vista->render();
    }
    
    public static function listaNoticias(): array
    {
        $noticia1 = new Noticia('cabecera 1', 'cuerpo 1', 'pie 1');
        $noticia2 = new Noticia('cabecera 2', 'cuerpo 2', 'pie 2');
        $noticia3 = new Noticia('cabecera 3', 'cuerpo 3', 'pie 3');
        $noticia4 = new Noticia('cabecera 4', 'cuerpo 4', 'pie 4');
        return [$noticia1, $noticia2, $noticia3, $noticia4];
    }
    
    
}

