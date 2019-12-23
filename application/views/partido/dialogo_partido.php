<!-- Bootstrap modal -->
<div class="modal fade" id="modal_formp" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <h3 class="modal-title">Nuevo partido</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
      <div class="modal-body form">
    <form action="#" id="formp" class="form-horizontal">
      <div class="form-body">
      <div class="form-group col-md-12" align="center">
        <select id="sel_estadio" class="form-control form-control-sm" onChange="selectEstadio(this.value)">
          <option value="None">-Seleccione Estadio-</option>
            <!--datos aqui sale desde controlador--->
        </select>
          <input type="hidden" name="Id_estadio" id="Id_est" required/>
        </div>
      <div class="form-group col-md-12" align="center">
        <select class="form-control form-control-sm" id="sel_arbi" onChange="selectArb(this.value)">
          <option value="None">-Seleccione arbitro-</option>
            

        </select>
        <input type="hidden" name="id_arbitro" id="id_arb" required/>
      </div>

      <div class="form-group" align="center">
        <select class="form-control form-control-sm col-md-6" id="sel_eq_A" onChange="equipoA(this.value)">
          <option value="None">-EQUIPO LOCAL-</option>
          <!--datos aqui sale desde controlador--->
        </select>
        vs
        <select class="form-control form-control-sm col-md-6" id="sel_eq_B" onChange="equipoB(this.value)">
          <option value="None">-EQUIPO VISITANTE-</option>


        </select>
      </div>

      <!--datapicker-->
      <div class="card-body border-top">
        <p><span class="m-l-10  text-primary ">Fecha y hora del partido</span></p>
        <div class="form-group">
            <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7" id="fechaInicio"/>
                <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                </div>
            </div>
        </div>



    </form>
      </div>
  <div class="modal-footer">
  <button type="button" id="" onclick="guardarPartido()" class="btn btn-primary">Guardar Partido</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
