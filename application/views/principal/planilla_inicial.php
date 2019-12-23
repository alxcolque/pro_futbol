<div class="row">
  <!-- DataTables Example -->
  <div class="col-md-6">
    <!-- DataTables Example class="p-3 md-2 bg-danger text-white" -->
      <div class="card mb-3">
        <div class="card-header">

          <i class="fas fa-table"></i>
          <span class="m-l-10 text-dark" id="lbl_ea"></span>
          <button onclick="cargarListaJugadores1(1)" type="button" class=" btn btn-primary btn-sm">
            <i class="fa fa-wrench"></i>&nbsp; Configurar
          </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-dark" id="dataTable1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jugadores</th>
                  <th>Num</th>
                </tr>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
                <!--Aqui los datos de la tabla Jugadores-->
              </tbody>
            </table>
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
  </div>
  <!-- DataTables Example -->
  <div class="col-md-6">
    <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header">

          <i class="fas fa-table"></i>
          <span class="m-l-10 text-dark" id="lbl_eb"></span>
          <button onclick="cargarListaJugadores1(2)" type="button" class="btn btn-primary btn-sm">
          <i class="fa fa-wrench"></i>&nbsp; Configurar</button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-dark" id="dataTable2" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jugadores</th>
                  <th>Num</th>
                </tr>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
                <!--Data--->
              </tbody>
            </table>
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
  </div>
  <div class="col-lg-11" id="btn_iniciar">
    <button class="btn btn-success"  onclick="btnIniciar()"><i class="fas fa-play"></i> Iniciar Partido</button>
  </div>
</div>

<!-- Ventanas modales -->
<!-- Button to Open the Modal -->

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Organizar Equipo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <!-- DataTables Example -->
          <div class="col-md-6">
              <!--<div class="card">-->
                  <div class="card-header">
                      <strong class="card-title">Disponible</strong>
                  </div>
                  <!--<div class="card-body">-->
                      <table class="table" id="table0">
                          <thead class="thead-dark">
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col"></th>
                              </tr>
                          </thead>
                          <tbody>
                            <!--Data--->
                          </tbody>
                      </table>

                  <!--</div>-->
              <!--</div>-->
          </div>
          <!-- DataTables Example -->
          <!-- DataTables Example -->
          <div class="col-md-6">
              <!--<div class="card">-->
                  <div class="card-header">
                      <strong class="card-title">Para Juego</strong>
                  </div>
                  <!--<div class="card-body">-->
                      <table class="table" id="table1">
                          <thead class="thead-dark">
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col"></th>
                              </tr>
                          </thead>
                          <tbody>

                          </tbody>
                      </table>

                  <!--</div>-->
              <!--</div>-->
          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button onclick="refrescarTabla()" type="button" class="btn btn-success" data-dismiss="modal">Guardar Cambios</button>
      </div>

    </div>
  </div>
</div>
