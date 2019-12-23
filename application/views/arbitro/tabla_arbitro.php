<div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="fas fa-list" aria-hidden="true"></span>Lista de Árbitros</h3>
				<button class="btn btn-success" onclick="add_arb()"><i class="fas fa-plus"></i> Nuevo</button>
            </div>
            <div class="panel-body">
<!---->
							<div class="table-responsive">
									<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Nro</th>
												<th>Nombres</th>
												<th>Apellidos</th>
												<th style="width:125px;">Action
												</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($sel_Arbi as $arb){?>
													<tr>
														<td><?php echo $arb->arbitro_id;?></td>
														<td><?php echo $arb->nombres;?></td>
														<td><?php echo $arb->apellidos;?></td>
														<td>
															<button class="btn btn-warning" onclick="edit_arb(<?php echo $arb->arbitro_id;?>)"><i class="fas fa-edit"></i></button>
															<button class="btn btn-danger" onclick="delete_arb(<?php echo $arb->arbitro_id;?>)"><i class="fas fa-trash"></i></button>


														</td>
														</tr>
											<?php }?>

										</tbody>

										<tfoot>
											<tr>
											<th>Nro</th>
											<th>Nombres</th>
											<th>Apellidos</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
							</div>
				</div>
		</div>
</div>
<br /><br />
