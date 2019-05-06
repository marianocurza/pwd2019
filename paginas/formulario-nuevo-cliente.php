<?php
require_once '../helpers/FakeDB.php';
require_once '../layout/header.php';
require_once '../layout/nav-izquierda.php';
$banco = FakeDB::$banco;

// PROCESADO DEL POST

if(isset($_POST['boton'])){
    // FakeDB incluye Banco que a su vez incluye las demás clases
    $cl = $_POST;
    $cliente = new Cliente($cl['dni'], $cl['nombre'], $cl['apellido'], $cl['nroCliente']);
    if($banco->agregarCliente($cliente)){
        $mensaje = 'Cliente agregado';
    }else{
        $mensaje = 'Error';
    }
}

?>
     <!-- Main -->
        <main class="holygrail-main col-lg-7 col-xxl-9">
            <section class="text-center bg-warning">
                <h2>Main content</h2>
                <p class="lead">FORMULARIO NUEVO CLIENTE.</p>
                <span><?= $mensaje ?? '' ?></span>
            </section>

            <div class="block">
                <div class="container-fluid">
                    <section class="mb-4">
                        <form method="post">
                          <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre">
                          </div>
                          <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese Apellido">
                          </div>
                          <div class="form-group">
                            <label for="dni">Dni</label>
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese dni">
                          </div>
                          <div class="form-group">
                            <label for="dni">Nro cliente</label>
                            <input type="text" class="form-control" name="nroCliente" id="nroCliente"  placeholder="Ingrese Nro. de Cliente">
                          </div>
                          <button name="boton" type="submit" class="btn btn-primary">Guardar</button>
                        </form>                        
                    </section>

                </div>
            </div>

        </main>


<?php
FakeDB::guardarEnSesion();
require_once '../layout/nav-derecha.php';
require_once '../layout/footer.php';