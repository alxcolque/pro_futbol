<div class="col-md-10 bg-white">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="fas fa-list" aria-hidden="true"></span> Seleccione un torneo para continuar...</h3>
            </div>
            <div class="panel-body">
<!---->
							<div class="table-responsive">
									<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Nro</th>
												<th>Torneo</th>
												<th>Lugar</th>
                        <th>Encargado</th>
												<th>Fecha</th>
												<th style="width:100px;">
												</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($mi_torneo as $arb){?>
													<tr>
  														<td><?php echo $arb->torneo_id;?></td>
  														<td><?php echo $arb->nombre;?></td>
  														<td><?php echo $arb->lugar;?></td>
                              <td><?php echo $arb->encargado;?></td>
  														<td><?php echo $arb->fecha_inicio;?></td>
  														<td>
  															<button class="btn btn-success"  onclick="miTorneo(<?php echo $arb->torneo_id;?>)">Ingresar <i class="fas fa-arrow-circle-right"></i></button>
												</button>
  														</td>
														</tr>
											<?php }?>

										</tbody>

									</table>
							</div>
				</div>
		</div>
</div>
<br /><br />
