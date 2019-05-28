<?php
require_once 'Noticia.php';
use app\Noticia;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo de Plantillas</title>
        <style type="text/css">
            section.contenedor {
                display:flex;
                flex-wrap:wrap;
                flex-direction:row;
                justify-content:flex-start;
                align-items:stretch;
            }
            div.columna {
                flex: 1;
            }
            div.columna:nth-child(2n)
            {
                background: gray;
            }
            div.columna:nth-child(2n+1)
            {
                background: #ccc;
            }
        </style>
    </head>
    <body>
        <section class="contenedor">
            <div class="columna">
                <h3>Listado AMPLIADO</h3>
                <?php
                    foreach(Noticia::listaNoticias() as $noticia)
                    {
                        echo $noticia->obtenerHtmlAmpliado();
                    }
                ?>
            </div>
            <div class="columna">
                <h3>Listado SIMPLE</h3>
                <?php
                    foreach(Noticia::listaNoticias() as $noticia)
                    {
                        echo $noticia->obtenerHtmlSimple();
                    }
                ?>
            </div>
        </section>
    </body>
</html>
