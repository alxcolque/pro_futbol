<div class="row">
  <!-- DataTables Example -->
  <div class="col-md-6">
    <!-- DataTables Example -->
    <div class="card-header">

      <i class="fas fa-table"></i>
      <span class="m-l-10 text-dark" id="lbl_ea2"></span>
      <button id="bntConfA" onclick="cargarListaJugadores2(1)" type="button" class="btn btn-success btn-sm"> <!--data-toggle="modal" data-target="#myModal1"-->
      <i class="fa fa-cog"></i>&nbsp; Configurar</button>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-dark" id="dataTableA" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Jugadores</th>
            <th>Gol</th>
            <th>T.A.</th>
            <th>T.R.</th>
          </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
          <!--Aqui los datos de la tabla Jugadores-->
        </tbody>
      </table>
      <button id="bntCamA" onclick="cargarListaJugadores2(3)" type="button" class="btn btn-primary btn-sm">
      <i class="fa fa-retweet"></i>&nbsp;Cambios</button>
      <table class="table table-bordered table-dark" id="dataTableCA" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <!--Aqui los datos de la tabla Jugadores-->

        </tbody>
        <tr>
          <th class="bg-light"></th>
          <th class="bg-dark"><center>TOTAL : </center></th>
          <th class="bg-dark"><center id="golT">2</center></th>
          <th class="bg-dark"><center id="amaT">1</center></th>
          <th class="bg-dark"><center id="rojT">0</center></th>
        </tr>
      </table>
    </div>

  </div>
  <!-- DataTables Example -->
  <div class="col-md-6">
    <!-- DataTables Example -->
    <div class="card-header">

      <i class="fas fa-table"></i>
      <span class="m-l-10 text-dark" id="lbl_eb2"></span>
      <button id="bntConfB" onclick="cargarListaJugadores2(2)" type="button" class="btn btn-success btn-sm">
      <i class="fa fa-cog"></i>&nbsp; Configurar</button>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-dark" id="dataTableB" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Jugadores</th>
            <th>Gol</th>
            <th>T.A.</th>
            <th>T.R.</th>
          </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
          <!--Aqui los datos de la tabla Jugadores-->
        </tbody>
      </table>
      <button id="bntCamB" onclick="cargarListaJugadores2(4)" type="button" class="btn btn-primary btn-sm">
      <i class="fa fa-retweet"></i>&nbsp;Cambios</button>
      <table class="table table-bordered table-dark" id="dataTableCB" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <!--Aqui los datos de la tabla Jugadores-->

        </tbody>
        <tr>
          <th class="bg-light"></th>
          <th class="bg-dark"><center>TOTAL : </center></th>
          <th class="bg-dark"><center id="golT1">2</center></th>
          <th class="bg-dark"><center id="amaT1">1</center></th>
          <th class="bg-dark"><center id="rojT1">0</center></th>
        </tr>
      </table>
    </div>

  </div>
</div>

<!-- Ventanas modales -->
<!-- Button to Open the Modal -->

<!-- The Modal -->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title1">Organizar Equipo</h4>
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
                      <table class="table" id="table00">
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
                      <table class="table" id="table11">
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

<!-- Modal para cambios -->
<div class="modal" id="myModalCamb" >
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title1">Organizar Equipo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <!---->
      <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header"><span class="ml-1 text-success">Entra:</span></h5>
                <div class="card-body p-0">
                  <select class="form-control form-control-sm col-md-12" id="sel_ju_E" onChange="selJugE(this.value)">
                    <option value="None">-Seleccione Jugador-</option>
                    <!--datos aqui sale desde controlador--->
                  </select>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-5 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header"><span class="ml-1 text-danger">Sale:</span></h5>
                <div class="card-body p-0">
                  <select class="form-control form-control-sm col-md-12" id="sel_ju_S" onChange="selJugS(this.value)">
                    <option value="None">-Seleccione Jugador-</option>


                  </select>
                </div>
            </div>
        </div>

      </div>
      <div  align="center">
        <button onclick="confCambio()" type="button" class="btn btn-primary btn-sm" >Confirmar Cambio</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div class="row" style="height: 200px; overflow-y: scroll; background:#ABCDEF;">
          <!-- DataTables Example -->
          <div class="col-md-12">


              <!--<div class="card">-->
                  <div class="card-header">
                      <strong class="card-title">Disponible</strong>
                  </div>
                  <!--<div class="card-body">-->
                      <table class="table" id="table000">
                          <thead class="thead-dark">
                              <tr>
                                  <center><th scope="col">Entra</th></center>
                                  <center><th scope="col">Sale</th></center>
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

        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"&times;>Cancelar</button>
        <button onclick="refrescarTabla()" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
      </div>

    </div>
  </div>
</div>
