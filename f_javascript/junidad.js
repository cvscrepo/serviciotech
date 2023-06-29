//-------------------TIPO SERVICIO-----------------------

function ingresar_datos_unidad_negocio(){

 var form= $("#camar").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valunidadnegocio.php',form,  
    function(data){
      alert(data);  
                $("#unid").val('');
                $("#desc").val('');
                location.reload(true);
    }

  );
    
}

function ver_unidad_negocio(){
$("#table_container").load("../epages/select_pages/frm_con_unidad_negocio.php",function(){
       $(this).fadeIn("medium");
       $('#tunidad_table').DataTable();

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
    ver_unidad_negocio();
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
