<?php
require_once 'header.php';
require_once './clases/AlineacionBarcos.php';
require_once './clases/Tablero.php';

$tableroJuego = new app\clases\Tablero();

$nuevaAlineacion = new app\clases\AlineacionBarcos();
$alineacionesPosibles = $nuevaAlineacion->getAlienacionesPosibles();

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
                <tr class="table-active">
                    <td>
                        1
                    </td>
                    <td>
                        Barco 1
                    </td>
                    <td>
                        <input name="letra_barco_1" id="letra_barco_1" size="2" type="text" value="<?= isset($_POST['letra_barco_1'])?$_POST['letra_barco_1']:'' ?>"/> -
                        <input name="numero_barco_1" id="numero_barco_1" size="2" type="text" value="<?= isset($_POST['numero_barco_1'])?$_POST['numero_barco_1']:'' ?>"/>
                    </td>
                    <td>
                        <select name="orientacion_barco_1" id="orientacion_barco_1">
                            <?php
                                foreach($alineacionesPosibles as $alineacion )
                                {
                                  $seleccionado = isset($_POST['orientacion_barco_1'])&&$_POST['orientacion_barco_1']==$alineacion?'selected':'';
                                  echo "<option $seleccionado>$alineacion</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr class="table-active">
                    <td>
                        2
                    </td>
                    <td>
                        Barco 2
                    </td>
                    <td>
                        <input name="letra_barco_2" id="letra_barco_2" size="2" type="text" value="<?= isset($_POST['letra_barco_2'])?$_POST['letra_barco_2']:'' ?>"/> -
                        <input name="numero_barco_2" id="numero_barco_2" size="2" type="text" value="<?= isset($_POST['numero_barco_2'])?$_POST['numero_barco_2']:'' ?>"/>
                    </td>
                    <td>
                        <select name="orientacion_barco_2" id="orientacion_barco_2">

                            <?php
                                foreach($alineacionesPosibles as $alineacion )
                                {
                                  $seleccionado = isset($_POST['orientacion_barco_2'])&&$_POST['orientacion_barco_2']==$alineacion?'selected':'';
                                  echo "<option $seleccionado>$alineacion</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr class="table-active">
                    <td>
                        3
                    </td>
                    <td>
                        Barco 3
                    </td>
                    <td>
                        <input name="letra_barco_3" id="letra_barco_3" size="2" type="text" value="<?= isset($_POST['letra_barco_3'])?$_POST['letra_barco_3']:'' ?>"/> -
                        <input name="numero_barco_3" id="numero_barco_3" size="2" type="text" value="<?= isset($_POST['numero_barco_3'])?$_POST['numero_barco_3']:'' ?>" />
                    </td>
                    <td>
                        <select name="orientacion_barco_3" id="orientacion_barco_3">
                            <?php
                                foreach($alineacionesPosibles as $alineacion )
                                {
                                  $seleccionado = isset($_POST['orientacion_barco_3'])&&$_POST['orientacion_barco_3']==$alineacion?'selected':'';
                                  echo "<option $seleccionado>$alineacion</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr class="table-active">
                    <td>
                        4
                    </td>
                    <td>
                        Barco 4
                    </td>
                    <td>
                        <input name="letra_barco_4" id="letra_barco_4" size="2" type="text" value="<?= isset($_POST['letra_barco_4'])?$_POST['letra_barco_4']:'' ?>"/> -
                        <input name="numero_barco_4" id="numero_barco_4" size="2" type="text" value="<?= isset($_POST['numero_barco_4'])?$_POST['numero_barco_4']:'' ?>" />
                    </td>
                    <td>
                        <select name="orientacion_barco_4" id="orientacion_barco_4">

                            <?php
                                foreach($alineacionesPosibles as $alineacion )
                                {
                                  $seleccionado = isset($_POST['orientacion_barco_4'])&&$_POST['orientacion_barco_4']==$alineacion?'selected':'';
                                  echo "<option $seleccionado>$alineacion</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr class="table-active">
                    <td>
                        5
                    </td>
                    <td>
                        Barco 5
                    </td>
                    <td>
                        <input name="letra_barco_5" id="letra_barco_5" size="2" type="text" value="<?= isset($_POST['letra_barco_5'])?$_POST['letra_barco_5']:'' ?>"/> -
                        <input name="numero_barco_5" id="numero_barco_5" size="2" type="text" value="<?= isset($_POST['numero_barco_5'])?$_POST['numero_barco_5']:'' ?>"/>
                    </td>
                    <td>
                        <select name="orientacion_barco_5" id="orientacion_barco_5">

                            <?php
                                foreach($alineacionesPosibles as $alineacion )
                                {
                                  $seleccionado = isset($_POST['orientacion_barco_5'])&&$_POST['orientacion_barco_5']==$alineacion?'selected':'';
                                  echo "<option $seleccionado>$alineacion</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
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
