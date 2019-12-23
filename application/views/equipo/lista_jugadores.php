<!--segunda tabla-->
<div class="row">
  <div class="" align="left">
      <button title = "Regresar a equipos" id="close_jugad" type="button" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left fa-sm pr-2"aria-hidden="true"></i>Ir a equipos</button>
  </div>
  <span class="cui-contrast" aria-hidden="true"></span><h3 id = "nombreE"></h3>
</div>

<div class="col-md-12">
     <div class="panel panel-primary">

            <div class="panel-heading" align="right">
            	<h3 class="panel-title">
                	<button title = "Añadir Nuevo Jugador" class="btn btn-info btn-sm" onclick="addJug()"> <i class="fas fa-plus"></i> Nuevo Jugador</button>
            	</h3>
            </div>
         <div class="panel-body">
			<!--Inicia la tabla-->
			<label class="control-label col-md-3" ><h4 id="nombre_equipo"></h4></label>
			<div class="table-responsive">
				<table id="data_table_j" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><center>Nro</center></th>
							<th><center>Nombres</center></th>
							<th><center>Apellidos</center></th>
							<th><center>N°camiseta</center></th>
							<th><center>Puesto</center></th>
							<th><center>Opciones</center></th>
						</tr>
					</thead>

					<tbody>
						<!--Lista de jugadores-->
					</tbody>
				</table>
			</div>
			<!--Fin de tabla-->

		</div>
	</div>
</div>
