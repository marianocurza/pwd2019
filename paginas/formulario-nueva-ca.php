<?php
require_once '../helpers/FakeDB.php';
require_once '../layout/header.php';
require_once '../layout/nav-izquierda.php';
$banco = FakeDB::$banco;

// PROCESADO DEL POST

if(isset($_POST['boton'])){
    // FakeDB incluye Banco que a su vez incluye las demás clases
    $ca = $_POST;
    $cliente = $banco->buscarClientePorNumero($ca['nroCliente']);
    if($cliente){
        $cajaAhorro = new CajaAhorro($ca['nroCuenta'], $cliente, $ca['saldo']);
        if($banco->agregar($cajaAhorro)){
            $mensaje = 'Cuenta agregada';
        }else{
            $mensaje = 'Error';
        }        
    } else {
        $mensaje = 'Cliente inexistente';
    }


}

?>
     <!-- Main -->
        <main class="holygrail-main col-lg-7 col-xxl-9">
            <section class="text-center bg-warning">
                <h2>Main content</h2>
                <p class="lead">FORMULARIO NUEVA CAJA DE AHORRO</p>
                <span><?= $mensaje ?? '' ?></span>
            </section>

            <div class="block">
                <div class="container-fluid">
                    <section class="mb-4">
                        <form method="post">
                          <div class="form-group">
                            <label for="nombre">Nro Cliente</label>
                            <input type="text" class="form-control" name="nroCliente" id="nroCliente" placeholder="Ingrese Nro Cliente">
                          </div>
                          <div class="form-group">
                            <label for="apellido">Nro Cuenta</label>
                            <input type="text" class="form-control" name="nroCuenta" id="nroCuenta" placeholder="Ingrese Nro Cuenta">
                          </div>
                          <div class="form-group">
                            <label for="dni">Saldo</label>
                            <input type="text" class="form-control" name="saldo" id="dni" saldo="Ingrese saldo">
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