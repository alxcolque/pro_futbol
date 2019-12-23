
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resulados de los partidos</title>
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
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Campeonato de fútbol 2019
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                  <div class="col-md-10">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>Tabla de posiciones</h3>
            				<!--<button class="btn btn-success" onclick="add_arb()"><i class="glyphicon glyphicon-plus"></i> Nuevo</button>-->
                        </div>
                        <div class="panel-body">
            <!---->
            							<div class="table-responsive">
            									<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
            										<thead>
            											<tr>
                                    <th>No</th>
            												<th>Equipos</th>
            												<th>PTS</th>
            												<th>PJ</th>
            												<th>PE</th>
            												<th>PP</th>
                                    <th>GF</th>
                                    <th>GC</th>
                                    <th>DIF</th>
            											</tr>
            										</thead>
            										<tbody>
            											<?php
                                    $n=0;
                                    $a = 1;
                                    $b = 2;
                                    $pts = 30;
                                    foreach($resultado as $it){?>
            													<tr>
            														<td><?php echo ++$n;?></td>
            														<td><?php echo $it->nombre;?></td>
            														<td><?php echo $pts-=2;?></td>
            														<td><?php echo 9;?></td>
            														<td><?php echo 9-3;?></td>
                                        <td><?php echo 6;?></td>
                                        <td><?php echo $a+=3;?></td>
                                        <td><?php echo $b+=1;?></td>
                                        <td><?php echo $a-$b;?></td>
            													</tr>
            											<?php }?>

            										</tbody>

            										<tfoot>
                                  <tr>
                                    <th>No</th>
            												<th>Equipos</th>
            												<th>PTS</th>
            												<th>PJ</th>
            												<th>PE</th>
            												<th>PP</th>
                                    <th>GF</th>
                                    <th>GC</th>
                                    <th>DIF</th>
            											</tr>
            										</tfoot>
            									</table>
            							</div>
            				</div>
            		</div>
            </div>
            <br /><br />
				<!--Fin del formulario-->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php $this->load->view("templates/scripts.php");?>

</body>

</html>
