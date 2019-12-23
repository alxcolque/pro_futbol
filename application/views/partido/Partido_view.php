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
    <style type="text/css">
        #panel_partido{
            width: 100%;
            height: 100%;
            background:#dde9e1;
            //display:none;
        }
        #detaller_partido{
            width: 100%;
            height: 100%;
            background:#f4e7d8;
            display:none;
        }
    </style>
</head>

<body onload="cargarPartido();">

	<?php $this->load->view("templates/navbar.php");?>
    <div id="wrapper">
	      <!-- Sidebar -->
		<?php $this->load->view("templates/sidebar.php");?>
        <!-- Navigation -->

        <div id="content-wrapper">

            <div class="container-fluid">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?php echo base_url('Inicio');?>" id="title_tor"></a>
                </li>
                <li class="breadcrumb-item active">Partidos</li>
              </ol>

  						<div class="container">
                <!--Tablas-->
                <div id="panel_partido">
                <?php $this->load->view('partido/tabla_partido.php'); ?>
                </div>
                <div id="detaller_partido">
                <?php $this->load->view('partido/detalle_partido.php'); ?>
                </div>

                <!--Fin de las tablas-->


  						</div>

                <!-- Page Heading -->

                <!-- /.row -->
				<!--Tablas-->

              <div id="#">
      					<?php //$this->load->view("data/planilla.php");?>
      				</div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#content-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php //include_once('modal/modal_DefinirE.php'); ?>
<?php $this->load->view('partido/dialogo_partido.php'); ?>
<?php $this->load->view("templates/scripts.php");?>
<script src="<?php echo base_url('assets/js/partido.js')?>"></script>


</body>
</html>
