<?php
require_once 'header.php';
require_once './clases/Tablero.php';

$tableroJuego = new app\clases\Tablero();

?>
<div class="row">
    <div class="col-md-6">
        <form method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Barco
                    </th>
                    <th>
                        Coordenadas
                    </th>
                    <th>
                        Alineación
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tableroJuego->getBarcos() as $barco) :
                 /* @var $barco \app\clases\Barco */                    
                ?>
                <tr class="table-active">
                    <td>
                        #
                    </td>
                    <td>
                        <?= $barco->getNombre(); ?>
                    </td>
                    <td>
                        <?= $barco->getInputLetra($_POST); ?>
                        <?= $barco->getInputNumero($_POST); ?>
                    </td>
                    <td>
                        <?= $barco->getSelectOrientacion($_POST); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="form-group">
            <label for="user_email">
                Usuario
            </label>
            <input class="form-control" id="user_email" name="user_email" type="email" value="<?= isset($_POST['user_email'])?$_POST['user_email']:'' ?>"/>
        </div> 
        <button type="submit" class="btn btn-primary" name="boton">
            Submit
        </button>
            
        </form>
    </div>
    <div class="col-md-6">
        <table id='tabla_jugador_preview'>
            <?php
                $dimensiones = $tableroJuego->getDimensiones();
                $letrasFilas = $tableroJuego->getLetrasFila();
                $tableroJuego->setConfiguracion($_POST);
                for($fila = 0; $fila<$dimensiones[0]; $fila++)
                {
                    echo "<tr>";
                        for($columna = 0; $columna<$dimensiones[1]; $columna++)
                        {
                            $columnaReal = $columna + 1;
                            $conbarco = $tableroJuego->tieneBarco($fila, $columna)?'con_barco':'';
                            echo "<td class='$conbarco'>({$letrasFilas[$fila]},$columnaReal)</td>";
                        }
                    echo "</tr>";
                }
            ?>
        </table>
        
    </div>
</div>
<?php
require_once 'footer.php';
