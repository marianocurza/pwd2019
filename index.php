<?php
require_once 'header.php';
require_once 'clases/Persona.php';
use app\clases\Persona;
?>
<div class="container">
  <?php
  // descomentar y completar el siguiente código para incorporar la lógica de búsqueda
  /**
  if(isset($_GET['btnBuscarPersonas'])){
    $parametroInputBusqueda = $_GET['inputBuscarPersonas']??'';
    $parametrosBusqueda = [
        'nombre'=> $parametroInputBusqueda,
        'apellido'=> $parametroInputBusqueda,
        'direccion'=> $parametroInputBusqueda
      ];
    $listaPersonas = Persona::buscarPorParametros($parametrosBusqueda, 'OR');
  }else{
    $listaPersonas = Persona::buscarPorParametros([]);
  }
  */
  
  //foreach($listaPersonas as $persona)
  //{
   // inicio el recorrido completando los datos de la persona
  ?>
  <div class="panel panel-default">
  <div class="panel-heading cabecera-persona">
    <h3 class="panel-title">
      <?php
        // echo $persona->getResumen().' | '.$persona->getCompania()->getResumen();
      ?>
      Sin Nombre, Juan - Dirección 123 | Compañia: Ejemplo SRL, Calle 123
    </h3> <!-- COMPLETAR CON LOS MÉTODOS CORRESPONDIENTES -->
    <a class="btn btn-primary btn-borrar-persona" href="<?= SITE_ROOT ?>operaciones/borrarPersona.php?idPersona=1">Borrar</a>
  </div>
  <div class="panel-body">
      <table class="table table-condensed table-striped table-bordered table-hover no-margin">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Fecha de Carga</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php
          // recorrer la lista
          //$listaAmigos = $persona->getInformacionAmigos();
          //foreach($listaAmigos as $amigo) // inicia el foreach de amigos
          //{
            
        ?>
          <tr>
            <td>
              <span class="name">Nombre Amigo 1</span>
            </td>
            <td>
              <span class="phone">Teléfono Amigo 1</span>
            </td>
            <td>
              02/06/2018
            </td>
            <td>
              <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-xs dropdown-toggle" data-original-title="" title="">
                  Acciones 
                  <span class="caret">
                  </span>
                </button>
                <ul class="dropdown-menu pull-right">
                  <li>
                    <a href="<?= SITE_ROOT ?>operaciones/borrarAmigo.php?idAmigo=1">Borrar</a>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
            <?php 
              // } // fin de foreach de amigos
              // remover la fila siguiente estática
            ?>
            <tr>
            <td>
              <span class="name">Nombre Amigo 2</span>
            </td>
            <td>
              <span class="phone">Teléfono Amigo 2</span>
            </td>
            <td>
              01/06/2018
            </td>
            <td>
              <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-xs dropdown-toggle" data-original-title="" title="">
                  Acciones 
                  <span class="caret">
                  </span>
                </button>
                <ul class="dropdown-menu pull-right">
                  <li>
                    <a href="<?= SITE_ROOT ?>operaciones/borrarAmigo.php?idAmigo=2">Borrar</a>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
  </div>
</div>
<?php
// } // fin de foreach de personas
?>
  
</div>
<?php
require_once 'footer.php';
?>