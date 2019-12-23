var base_url = "http://localhost/futcol/";
var idT = localStorage.getItem("id");
function cargarEquipos(){

  var tit = localStorage.getItem("tit");

  document.getElementById('title_tor').innerHTML = tit;
  //$('#title_tor').text(tit);getPartido
    $('#tableE').DataTable({
      "ajax":{
        url:base_url+'Equipo/getEquipo/'+idT,
        type:"GET"
      },
    });
}



var save_method; //for save method string
var table;
var idEquip=0;
function newEquipo()
{
  save_method = 'add';
  $('#formE')[0].reset(); // reset form on modals
  $('#modal_formE').modal('show'); // show bootstrap modal
//$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title*/


}

  function actEqui(id)
  {
    idEquip=id;
    save_method = 'update';
    $('#formE')[0].reset(); // reset form on modals
    //Ajax Load data from ajax
    $.ajax({
      url : base_url+'Equipo/getDataEqui/'+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          $('[name="nombre_equipo"]').val(data.nombre);
          $('#modal_formE').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Editar Equipo'); // Set title to Bootstrap modal title
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          swal('Error al obtener datos');
      }
    });
  }


  function salvarEquipo()
  {
    var url;
    if(save_method == 'add')
    {
      url = base_url+'Equipo/savEquipo/'+idT;
    }
    else
    {
     	url = base_url+'Equipo/equipoUpdate/'+idEquip;
    }

     // ajax adding data to database
        $.ajax({
          url : url,
          type: "POST",
          data: $('#formE').serialize(),
          dataType: "JSON",
          success: function(data)
          {
             //if success close modal and reload ajax table
             $('#modal_formE').modal('hide');
             if(save_method == 'add'){
               salvarTecnico();
             }
             $('#tableE').DataTable().ajax.reload();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              swal('Error al guardar Datos',':(','error');
          }
      });
  }

  function salvarTecnico(){
    var idequipo;
    $.ajax({
      url : base_url+'Equipo/idEqui',
      type: "POST",
      dataType: "JSON",
      success: function(data)
      {
        idequipo = data.idequi
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          swal('Error jajaja',':(','error');
      }
    });

    let nomTec = prompt("Ingrese Nombre Tecnico","Sr Encargado");
    if(nomTec == null){
      nomTec="Sr Tecnico";
    }else{
      nomTec=`${nomTec}`;
    }

    $.ajax({
      url : base_url+'Equipo/savTecnico/'+idequipo,
      type: "POST",
      data: {nombre_tec:nomTec},
      dataType: "JSON",
      success: function(data)
      {
        swal('Registro exitoso',':)','success');
         $('#tableE').DataTable().ajax.reload();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          swal('Error al guardar Datos',':(','error');
      }
  });

  }

  function delEqui(id)
  {
    swal({
    title: "Está seguro de que desea eliminar?",
    text: "Este equipo se perderá para siempre si confirmas",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-primary",
    confirmButtonText: "Si",
    cancelButtonText: "Cancelar",
    closeOnConfirm: false,
    closeOnCancel: true
    },
    function(isConfirm) {
      if (isConfirm) {
        //swal("Listo!",idp+" "+" gol "+idj+" "+ideq+"NOW()", "success");
        $.ajax({
          url : base_url+'Equipo/eliminarEqui/'+id,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            swal('Eliminación exitosa',':)','success');

            $('#tableE').DataTable().ajax.reload();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            swal('ops! hay una falla','no se pudo eliminar el equipo','Error');
          }
        });
      }
    });

  }

//<!--Fin Para Equipo-->
//<!--Script para tecnico-->
var idTecnico=0;
  function actTec(idtec)
  {
    idTecnico = idtec;
    save_method = 'update';
    //Ajax Load data from ajax
    $.ajax({
      url : base_url+'Equipo/getDataTecn/'+idtec,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          $('[name="nombre_tecnico"]').val(data.nombres);
          $('#modal_formT').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Editar técnico'); // Set title to Bootstrap modal title
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          swal('Error al obtener datos');
      }
    });
  }

  function guardarTecnico(){
    // ajax adding data to database
    if(idTecnico != 0){
      $.ajax({
        url:base_url+'Equipo/tecnicoUpdate/'+idTecnico,
         type: "POST",
         data: $('#formT').serialize(),
         dataType: "JSON",
         success: function(data)
         {
            //if success close modal and reload ajax table
            $('#modal_formT').modal('hide');
            $('#tableE').DataTable().ajax.reload();
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
             swal('Error al actualizar',':(','error');
         }
      });
    }
    else{
      swal("Error");
    }

  }

