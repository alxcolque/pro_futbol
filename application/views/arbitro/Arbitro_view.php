<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de administracion de futbol</title>
  	<?php $this->load->view("templates/estilos.php");?>


</head>

<body>

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
                <!-- Page Heading -->
                <div class="container">
                  <!--Tablas-->
                  <div id="list_equipo">
                      <?php $this->load->view('arbitro/tabla_arbitro.php'); ?>
                  </div>

                  <!--Fin de las tablas-->
    						</div>
				<!-- /.tabla de arbitros -->

            </div>


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php $this->load->view('arbitro/dialogo_arbitro.php'); ?>
<?php $this->load->view("templates/scripts.php");?>

<script type="text/javascript">

var tit = localStorage.getItem("tit");

document.getElementById('title_tor').innerHTML = tit;

  $(document).ready( function () {
      $('#table_id').DataTable();
  } );

    var save_method; //for save method string
    var table;
    function add_arb()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_arb(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('Arbitro/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_arbitro"]').val(data.arbitro_id);
            $('[name="strNombres"]').val(data.nombres);
            $('[name="strApellidos"]').val(data.apellidos);
            //$('[name="foto"]').val(data.foto);



            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Arbitro'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal('Error al obtener datos',':(','error');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('Arbitro/arb_add')?>";
      }
      else
      {
        	url = "<?php echo site_url('Arbitro/arb_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal('Error al guardar Datos',':(','error');
            }
        });
    }

    function delete_arb(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('Arbitro/arb_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {

               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal('No se puedo eliminar este registro',':(','error');
            }
        });

      }
    }

  </script>

</body>

</html>
