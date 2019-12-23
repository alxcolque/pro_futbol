<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lista de arbitros - Sistema de administracion de futbol</title>

  	<?php $this->load->view("templates/estilos.php");?>

</head>

<body class="bg-dark">

    <div id="wrapper">
        <!-- Navigation -->

        <div id="content-wrapper">

            <div class="container-fluid ">

                <!-- Page Heading -->
               <?php $this->load->view("data/all_torneos.php");?>

            </div>


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php $this->load->view("templates/scripts.php");?>
<script src="<?php echo base_url('assets/js/torneo.js')?>"></script>
</body>

</html>
