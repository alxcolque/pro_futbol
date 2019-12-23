//Enturamiento de JavaScript
var base_url = "http://localhost/futcol/";
//Captura del id para torneo
function miTorneo(id)
{
  localStorage.setItem("id",id);
  window.location.replace('Inicio');
    //window.location.replace('Inicio/index/'+id);
    //recuperar();

    //location.href = "Inicio";
}
//Muestra las etiquetas necesarias en la pagina principal

///
var idp;//id partido
var id_T = localStorage.getItem("id");//id del torneo
var estado = 0;//estado de partido
var est_J; //estado jugador
var eqA,eqB;///Nombre de los equipos
var equ_IdA,equ_IdB;///id del equipo
var feci,fecd,fecr,fecf;
function seleccionarPartido(id){
  idp = id;
  $.ajax({
			url: base_url+'Inicio/botonEstado/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
        //document.getElementById('lbl_t').innerHTML=data.nombre;
        estado = data.estado_partido;
        $('#lbl_estadio').text(data.estadio);
        $('#lbl_arbitro').text(data.arbitro);
        equ_IdA=data.equipoA_id;
        equ_IdB=data.equipoB_id
        eqA=data.equipoa;
        eqB=data.equipob;
        feci = data.fecha_i;
        fecd = data.fecha_d;
        fecr = data.fecha_r;
        fecf = data.fecha_f;
        if(estado==1){

          $('#btn_en_juego').hide(1000);
          $('#planilla1').show(1000);
          $('#planilla2').hide(1000);
          $('#header_planilla').hide(1000);
          //tablas
          $('#lbl_ea').text(data.equipoa);
          $('#lbl_eb').text(data.equipob);

          planilllaPrincipalTitular(1);
        }
        else if(estado == 2){//si estado es 2 en ejecucion
          carga(feci);

          $('#bntConfA').show(1000);
          $('#bntConfB').show(1000);
          $('#bntCamA').show(1000);
          $('#bntCamB').show(1000);

          $('#btn_en_juego').show(1000);
          $('#planilla1').hide(1000);
          $('#planilla2').show(1000);
          $('#header_planilla').show(1000);
          $('#lbl_equipoA').text(data.equipoa);
          $('#lbl_equipoB').text(data.equipob);
          //tablas
          $('#lbl_ea2').text(data.equipoa);
          $('#lbl_eb2').text(data.equipob);
          planilllaPrincipalTitular(2);
        }
        else if(estado == 3){///si el partido está en pausa

          $('#bntConfA').hide(1000);
          $('#bntConfB').hide(1000);
          $('#bntCamA').hide(1000);
          $('#bntCamB').hide(1000);

          $('#btn_en_juego').show(1000);
          $('#planilla1').hide(1000);
          $('#planilla2').show(1000);
          $('#header_planilla').show(1000);
          $('#lbl_equipoA').text(data.equipoa);
          $('#lbl_equipoB').text(data.equipob);
          //tablas
          $('#lbl_ea2').text(data.equipoa);
          $('#lbl_eb2').text(data.equipob);
          planilllaPrincipalTitular(3);

        }
        else{
          swal("Resultado Final","El partido finalizó con éxito", "success");
          $('#btn_en_juego').hide(1000);

          $('#bntConfA').hide(1000);
          $('#bntConfB').hide(1000);
          $('#bntCamA').hide(1000);
          $('#bntCamB').hide(1000);

          $('#planilla1').hide(1000);
          $('#planilla2').show(1000);
          $('#header_planilla').show(1000);
          $('#lbl_equipoA').text(data.equipoa);
          $('#lbl_equipoB').text(data.equipob);
          //tablas
          $('#lbl_ea2').text(data.equipoa);
          $('#lbl_eb2').text(data.equipob);
          planilllaPrincipalTitular(4);

        }
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				swal("Opss...!","Error al al mostrar estado","error");
        	}
		});
  //var button='<button class="btn btn-success">Ingresar <i class="fas fa-arrow-circle-right"></i></button>';
  //$('#btn_iniciar').html(button);
}
//planilla encabezados

