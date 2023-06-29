//----------------- Solicitud de Servicio----------------
function activar_ingreso_datos(){
  $("#swRegistro").val(0);
}

function ingresar_datos_servicio(){
 
   if ( ($("#area").val()=='' || $("#area").val()==null ) || ($("#user").val()=='' || $("#user").val()==null ) || 
        ($("#ced").val()=='' || $("#ced").val()==null ) || ($("#clie").val()=='' || $("#clie").val()==null ) ||
        ($("#nit").val()=='' || $("#nit").val()==null ) || ($("#ciud").val()=='0' || $("#ciud").val()==null ) ||
        ($("#tser").val()=='0' || $("#tser").val()==null ) || ($("#uneg").val()=='0' || $("#uneg").val()==null ) ||
        ($("#desc").val()=='' || $("#desc").val()==null )

    ) {
    alert("FALTA INFORMACIÓN POR LLENAR, POR FAVOR COMPLETE TODOS LOS CAMPOS."+$("#swRegistro").val())
   } else {
    if($("#swRegistro").val()==0){ 
    if ($("#areaid").val()==5 && ($("#codk").val()=='' || $("#codk").val()==null ) ) {
      alert("Introduzca un codigo de KRONOS valido.")
    } else
    {
    $("#swRegistro").val(1);
     var form= $("#csoli").serialize();
     $("#btnreg").prop("disabled",true);
     $("#btnreg").attr("disabled",true);
     $.post('../validations/valsolicitudf1.php',form,  
      function(data){
      alert(data);  
      });
    }
   }
   else 
  {
    alert("Ya se realizó el registro, por favor PRESIONE botón LIMPIAR para ingresar un registro nuevo");
  }
  } 
  

    
//}
}


//-------------------TIPO SERVICIO-----------------------

function ingresar_datos_tipo_servicio(){

 var form= $("#camar").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valservicio.php',form,  
    function(data){
      alert(data);  
                $("#serv").val('');
                $("#tiem").val('');
                $("#desc").val('');
                location.reload(true);
    }

  );
    
}

function ver_tipo_servicio(){
$("#table_container").load("../epages/select_pages/frm_con_servicio.php",function(){
       $(this).fadeIn("medium");
       $('#tservicio_table').DataTable();

 }

 );}


//GENERAL

function responsive1(){
  $("#table_container").fadeOut();
  $("#gridtable").fadeOut();
  $("#gform").removeClass();
}

function responsive2(){ 
  $("#gform").fadeOut();
  $("#gridtable").fadeIn();
  $("#gridtable").removeClass();
}


//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
  if($("#form_view").val()==1){
    ver_unimed();
  }
  else if($("#form_view").val()==2)
  {
    ver_tipo_servicio();
  }
  else if($("#form_view").val()==3)
  {
    ver_cate();
  }
  else if($("#form_view").val()==4)
  {
    ver_articulos();
  }
  else if($("#form_view").val()==5)
  {
    ver_tipo();
  }
});
