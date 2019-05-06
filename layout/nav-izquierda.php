<?php
$configuracion = require '../helpers/configuracion.php';

?>

  <!-- Nav -->
        <nav class="holygrail-nav col-lg-2 col-xxl-1 bg-inverse">

            <section class="text-center bg-danger">
                <h2>Nav</h2>
                <p class="lead">Here is where you put navigation or filters</p>
                <ul>
                    <li><a href="<?= $configuracion['urlBase'] ?>/paginas/formulario-nuevo-cliente.php">Nuevo Cliente</a></li>
                    <li><a href="<?= $configuracion['urlBase'] ?>/paginas/formulario-nueva-ca.php">Nueva CA</a></li>
                    <li><a href="<?= $configuracion['urlBase'] ?>/paginas/listado.php">Listado</a></li>
                    <li><a href="<?= $configuracion['urlBase'] ?>/paginas/formulario-deposito.php">Formulario Deposito</a></li>
                    <li><a href="<?= $configuracion['urlBase'] ?>/paginas/formulario-retiro.php">Formulario Retiro</a></li>
                </ul>
            </section>

            <div class="block bg-success text-inverse">
                <div class="container-fluid">
                    <section>
                        <h2>Fluid</h2>
                        <p class="lead mb-0">This element bleeds all the way out.</p>
                    </section>
                </div>
            </div>

            <div class="block py-0">
                <div class="container-fluid mx-3 py-5 bg-info text-inverse">
                    <section>
                        <h2>Padded</h2>
                        <p class="lead mb-0">This element has paddings.</p>
                    </section>
                </div>
            </div>

            <div class="block bg-success text-inverse">
                <div class="container-fluid">
                    <section>
                        <h2>Fluid</h2>
                        <p class="lead mb-0">This element bleeds all the way out.</p>
                    </section>
                </div>
            </div>
        </nav>