//----------------- Solicitud de Servicio----------------
function ingresar_datos_servicio_2(){

 var form= $("#csoli").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valsolicitudf2.php',form,  
    function(data){
      alert(data);  
                // $("#area").val('');
                // $("#user").val('');
                // $("#ced").val('');
                // $("#clie").val('');
                // $("#nit").val('');
                // $("#ciud").val('');
                // $("#fech").val('');
                // $("#codk").val('');
                // $("#tser").val('');
                // $("#uneg").val('');
                // $("#desc").val('');
                //location.reload(true);
    }

  );
    
}

function formulario2(id,ciudad,cliente,solicitud,fecha,descripcion,servicio){
  $("#cas1").fadeOut();
  $("#cargando").fadeIn();
  $("#cargando").fadeOut();
  $("#cas2").fadeIn(4000);
  $("#form2").fadeIn()
  $("#solici").val(id);
  // alert(fecha);
  // alert(solicitud);
  $("#csol").text("Solicitud N° - "+id);
  $("#clie").val(cliente);
  $("#soli").val(solicitud);
  $("#fecha").val(fecha);
  $("#ciu").val(ciudad);
  $("#desc").val(descripcion);
  $("#tser").val(servicio);
}


function atendido(){
  alert("Este servicio ya fue atendido.");
}


function ver_tabla(){
  $("#tabla_reporte").unload();
  $("#tabla_reporte").load("../epages/select_pages/frm_con_sop.php",function(){
   $(this).fadeIn("medium");
   $('#table_cot').DataTable({
    "order": [[ 4, "desc" ]],
    // scrollY: 350
    "language": {

    "sProcessing":     "Procesando...",

    "sLengthMenu":     "Mostrar _MENU_ registros",

    "sZeroRecords":    "No se encontraron resultados",

    "sEmptyTable":     "Ningún dato disponible en esta tabla",

    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",

    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

    "sInfoPostFix":    "",

    "sSearch":         "Buscar:",

    "sUrl":            "",

    "sInfoThousands":  ",",

    "sLoadingRecords": "Cargando...",

    "oPaginate": {

        "sFirst":    "Primero",

        "sLast":     "Último",

        "sNext":     "Siguiente",

        "sPrevious": "Anterior"

    }

  }
 });


 });


}

//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
ver_tabla();
});
