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

function formulario2(sop,fecsol,nomusu,apusu,arealab,tserv,sclie,cinom,asinom,asiape,fecasi,uninom,tecnom,tecape,fecate,fanom,atendido,reprogramar,cotizar,obs1,obs2,obs3){
  $("#cas1").fadeOut();
  $("#cargando").fadeIn();
  $("#cargando").fadeOut();
  $("#cas2").fadeIn(4000);
  $("#form2").fadeIn()
  $("#solici").val(sop);
  $("#idrep").val(sop);
  $("#csol").text("Solicitud N° - "+sop);
  $("#fsol").val(fecsol);
  $("#area").val(arealab);
  $("#soli").val(nomusu+' '+apusu);
  $("#tip").val(tserv);
  $("#clie").val(sclie);
  $("#ciu").val(cinom);
  $("#asig").val(asinom+' '+asiape)
  $("#fasi").val(fecasi);
  $("#uneg").val(uninom);
  $("#asi").val(tecnom+' '+tecape)
  $("#ffas").val(fecate);
  $("#fallo").val(fanom);
  if(atendido==0){
    $("#solu").val('NO');
  }else{
     $("#solu").val('SI');
  }
  if(cotizar==0){
    $("#coti").val('NO');
  }else{
     $("#coti").val('SI');
  }
  if(reprogramar==0){
    $("#repr").val('NO');
  }else{
     $("#repr").val('SI');
  }

  var descripcion = "1.SOLICITANTE: "+obs1+'\n'+'2.ASIGNANTE: '+obs2+'\n3.TECNICO: '+obs3;

  $("#desc").val(descripcion);
  //alert(atendido+' '+cotizar+' '+reprogramar);
  
}
function formulario3(){
  $("#cas2").fadeOut();
  $("#cargando").fadeIn();
  $("#cargando").fadeOut();
  $("#cas3").fadeIn(4000);
  $("#casig").fadeIn();
}

function reprogramar_servicio(){

 var form= $("#casig").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valsolicitudf2.php',form,  
    function(data){
      alert(data);  
                location.reload(true);
    }

  );
    
}

function asignartec(id){
  $("#nit").val(id);
}


function ver_tabla(){
  $("#tabla_reporte").unload();
  $("#tabla_reporte").load("../epages/select_pages/frm_con_sol2.php",function(){
   $(this).fadeIn("medium");
   $('#table_cot').DataTable({
    ordering: false,
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


function generar_pdf(id)
{
var idr=id.replace("BQ-COT-","");
alert(idr);
}

function aprueba_cotizacion(id)
{
 if( confirm('Desea Aprobar la Cotización: BQ-COT-'+id) )
 { 

    $.post('../validations/EstadoComprobante.php?acc='+1+'&idcot='+id,  
      function(data){
       alert(data); 
       if($.trim(data) =='Cotización Aprobada con exito')
       { 
       }
     });
  ver_tabla();
}
}

function rechaza_cotizacion(id)
{
 if( confirm('Desea Rechazar la Cotización: BQ-COT-'+id) )
 { 

    $.post('../validations/EstadoComprobante.php?acc='+2+'&idcot='+id,  
      function(data){
       alert(data); 
       if($.trim(data) =='Cotización Rechazada con exito')
       { 
       }
     });
 ver_tabla();
}
}

//950815Hb.*.**

// function mostrar_editar(id,num,terid,terno,conc,venid,venno,clp,cont,ciud){
  function mostrar_editar(id){
  $("#cas1").fadeOut();
  if (confirm("Desea editar la cotizacion: "+id+"?")) {
  ver_tabla_cot(id);
  $("#cas3").fadeIn(); 
  //alert($("#tauxterid"+id).val());
  $("#nocom").val($("#tauxnum"+id).val());
  $("#ater").val($("#tauxterid"+id).val());
  $("#nit").val($("#tauxterno"+id).val());
  $("#pcd").val($("#tauxconc"+id).val());
  $("#nven").val($("#tauxvenid"+id).val());
  $("#ven").val($("#tauxvenno"+id).val());
  $("#dir").val($("#tauxclp"+id).val());
  $("#con").val($("#tauxcont"+id).val());
  $("#ciu").val($("#tauxciud"+id).val());
  $("#nocom").prop("readonly",true);
  $("#ater").prop("readonly",true);
  $("#nit").prop("readonly",true);
  $("#nven").prop("readonly",true);
  $("#ven").prop("readonly",true);
  $("#dir").prop("readonly",true);
  $("#con").prop("readonly",true);
  $("#ciu").prop("readonly",true);
  $("#nedit").val(id);
  }
  else
  {
  $("#cas1").fadeIn();
  }
}




function ver_concot(){
$("#cas3").fadeOut();
  if (confirm("Desea descartar los cambios?")) {
  $("#cas1").fadeIn(); 
  ver_tabla();
  }
  else
  {
  $("#cas3").fadeIn();
  }
}



function ver_tabla_cot(id){
  $("#prueba_comprobante_editar").load("../epages/body_pages/tab_cotizacion_edit.php?coti="+id,function(){
   $(this).fadeIn("medium");
   $('#table_id').DataTable({
    ordering: false,
    // scrollY: 350
    "bLengthChange": false,
    "paging":   false,
    "info":     false,
    "filter": false
  });
 });
  suma_total();
}



//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
ver_tabla();
});
