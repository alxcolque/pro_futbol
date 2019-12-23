<div class="modal fade" id="modal_form" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
     <h3 class="modal-title">Registrar arbitro</h3>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

     </div>
     <div class="modal-body form">
       <form action="#" id="form" class="form-horizontal">
         <input type="hidden" value="" name="id_arbitro"/>
         <div class="form-body">

           <div class="form-group">
             <label class="control-label col-md-3">Nombres</label>
             <div class="col-md-9">
               <input name="strNombres" placeholder="Nombres" class="form-control" type="text">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3">Apellidos</label>
             <div class="col-md-9">
               <input name="strApellidos" placeholder="Apellidos" class="form-control" type="text">
             </div>
           </div>

           <!--<div class="form-group">
       <label class="control-label col-sm-3">Foto</label>
       <input type="file" name="foto" id="icoLogo" />
       <span id="user_uploaded_image"></span>
     </div>-->

         </div>
       </form>
         </div>
         <div class="modal-footer">
           <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         </div>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
 <!-- End Bootstrap modal -->
