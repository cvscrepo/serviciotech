
function ver_tabla(){
  $("#tabla_reporte").unload();
  $("#tabla_reporte").load("../epages/select_pages/frm_con_prog.php",function(){
   $(this).fadeIn("medium");
   $('#table_cot').DataTable({
    ordering: true,
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
