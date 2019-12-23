var base_url = "http://localhost/futcol/";
var idT = localStorage.getItem("id");
function cargarPartido(){

  var tit = localStorage.getItem("tit");

  document.getElementById('title_tor').innerHTML = tit;
  //$('#title_tor').text(tit);getPartido

    $('#table').DataTable({
      "ajax":{
        url:base_url+'Partido/getPartido/'+idT,
        type:"GET"
      },
    });
}
var idEst = 0;
var idArb = 0;
var idEqA = 0;
var idEqB = 0;
function nuevoPartido()
{
    idEst = 0;
    idArb = 0;
    idEqA = 0;
    idEqB = 0;
    document.getElementById('fechaInicio').innerHTML = "";
  	//save_method = 'add';
  	//$('#formp')[0].reset();
  	$('#modal_formp').modal('show'); // show bootstrap modal
    cargarSelects();


}
// cargar select en el dialogos

function cargarSelects(){
  //select para estadios
  $.ajax({
      url: base_url+'Partido/getEstadio',
      method: "POST",
      data:{idt:idT},
      success: function(data)
      {
        $('#sel_estadio').html(data);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal("Opss...!","Error al mostrar estadios","error");
          }
    });
    //select arbitros
    $.ajax({
        url: base_url+'Partido/getArbitro',
        method: "POST",
        data:{idt:idT},
        success: function(data)
        {
          $('#sel_arbi').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          swal("Opss...!","Error al mostrar arbitros","error");
            }
      });
  //Select para equipos
  $.ajax({
      url: base_url+'Partido/getEquipo',
      method: "POST",
      data:{idt:idT},
      success: function(data)
      {
        $('#sel_eq_A').html(data);
        $('#sel_eq_B').html(data);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal("Opss...!","Error al mostrar equipos","error");
          }
    });

}
//Datos capturados del dialog crear partidos

function selectEstadio(id){
  idEst = id;
}
function selectArb(id){
  idArb = id;
}
function equipoA(id){
  idEqA = id;
  if(idEqB == idEqA){
    $('#modal_formp').modal('hide');
    swal("Opss...","Elija un equipo diferente al anterior.","error");
  }
}
function equipoB(id){
  idEqB = id;
  if(idEqA == idEqB){
    $('#modal_formp').modal('hide');
    swal("Opss...","Elija un equipo diferente al anterior.","error");
  }
}
//datepicker

//guardar partido
/*function formato(string) {//funcion para invertir cadenas
    var info = string.split('/').reverse().join('-');
    return info;
 }*/
function guardarPartido(){
  var fyh;
  fyh = moment(document.getElementById("fechaInicio").value).format('YYYY-MM-DD HH:mm:ss');

  if(idEst!=0 && idArb!=0 && idEqA!=0 && idEqB!=0 && fyh !="")
  {
    $.ajax({
  			url : base_url+'Partido/insertPart/'+idT,
  			type: "POST",
  			dataType: "JSON",
        data:{
          'est' :idEst,
          'arb' :idArb,
          'ea'  :idEqA,
          'eb'  :idEqB,
          'eb'  :idEqB,
          'fe'  :fyh
        },
  			success: function(data)
  			{
  			   //if success close modal and reload ajax table
  			   $('#modal_formp').modal('hide');
  			   swal("Registro exitoso");
  			  location.reload();// for reload a page
  			},
  			error: function (jqXHR, textStatus, errorThrown)
  			{
  				swal("Oh no!","Se ha producido un error al registrar partido ","error");
  			}
  		});
  }else {
      swal("Estimado Usuario...!","Complete todos los campos son obligatorios","warning");
      idEst = 0;
      idArb = 0;
      idEqA = 0;
      idEqB = 0;
      $('#modal_formp').modal('hide');
  }

}

function detallePart(id,estado){
  //alert(id);
  $('#panel_partido').hide(1000);
  $('#detaller_partido').show(1000);
  //El partido esta creado

  if(estado==1){
    $('#sec_en_jue').hide(1000);
    $('#sec_ter').hide(1000);
    $('#sec_resul').hide(1000);
    $('#sec_crea').show(1000);

    $.ajax({
  			url: base_url+'Partido/getDetalle/'+id,
  			type: "POST",
  			dataType: "JSON",
        data:{idto:idT},
  			success: function(data)
  			{
          //alert(data.partido);
          //localStorage.setItem('tit',data.nombre);
          document.getElementById('tit_part').innerHTML=data.partido;
          document.getElementById('estadio').innerHTML=data.estadio;
          document.getElementById('fecha').innerHTML=data.fecha;
          document.getElementById('arbitro').innerHTML=data.arbitro;
          //$('#tit_part').text(data.partido);fecha
          cuentaRegresiva(data.tiempo);

  			},
  			error: function (jqXHR, textStatus, errorThrown)
  			{
  				swal("Opss...!","Error al al mostrar detalle del partido","error");
        }
  		});
  }
  //Si el partido está en juego
  else if(estado==2){
    $('#sec_ter').hide(1000);
    $('#sec_resul').hide(1000);
    $('#sec_crea').hide(1000);
    $('#sec_en_jue').show(1000);
  }
  //Partido finalizado
  else if(estado==3){
    $('#sec_resul').hide(1000);
    $('#sec_crea').hide(1000);
    $('#sec_ter').show(1000);
    $('#sec_en_jue').hide(1000);
  }else{
    $('#sec_resul').hide(1000);
    $('#sec_crea').hide(1000);
    $('#sec_ter').show(1000);
    $('#sec_en_jue').hide(1000);
  }

}
function deletePart(id){
  alert(id);
}
function volver_a_partidos(){
  $('#panel_partido').show(1000);
  $('#detaller_partido').hide(1000);
}
function cuentaRegresiva(tiempo){
  // Set the date we're counting down to
  var countDownDate = new Date(tiempo).getTime();
  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("tiempo_restante").innerHTML = days + " días " + hours + " horas "
    + minutes + " m " + seconds + " s ";

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("tiempo_restante").innerHTML = "Tiempo Completado";
    }
  }, 1000);
}