//fin encabezados
function cargarListaPartido(){
  cargarTitulo();
  //Vacio
  if(estado == 0){
    $.ajax({
  			url: base_url+'Inicio/getAll',
  			method: "POST",
  			//dataType: "JSON",
        data:{idet:id_T},
  			success: function(data)
  			{
  				$('#sel_parti').html(data);
  			},
  			error: function (jqXHR, textStatus, errorThrown)
  			{
  				swal("Opss...!","Error al mostrar partidos","error");
          	}
  		});
  }
  //Partido solo creado
  else if(estado == 1){
    swal("Opss...!","La tarea falló con exito","success");
  }
  //En juego
  else if(estado==2){

  }
  //Resultado del partido
  else{

  }
}
function cargarTitulo(){
  $.ajax({
			url: base_url+'Inicio/ajax_sel_titulo/'+id_T,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
        localStorage.setItem('tit',data.nombre);
        document.getElementById('lbl_t').innerHTML=data.nombre;

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				swal("Opss...!","Error al al mostrar titulo","error");
        	}
		});
}
///


////Script de planilla 1
function planilllaPrincipalTitular(est_p){
  var tabla,tabla2;
  if(est_p==1){
    tabla = '#dataTable1';
    tabla2 = '#dataTable2';
  }
  else
  if(est_p==2){//si el partido está enn juego
    tabla = '#dataTableA';
    tabla2 = '#dataTableB';

    //tabla de cambios
    ///lado izq Cambios
    $('#dataTableCA').DataTable({
      destroy: true,
      paging:false,
      lengthChange:false,
      ordering:false,
      info:false,
      searching:false,
      "ajax":{
        url:base_url+'Inicio/getTablaA/'+id_T,
        data:{idp:idp,est:2,est1:2,est_p:est_p},
        type:"GET"
      },
    });
    ///lado der Cambios
    $('#dataTableCB').DataTable({
      destroy: true,
      paging:false,
      lengthChange:false,
      ordering:false,
      info:false,
      searching:false,
      "ajax":{
        url:base_url+'Inicio/getTablaB/'+id_T,
        data:{idp:idp,est:2,est1:2,est_p:est_p},
        type:"GET"
      },
    });
    miHecho();
    hechosTotales();
  }
  else
  if(est_p==3){//si el partido está en pausa
    tabla = '#dataTableA';
    tabla2 = '#dataTableB';

    //tabla de cambios
    ///lado izq Cambios
    $('#dataTableCA').DataTable({
      destroy: true,
      paging:false,
      lengthChange:false,
      ordering:false,
      info:false,
      searching:false,
      "ajax":{
        url:base_url+'Inicio/getTablaA/'+id_T,
        data:{idp:idp,est:2,est1:2,est_p:est_p},
        type:"GET"
      },
    });
    ///lado der Cambios
    $('#dataTableCB').DataTable({
      destroy: true,
      paging:false,
      lengthChange:false,
      ordering:false,
      info:false,
      searching:false,
      "ajax":{
        url:base_url+'Inicio/getTablaB/'+id_T,
        data:{idp:idp,est:2,est1:2,est_p:est_p},
        type:"GET"
      },
    });
    miHecho();
    hechosTotales();
  }

  else{//si el partido finalizó
    tabla = '#dataTableA';
    tabla2 = '#dataTableB';

    //tabla de cambios
    ///lado izq Cambios
    $('#dataTableCA').DataTable({
      destroy: true,
      paging:false,
      lengthChange:false,
      ordering:false,
      info:false,
      searching:false,
      "ajax":{
        url:base_url+'Inicio/getTablaA/'+id_T,
        data:{idp:idp,est:2,est1:2,est_p:est_p},
        type:"GET"
      },
    });
    ///lado der Cambios
    $('#dataTableCB').DataTable({
      destroy: true,
      paging:false,
      lengthChange:false,
      ordering:false,
      info:false,
      searching:false,
      "ajax":{
        url:base_url+'Inicio/getTablaB/'+id_T,
        data:{idp:idp,est:2,est1:2,est_p:est_p},
        type:"GET"
      },
    });
    miHecho();
    hechosTotales();
  }

  $(tabla).DataTable({
    destroy: true,
    paging:false,
    lengthChange:false,
    ordering:false,
    info:false,
    "ajax":{
      url:base_url+'Inicio/getTablaA/'+id_T,
      data:{idp:idp,est:1,est1:3,est_p:est_p},
      type:"GET"
    },
  });
  $(tabla2).DataTable({
    destroy: true,
    paging:false,
    lengthChange:false,
    ordering:false,
    info:false,
    "ajax":{
      url:base_url+'Inicio/getTablaB/'+id_T,
      data:{idp:idp,est:1,est1:3,est_p:est_p},
      type:"GET"
    },
  });
  //

}
///fin de la planilla1
//Operaciones de ventanas de dialogos
var est_b;
function cargarListaJugadores1(aob){
  $('#myModal').modal('show'); // show bootstrap modal

  var est_a;
  if(aob==1){
    est_a=0;
    est_b=1;
    $('.modal-title').text(eqA); // Set title to Bootstrap modal title
  }else if (aob==2) {
    est_a=0;
    est_b=1;
    $('.modal-title').text(eqB);
  }else if (aob==3){
    aob=1;
    est_a=0;
    est_b=2;
    $('.modal-title').text(eqA);
  }else{
    aob=2;
    est_a=0;
    est_b=2;
    $('.modal-title').text(eqB);
  }
  $('#table0').DataTable({
    destroy: true,
    paging:false,
    searching:false,
    ordering:false,
    info:false,
    "ajax":{
      url:base_url+'Inicio/getTabla0/'+id_T,
      data:{idp:idp,est:est_a,equi:aob},
      type:"GET"
    },
  });
  $('#table1').DataTable({
    destroy: true,
    paging:false,
    searching:false,
    ordering:false,
    info:false,
    "ajax":{
      url:base_url+'Inicio/getTabla1/'+id_T,
      data:{idp:idp,est:est_b,equi:aob},
      type:"GET"
    },
  });
}
//Tabla en juego
var aob1;
function cargarListaJugadores2(aob){
  aob1=aob;
  var est_a;
  if(aob==1){
    est_a=0;
    est_b=1;
    $('#myModal1').modal('show'); // show bootstrap modal
    $('.modal-title1').text(eqA); // Set title to Bootstrap modal title
  }else if (aob==2) {
    est_a=0;
    est_b=1;
    $('#myModal1').modal('show'); // show bootstrap modal
    $('.modal-title1').text(eqB);
  }else if (aob==3){
    //aob=1;
    est_a=0;
    est_b=1;
    $('#myModalCamb').modal('show'); // show bootstrap modal
    $('.modal-title1').text(eqA+"--CAMBIO");
    //Cargar combobox entrar
    $.ajax({
        url: base_url+'Inicio/cargar_SelectJug/'+equ_IdA,
        method: "POST",
        data:{est_a:est_a},
        success: function(data)
        {
          $('#sel_ju_E').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          swal("Opss...!","Error al mostrar jugadores para cambio","error");
        }
      });
      //Cargar combobox salir
      $.ajax({
          url: base_url+'Inicio/cargar_SelectJug/'+equ_IdA,
          method: "POST",
          data:{est_a:est_b},
          success: function(data)
          {
            $('#sel_ju_S').html(data);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            swal("Opss...!","Error al mostrar jugadores para cambio","error");
          }
        });
    //Llenar tabla con datos de cambio
    $('#table000').DataTable({
      destroy: true,
      paging:false,
      searching:false,
      ordering:false,
      info:false,
      "ajax":{
        url:base_url+'Inicio/get_Tabla_Camb/'+idp,
        type:"GET",
        data:{idE:equ_IdA,aob:aob}
      },
    });
  }else{
    //aob=2;
    est_a=0;
    est_b=1;
    $('#myModalCamb').modal('show'); // show bootstrap modal
    $('.modal-title1').text(eqB+"--CAMBIO");
    //Cargar combobox entrar
    $.ajax({
        url: base_url+'Inicio/cargar_SelectJug/'+equ_IdB,
        method: "POST",
        data:{est_a:est_a},
        success: function(data)
        {
          $('#sel_ju_E').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          swal("Opss...!","Error al mostrar jugadores para cambio","error");
        }
      });
      //Cargar combobox salir
      $.ajax({
          url: base_url+'Inicio/cargar_SelectJug/'+equ_IdB,
          method: "POST",
          data:{est_a:est_b},
          success: function(data)
          {
            $('#sel_ju_S').html(data);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            swal("Opss...!","Error al mostrar jugadores para cambio","error");
          }
        });
    //Llenar tabla con datos de cambio
    $('#table000').DataTable({
      destroy: true,
      paging:false,
      searching:false,
      ordering:false,
      info:false,
      "ajax":{
        url:base_url+'Inicio/get_Tabla_Camb/'+idp,
        type:"GET",
        data:{idE:equ_IdB,aob:aob}
      },
    });
  }
  $('#table00').DataTable({
    destroy: true,
    paging:false,
    searching:false,
    ordering:false,
    info:false,
    "ajax":{
      url:base_url+'Inicio/getTabla0/'+id_T,
      data:{idp:idp,est:est_a,equi:aob},
      type:"GET"
    },
  });
  $('#table11').DataTable({
    destroy: true,
    paging:false,
    searching:false,
    ordering:false,
    info:false,
    "ajax":{
      url:base_url+'Inicio/getTabla1/'+id_T,
      data:{idp:idp,est:est_b,equi:aob},
      type:"GET"
    },
  });
}
///Operaciones de cambios
var id_JE=0,id_JS=0;
function selJugE(id){
  id_JE=id;
}
function selJugS(id){
  id_JS=id;
}
function confCambio(){
  var id_Eq;
  if(aob1==3){
    id_Eq = equ_IdA;
  }else{
    id_Eq = equ_IdB;
  }

  if(id_JE!=0 && id_JS!=0) //
  {
    ///llevar a la tabla de cambios
    $.ajax({
  			url : base_url+'Inicio/addCambios/'+idp,
  			type: "POST",
  			dataType: "JSON",
        data:{
          'idJE' :id_JE,
          'idJS' :id_JS,
          'idEq' :id_Eq
        },
  			success: function(data)
  			{
  			   //tabla de cambios
           $('#table000').DataTable().ajax.reload();
           //tabla
           $('#dataTableA').DataTable().ajax.reload();
           $('#dataTableB').DataTable().ajax.reload();
           //cambios
           $('#dataTableCA').DataTable().ajax.reload();
           $('#dataTableCB').DataTable().ajax.reload();
  			},
  			error: function (jqXHR, textStatus, errorThrown)
  			{
  				swal("Ops!","Se ha producido un error al realizar cambio ","error");
  			}
  		});
      id_JE = 0;
      id_JS = 0;
  }else {

      id_JE = 0;
      id_JS = 0;
      swal("Estimado Usuario...!","Seleccione los 2 campos, son obligatorios","warning");
      $('#myModalCamb').modal('hide');
  }
}
function deshacerCambio(id,id_E,id_S){
  $.ajax({
      url : base_url+'Inicio/deshacerCambioC/'+id,
      type: "POST",
      dataType: "JSON",
      data:{
        'idJE' :id_E,
        'idJS' :id_S
      },
      success: function(data)
      {

        $('#table000').DataTable().ajax.reload();
        //tabla
        $('#dataTableA').DataTable().ajax.reload();
        $('#dataTableB').DataTable().ajax.reload();
        //cambios
        $('#dataTableCA').DataTable().ajax.reload();
        $('#dataTableCB').DataTable().ajax.reload();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal("Ops!","No se pudo deshacer este registro ","error");
      }
    });
}
//fin cambios

