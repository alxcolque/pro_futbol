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
        #list_equipo{
            width: 100%;
            height: 100%;
            background:#FFF;
            //display:none;
        }
        #list_jugad{
            width: 100%;
            height: 100%;
            background:#FFF;
            display:none;
        }
    </style>
</head>

<body onload="cargarEquipos();">

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
                <li class="breadcrumb-item active">Equipos</li>
              </ol>

  						<div class="container">
                <!--Tablas-->
                <div id="list_equipo">
                    <?php $this->load->view('equipo/lista_equipos.php'); ?>
                </div>
                <div id="list_jugad">
                    <?php $this->load->view('equipo/lista_jugadores.php'); ?>
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
<?php $this->load->view('equipo/dialogo_add_equipo.php'); ?>
<?php $this->load->view("templates/scripts.php");?>
<script src="<?php echo base_url('assets/js/partido.js')?>"></script>
<script src="<?php echo base_url('assets/js/equipo.js')?>"></script>


</body>
</html>
