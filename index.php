<?php
require_once 'header.php';
require_once 'clases/MensajesSesion.php';
use app\clases\MensajesSesion;
?>
<div class="row">
    <div class="col-md-12">
        <!-- El tipo de codificación de datos, enctype, DEBE especificarse como sigue -->
        <form enctype="multipart/form-data" action="acciones/carga-archivos.php" method="POST">
            <div class="form-group">
                <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                Enviar este fichero: <input name="fichero_usuario" type="file" />
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Enviar fichero" />
            </div>            
        </form>        
    </div>
</div>
<div class="row">
    <p><?=MensajesSesion::getMensajes() ?></p>
</div>
<div class="row info">
    <?= phpinfo() ?>
</div>

<script>

</script>


<?php
require_once 'footer.php';
