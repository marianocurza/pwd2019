<?php
error_reporting(E_ALL);
ini_set('display_errors', 'stdout');

require_once 'header.php';
?>
<div class="row">
    <div class="col-md-12">
        <form role="form" class="form-inline" method="get" id="formulario-personas">
            <div class="form-group">

                <label for="correo">
                    Correo
                </label>
                <input class="form-control" id="correo" name="correo" type="text" value=""/>
            </div>
            <div class="form-group">

                <label for="apellido">
                    Apellido
                </label>
                <input class="form-control" id="apellido" name="apellido" type="text" value=""/>
            </div>
            <div class="form-group checkbox">
                <label for="estudiante">
                    ¿Es Estudiante?
                </label>
                <select name="estudiante" id="estudiante">
                    <option value=""> - </option>
                    <option value="S"> Si </option>
                    <option value="N"> No </option>
                </select>
            </div> 
            <button type="submit" class="btn btn-primary" name="boton">
                Buscar
            </button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table" id="tabla-personas">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Correo
                    </th>
                    <th>
                        Apellido
                    </th>
                    <th>
                        Estudiante
                    </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    
    document.addEventListener('DOMContentLoaded', function(){
        
        $('#formulario-personas').on('submit', function(evento){
            evento.preventDefault();
            var parametros = $('#formulario-personas').serialize();
            
            console.log('comenzando el submit');

            $.ajax({
                method: "GET",
                url: "acciones/buscar-personas.php",
                data: parametros               
            })
            .done(function(data){
                    $('#tabla-personas tbody').html(data);
                })
            .fail(function(data){
                console.log(data);
                alert('Error');
            });

            console.log('finalizando el submit');
            
        });
    }, false);
</script>


<?php
require_once 'footer.php';