//<!--Fin para tecnico-->
//<!--Scrip para añadir jugadores-->
//<!-- Script para listar jugadores -->
var id_Equi;
var n_Equi;
function verEquipo(id_equipo){
  var num = 0;
  id_Equi = id_equipo;
  //$("#nombreE").val(n_Equi);
  $.ajax({
    url : base_url+'Equipo/getDataEqui/'+id_equipo,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        document.getElementById('nombreE').innerHTML = data.nombre;
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        swal('Error al obtener datos');
    }
  });



  $('#data_table_j').DataTable({
    destroy: true,
    "ajax":{
      url:base_url+'Jugador/getJugadores/'+id_equipo,
      type:"GET",
    },
  });
  $('#list_equipo').hide(1000);
  $('#list_jugad').show(1000);
/////
       //$('iden').val(Id_equipo);
  //document.getElementById("NE").innerHTML=nombre_equipo;
  //

}//fin del see

//CRUD PARA JUGADORES
  var save_juga; //for save method string
  function addJug(){
    //alert(id_Equi);
    save_juga = 'add';
    $('#form_J')[0].reset(); // reset form on modals
    $('#modal_form_J').modal('show'); // show bootstrap modal
    $('.modal-title').text('Nuevo Jugador'); // Set Title to Bootstrap modal title
    //document.getElementById('id_eq').innerHTML = id_Equi;
  }
//FUNCION PARA SELECCIONAR PUESTO
var idju=0;
  function actJug(id){
  //$('#prueba').show(1000);
    idju=id;
    save_juga = 'update';
    $('#form_J')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
      url : base_url+'Jugador/getDataJuga/'+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          $('[name="nombres"]').val(data.nombres);
          $('[name="apellidos"]').val(data.apellidos);
          $('[name="num_cam"]').val(data.num_cam);
          $('[name="puesto"]').val(data.puesto);

          $('#modal_form_J').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Editar Jugador'); // Set title to Bootstrap modal title
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          swal('Error al actualizar',':(','error');
      }
  });
  }

  function saveJugadorData(){
    var urli;
    if(save_juga == 'add')
    {
        urli = base_url+'Jugador/jugaSave/'+id_Equi;
    }
    else
    {
        urli = base_url+'Jugador/jugadUpdate/'+idju;
    }
        $.ajax({
          url : urli,
          type: "POST",
          data: $('#form_J').serialize(),
          dataType: "JSON",
          success: function(data)
          {
            swal('Datos guardados con éxito.',':)','success');
            $('#modal_form_J').modal('hide');
            $('#data_table_j').DataTable().ajax.reload();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              swal('Revise los datos por favor','Cuidado con los datos que introduces','error');
          }
      });
  }

  function delJug(id){
    swal({
    title: "Está seguro de que desea eliminar?",
    text: "Este Jugador se perderá para siempre si confirmas",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-primary",
    confirmButtonText: "Si",
    cancelButtonText: "Cancelar",
    closeOnConfirm: false,
    closeOnCancel: true
    },
    function(isConfirm) {
      if (isConfirm) {
        //swal("Listo!",idp+" "+" gol "+idj+" "+ideq+"NOW()", "success");
        $.ajax({
          url : base_url+'Jugador/eliminarJuga/'+id,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            swal('Eliminación exitosa',':)','success');
            $('#data_table_j').DataTable().ajax.reload();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            swal('ops! hay una falla','no se pudo eliminar el jugador','Error');
          }
        });
      }
    });
  }
//para ventanas ocultas

/*$('#ocultar').click(function(){
  $('#prueba').hide(1000);
});*/
$('#close_jugad').click(function(){
  $('#list_jugad').hide(1000);
  $('#list_equipo').show(1000);
  /*$.ajax({
      url : "<?php //echo site_url('equipoc/listar_j')?>",
      type: "POST",
      //dataType: "JSON",
      success: function(data)
      {

          //alert("Exito al cerrar ");
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          swal('Error al cerrar lista de jugadores');
      }
  });*/
});
