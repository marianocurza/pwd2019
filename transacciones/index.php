<?php
require_once 'clases/Empleado.php';

use app\clases\Empleado;

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
            div.formulario {
                display:flex;
                flex-direction:column;
            }
            
        </style>
    </head>
    <body>
        <section class="contenedor">
            <div class="columna">
                <h3>Formulario de Empleados</h3>
                <form method='post'>
                    <div class="formulario">
                        <label for="apellinom">Apellido y Nombre</label>
                        <input id='apellinom' name='apellinom' value='<?= $_POST['apellinom']??''?>'>
                        <label for="dni">DNI</label>
                        <input id='dni' name='dni' value='<?= $_POST['dni']??''?>'>
                        <label for="puesto">Puesto de Trabjo</label>
                        <input id='puesto' name='puesto' value='<?= $_POST['puesto']??''?>'>
                        <button type='submit' name='btnguardar'>Guardar</button>
                    </div>
                </form>
            </div>
            <div class="columna">
                <h3>Listado de Empleados</h3>
                <?php
                    if(isset($_POST['btnguardar']))
                    {
                        Empleado::guardar($_POST);
                    }
                ?>
                <table>
                    <thead>
                        <tr>Apellido y Nombre</tr>
                        <tr>DNI</tr>
                        <tr>Puesto de Trabajo</tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach(Empleado::listaEmpleados() as $empleado)
                    {
                        echo "<tr> 
                                <td>{$empleado->getApelliNom()}</td>
                                <td>{$empleado->getDni()}</td>
                                <td>{$empleado->getPuesto()}</td>
                               </tr>";
                    }
                    ?>
                    </tbody>
                </table>
                </div>
        </section>
    </body>
</html>
