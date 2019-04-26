<?php
require_once 'header.php';
require_once './clases/Tablero.php';

$tableroJuego = new app\clases\Tablero();
$dimensiones = $tableroJuego->getDimensiones();
// dimensiones tiene una forma de [filas, columnas]
?>
<div class="row">
    <div class="col-md-6">
        <table id='tabla_jugador'>
            <?php
                for($fila = 0; $fila<$dimensiones[0]; $fila++)
                {
                    echo "<tr>";
                        for($columna = 0; $columna<$dimensiones[1]; $columna++)
                        {
                            echo "<td>($fila,$columna)</td>";
                        }
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
    <div class="col-md-6">
        <table id='tabla_oponente'>
            <?php
                for($fila = 0; $fila<$dimensiones[0]; $fila++)
                {
                    echo "<tr>";
                        for($columna = 0; $columna<$dimensiones[1]; $columna++)
                        {
                            echo "<td>($fila,$columna)</td>";
                        }
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <img alt="Jugador 1" src="images/user.png" />
    </div>
    <div class="col-md-2">
        Jugador 1 Vs Computadora
    </div>
    <div class="col-md-5">
        <img alt="Jugador 1" src="images/user.png" />
    </div>
</div>
<?php
require_once 'footer.php';
