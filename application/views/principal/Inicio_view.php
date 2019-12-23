<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de administración</title>

    <?php $this->load->view("templates/estilos.php");?>
</head>

<body onload="cargarListaPartido();">

	<?php $this->load->view("templates/navbar.php");?>
    <div id="wrapper">
	      <!-- Sidebar -->
		<?php $this->load->view("templates/sidebar.php");?>
        <!-- Navigation -->

        <div id="content-wrapper">

            <div class="container-fluid">
              <!-- Breadcrumbs-->

						<div class="container">
							<div class="row">

                <div class="col">

                  <select class="form-control input-lg" id="sel_parti" onChange="seleccionarPartido(this.value)">
                    <option value="None">-Seleccione Partido-</option>
                  </select>
                </div>
                <ul id="list_item">
                </ul>

								<div class="col" align="center" id="d2"><span class="m-l-10 text-secondary">ESTADIO: </span>
									<label id="lbl_estadio"></label>

								</div>
								<div class="col" id="d3">
									<!--<h5 id="timer" align="left">00:25:54</h5>-->
                  <h4>
        	        <span id="minutos"></span>:<span id="segundos"></span>
                </h4>
								</div>

                <div id="btn_en_juego" class="btn-group" role="group" arial-label="Basic example" style="display:none">
                  <div onclick="btnPausar()" type="button" class="btn btn-primary">Pausar</div>
                  <div onclick="btnReanudar()" type="button" class="btn btn-secondary">Reanudar</div>
                  <div onclick="btnFinalizar()" type="button" class="btn btn-danger">Finalizar</div>
                </div>
									<p class="results"></p>
							</div>

						</div>

            <!-- Page Heading -->
            <div class="row">
            	<!--Fecha y arbitro-->
                <div class="col-lg-12">


                	<div class="superior">
                        <h3 class="titulo-camp">Campeonato <label id="lbl_t"></label></h3>
      						</div>
                  <!--Arbitro-->
                  <label for="pet-select"><span class="m-l-10 text-secondary">ÁRBITRO: </span></label>
  								<label id="lbl_arbitro"></label>
                  <!-- FIN Arbitro-->
                  <br>
                  <div class="marcador" id="header_planilla" style="display:none">
                  	<div class="equipoA">
					              <label id="lbl_equipoA">equipo A</label>
                  	</div>
                      <div class="marcador_gol">
                          <h2 class="a"><label id="lbl_gol_A">0</label></h2>
                          <h3 class="vs">-</h3>
                          <h2 class="b"><label id="lbl_gol_B">0</label></h2>
                      </div>
                    <div class="equipoB">
					              <label id="lbl_equipoB">Equipo B</label>
                  	</div>
                  </div>

                </div>
            </div>
                <!-- /.row -->
				<!--Tablas-->

              <div id="planilla1"  style="display:none">
      					<?php $this->load->view("principal/planilla_inicial.php");?>
      				</div>
              <div id="planilla2" style="display:none">
      					<?php $this->load->view("principal/planilla_en_ejecucion.php");?>
      				</div>
            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#content-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php //include_once('modal/modal_DefinirE.php'); ?>
<?php $this->load->view("templates/scripts.php");?>
<script src="<?php echo base_url('assets/js/torneo.js')?>"></script>

</body>
</html>
