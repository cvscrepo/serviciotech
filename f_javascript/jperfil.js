
//-----------------ARTICULO-------------------------

function ingresar_datos_articulo(){

 var form= $("#camar").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valarticulo.php',form,  
    function(data){
      alert(data);  
                $("#umed").val('');
                $("#desc").val('');
    }

  );
}


//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){

});
