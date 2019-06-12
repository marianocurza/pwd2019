<?php

require_once '../clases/ListaPersonas.php';
foreach (app\clases\ListaPersonas::obtenerListaPersonasFiltrada($_GET) as $persona) {
    // persona es un arreglo que contiene correo, apellido y estudiante

    echo "
            <tr>
                    <td>
                            #
                    </td>
                    <td>
                            {$persona["correo"]}
                    </td>
                    <td>
                            {$persona["apellido"]}
                    </td>
                    <td>
                            {$persona["estudiante"]}
                    </td>
            </tr>";
}
?>