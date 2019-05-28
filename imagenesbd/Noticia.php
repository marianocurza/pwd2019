<?php
namespace app;

class Noticia 
{
    private $cabecera;
    private $cuerpo;
    private $pie;
    private $url;

    public function __construct(string $cabecera, string $cuerpo, string $pie, string $url, int $id = null)
    {
        $this->cabecera = $cabecera;
        $this->cuerpo = $cuerpo;
        $this->pie = $pie;
        $this->url = $url;
        $this->id = $id;
    }
    
    public function getUrl(): string
    {
        return $this->url;
    }
    
    public function obtenerImagenBase64():string
    {
        $archivoImg = dirname(__FILE__).DIRECTORY_SEPARATOR.'imgs'.DIRECTORY_SEPARATOR.$this->url;
        $imagedata = file_get_contents($archivoImg);
        $base64 = base64_encode($imagedata);
        return '<img src="data:image/png;base64,'.$base64.'">';
    }
    
    public static function listaNoticias(): array
    {
        $archivoBD = dirname(__FILE__).DIRECTORY_SEPARATOR.'bd'.DIRECTORY_SEPARATOR.'bd.sqlite';
        $db = new \PDO('sqlite:'.$archivoBD);
        // traigo todos porque son pocos
        $todasLasNoticias = $db->query('select * from noticias')->fetchAll();
        $resultado = [];
        foreach($todasLasNoticias as $noticia)
        {
             $noticia = new Noticia($noticia['cabecera'], $noticia['cuerpo'], $noticia['pie'], $noticia['url'], $noticia['id']);
             $resultado[] = $noticia;
        }
        return $resultado;
    }
    
    
}

