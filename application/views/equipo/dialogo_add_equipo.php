
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_formE" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="modal-title">Nuevo Equipo</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
        <div class="modal-body form">
          <form action="#" id="formE" class="form-horizontal">
            <div class="form-body">

              <!-- formula rio de cuerpo -->
              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-12">Nombre del equipo</label>
                  <div class="col-md-12">
                  <input name="nombre_equipo" placeholder="Nombre del Equipo" class="form-control" type="text">
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
        </button>
        <button type="button"  onclick="salvarEquipo()" class="btn btn-primary">Guardar
              <span class="fas fa-save" aria-hidden="true"></span>
        </button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_formT" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="modal-title">Nuevo Equipo</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
        <div class="modal-body form">
          <form action="#" id="formT" class="form-horizontal">
            <div class="form-body">

              <!-- formula rio de cuerpo -->
              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-12">Tecnico </label>
                  <div class="col-md-12">
                  <input name="nombre_tecnico" placeholder="Nombre del Tecnico" class="form-control" type="text">
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
        </button>
        <button type="button"  onclick="guardarTecnico()" class="btn btn-primary">Guardar
              <span class="fas fa-save" aria-hidden="true"></span>
        </button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal Jugadores -->
<div class="modal fade" id="modal_form_J" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="modal-title">Nuevo Jugador</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
        <div class="modal-body form">
          <form action="#" id="form_J" class="form-horizontal">
            <div class="form-body">

              <!-- formula rio de cuerpo -->
              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-12">Nombres </label>
                  <div class="col-md-12">
                  <input name="nombres" placeholder="Nombres" class="form-control" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-12">Apellidos </label>
                  <div class="col-md-12">
                  <input name="apellidos" placeholder="Apellidos" class="form-control" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-12">Num camiseta </label>
                  <div class="col-md-12">
                  <input name="num_cam" placeholder="Numero de camiseta" class="form-control" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-12">Puesto </label>
                  <div class="col-md-12">
                  <input name="puesto" placeholder="Puesto que ocupa el jugador" class="form-control" type="text">
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
        </button>
        <button type="button"  onclick="saveJugadorData()" class="btn btn-primary">Guardar
              <span class="fas fa-save" aria-hidden="true"></span>
        </button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