function llevarATitular(id){
  $.ajax({
    url:base_url+'Inicio/actualizarEstado/'+id,
    method: "POST",
    dataType: "JSON",
    data:{esta:est_b},
    success: function(data)
    {

      if(estado==1){
        $('#table0').DataTable().ajax.reload();
        $('#table1').DataTable().ajax.reload();
        $('#dataTable1').DataTable().ajax.reload();
        $('#dataTable2').DataTable().ajax.reload();
      }else {
        $('#table00').DataTable().ajax.reload();
        $('#table11').DataTable().ajax.reload();
        $('#dataTableA').DataTable().ajax.reload();
        $('#dataTableB').DataTable().ajax.reload();
        //cambios
        $('#dataTableCA').DataTable().ajax.reload();
        $('#dataTableCB').DataTable().ajax.reload();
      }
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        swal('Error al realizar esta acción ');
    }
  });
}
function bajarDelTitular(id){
  $.ajax({
    url:base_url+'Inicio/actualizarEstado/'+id,
    method: "POST",
    dataType: "JSON",
    data:{esta:0},
    success: function(data)
    {
      if(estado==1){
        $('#table0').DataTable().ajax.reload();
        $('#table1').DataTable().ajax.reload();
        $('#dataTable1').DataTable().ajax.reload();
        $('#dataTable2').DataTable().ajax.reload();
      }else {
        $('#table00').DataTable().ajax.reload();
        $('#table11').DataTable().ajax.reload();
        $('#dataTableA').DataTable().ajax.reload();
        $('#dataTableB').DataTable().ajax.reload();
        //cambios
        $('#dataTableCA').DataTable().ajax.reload();
        $('#dataTableCB').DataTable().ajax.reload();
      }
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        swal('Error al realizar esta acción ');
    }
  });
}

