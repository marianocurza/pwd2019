<?php
error_reporting(E_ALL);
ini_set('display_errors', 'stdout');

require_once 'header.php';
require_once 'clases/ListaPersonas.php';
?>
	<div class="row">
		<div class="col-md-12">
			<form role="form" class="form-inline" method="get">
				<div class="form-group">
					 
					<label for="correo">
						Correo
					</label>
					<input class="form-control" id="correo" name="correo" type="text" value="<?= $_GET['correo'] ?? ''?>"/>
				</div>
				<div class="form-group">
					 
					<label for="apellido">
						Apellido
					</label>
					<input class="form-control" id="apellido" name="apellido" type="text" value="<?= $_GET['apellido'] ?? ''?>"/>
				</div>
				<div class="checkbox">
					<label for="estudiante">
						¿Es Estudiante?
					</label>
					 <select name="estudiante" id="estudiante">
					 	<option value="" <?= empty($_GET['estudiante'])?'selected':''; ?>  > - </option>
					 	<option value="S" <?= !empty($_GET['estudiante']) && $_GET['estudiante']=='S'?'selected':'';  ?>  > Si </option>
					 	<option value="N" <?= !empty($_GET['estudiante']) && $_GET['estudiante']=='N'?'selected':'';    ?> > No </option>
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
			<table class="table">
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
				<tbody>
					<?php
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
				</tbody>
			</table>
		</div>
	</div>



<?php
require_once 'footer.php';
