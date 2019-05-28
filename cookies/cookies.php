<?php
require_once 'cabecera.php';
use app\clases\Traductor;
?>
        <section id="bloque-central" class="bloque">
            <article id="contenido-central" class="<?=$_COOKIE['lang']??'es'?>">
                <p>
                    <span><?=Traductor::t($_COOKIE['lang']??'es', 'Usted ha visitado el sitio')?> <?= $_COOKIE['visitas']??0 ?> <?=Traductor::t($_COOKIE['lang']??'es', 'veces')?></span>
                </p>
                <h3><?=Traductor::t($_COOKIE['lang']??'es', 'Contenido de la variable global')?> $_COOKIE</h3>
                <pre>
                    <?php
                        print_r($_COOKIE);
                    ?>
                </pre>
            </article>
        </section>
<?php
require_once 'footer.php';
?>