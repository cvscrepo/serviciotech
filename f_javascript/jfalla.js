//----------------- Solicitud de Servicio----------------
function ingresar_datos_servicio(){

 var form= $("#csoli").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valsolicitudf1.php',form,  
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


//-------------------TIPO SERVICIO-----------------------

function ingresar_datos_tipo_servicio(){

 var form= $("#camar").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valfalla.php',form,  
    function(data){
      alert(data);  
                $("#serv").val('');
                $("#desc").val('');
                location.reload(true);
    }

  );
    
}

function ver_tipo_servicio(){
$("#table_container").load("../epages/select_pages/frm_con_falla.php",function(){
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