//fin de modales

//ADICIONAR UN GOL AL EQUIPO A
function btnGol(idj,ideq){
  hecho(idj,ideq,1,"Anotó Gol?");
}
function btnamarilla(idj,ideq){
  hecho(idj,ideq,2,"Tarjeta Amarilla?");
}
function btnroja(idj,ideq){
  hecho(idj,ideq,3,"Tarjeta Roja?");
}
function hecho(idj,ideq,th,tit){
  swal({
  title: tit,
  text: "Una vez confirmado no podrá realizar cambios!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-primary",
  confirmButtonText: "Confirmo!",
  cancelButtonText: "Cancelar",
  closeOnConfirm: false,
  closeOnCancel: true
  },
  function(isConfirm) {
    if (isConfirm) {
      //swal("Listo!",idp+" "+" gol "+idj+" "+ideq+"NOW()", "success");
      $.ajax({
        url : base_url+'Inicio/addHecho',
        type: "POST",
        dataType: "JSON",
        data:{
          'partido_id':idp,
          'jugador_id':idj,
          'equipo_id':ideq,
          'tipo_hecho':th
        },
        success: function(data)
        {
          swal('Confirmado!','Has confirmado un GOL','success');
          $('#dataTableA').DataTable().ajax.reload();
          $('#dataTableB').DataTable().ajax.reload();
          //cambios
          $('#dataTableCA').DataTable().ajax.reload();
          $('#dataTableCB').DataTable().ajax.reload();
          miHecho();
          hechosTotales();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          swal('Falla!','no se pudo confimar el gol','Error');
        }
      });
    }
  });
}
///fin gol
function miHecho(){
  ///equipo A
  $.ajax({
			url: base_url+'Inicio/miHechoA/'+idp,
			type: "GET",
			dataType: "JSON",
      data:{tipo_h:1},
			success: function(data)
			{
        if(!data.hecho){
          $('#lbl_gol_A').text("0");
        }
        else{
          $('#lbl_gol_A').text(data.hecho);
        }
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				swal("Opss...!","Error al al mostrar hechos","error");
        	}
		});
    ///equipo B
    $.ajax({
  			url: base_url+'Inicio/miHechoB/'+idp,
  			type: "GET",
  			dataType: "JSON",
        data:{tipo_h:1},
  			success: function(data)
  			{
          if(!data.hecho){
            $('#lbl_gol_B').text("0");
          }
          else{
            $('#lbl_gol_B').text(data.hecho);
          }
  			},
  			error: function (jqXHR, textStatus, errorThrown)
  			{
  				swal("Opss...!","Error al al mostrar hechos","error");
          	}
  		});
}
//consulta de hechos totales
function hechosTotales(){
  ///equipo A
  $.ajax({
			url: base_url+'Inicio/miHechoAT/'+idp,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
        if(!data.Tgol){
          $('#golT').text("0");
        }
        else{
          $('#golT').text(data.Tgol);
        }
        if(!data.Tamarilla){
          $('#amaT').text("0");
        }
        else{
          $('#amaT').text(data.Tamarilla);
        }
        if(!data.Troja){
          $('#rojT').text("0");
        }
        else{
          $('#rojT').text(data.Troja);
        }
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				swal("Opss...!","Error al al mostrar hechos","error");
        	}
		});
    ///equipo B
    $.ajax({
  			url: base_url+'Inicio/miHechoBT/'+idp,
  			type: "GET",
  			dataType: "JSON",
  			success: function(data)
  			{
          if(!data.Tgol){
            $('#golT1').text("0");
          }
          else{
            $('#golT1').text(data.Tgol);
          }
          if(!data.Tamarilla){
            $('#amaT1').text("0");
          }
          else{
            $('#amaT1').text(data.Tamarilla);
          }
          if(!data.Troja){
            $('#rojT1').text("0");
          }
          else{
            $('#rojT1').text(data.Troja);
          }
  			},
  			error: function (jqXHR, textStatus, errorThrown)
  			{
  				swal("Opss...!","Error al al mostrar hechos","error");
          	}
  		});
}
//fin de hechos hechosTotales
//inciar Partido
//Detener partido
function actualizarPartido(est,ti){
  swal({
  title: ti,
  text: "Una vez realizado esta acción no podrá realizar cambios!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-primary",
  confirmButtonText: "Si..!",
  cancelButtonText: "Cancelar",
  closeOnConfirm: false,
  closeOnCancel: true
  },
  function(isConfirm) {
    if (isConfirm) {
      //swal("Listo!","NOW() "+est, "success");
      $.ajax({
        url : base_url+'Inicio/actPart/'+idp,
        type: "POST",
        dataType: "JSON",
        data:{est:est},
        success: function(data)
        {
          swal('Exito','Le pedimos Administrar cuidadosamente','success');
          seleccionarPartido(idp);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          swal('Falla!','No se puede actualizar el estado del partido ','error');
        }
      });
    }
  });
}
///inciar partido
function btnIniciar(){
  $.ajax({
    url : base_url+'Inicio/numeroJ/'+equ_IdA,
    type: "POST",
    dataType: "JSON",
    data:{idea:equ_IdA,ideb:equ_IdB},
    success: function(data)
    {
      if((data.nja >= 7 && data.nja <= 11) && (data.njb >= 7 && data.njb <= 11)){
        actualizarPartido(1,"¿Iniciar este partido?");
      }
      else{
        swal('No se permite! ','Para iniciar este partido se requiere entre 7 y 11 jugadores','info');
      }
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      swal('Falla!','No se pudo obtener el numero de jugadores','error');
    }
  });
}
///botonnes pausar reanudar Finalizar
function btnPausar(){
  actualizarPartido(2,"¿Detener partido?");
  detenerse();
}
function btnReanudar(){
  actualizarPartido(3,"¿Reanudar partido?");
  carga(fecr);
}
function btnFinalizar(){
  actualizarPartido(4,"¿Fin del partido?");
  detenerse();
}

///Cronometro
//setInterval
var cronometro;
function detenerse()
{
    clearInterval(cronometro);
}
function carga(fec)
{
  // Find the duration between two dates
  //var breakfast = moment('8:32','HH:mm');
  //var lunch = moment('12:52','HH:mm');
  //alert( moment.duration(lunch - breakfast).humanize() + ' between meals' ); // 4 hours between meals

  var fechai = moment(fec);
  var fechaf = moment();
  //var fechai = moment('2019-12-07 16:30:36');
  //var fechaf = moment('2019-12-07 16:35:36');
   // 16:13:11"MMM-DD-YYYY"
   //alert(fechai+' '+fechaf)
    var minutos = (fechaf.diff(fechai, 'minutes'));
    var segundos = (fechaf.diff(fechai, 'seconds'));
    //alert(minutos);
    contador_s = segundos%60;
    contador_m = minutos;
    $('#minutos').text(contador_m);
    m = document.getElementById("minutos");
    s = document.getElementById("segundos");

    cronometro = setInterval(
        function(){
            if(contador_s==60)
            {
                contador_s=0;
                contador_m++;
                m.innerHTML = contador_m;
            }
            s.innerHTML = contador_s;
            contador_s++;
        }
        ,1000);
}
