function ingresar_datos(){

 var form= $("#cuser").serialize();

  //$.post('../_admin/programar.php',form,
    $.post('../validations/valusu.php',form,  
		function(data){
			alert(data);	
                // $("#nom").val('');
                // $("#ape").val('');
                // $("#ced").val('');
                // $("#tel").val('');
                // $("#ema").val('');
                // $("#nac").val('');
                // $("#ced").val('');
                // $("#usu").val('');
                // $("#pass").val('');
                // $("#pass2").val('');
		}

	);
}

function ver_clientes(){
$("#table_container").load("../epages/select_pages/frm_con_rol_usuario.php",function(){
     $(this).fadeIn("medium");
       $('#trol_table').DataTable();

 }

 );}


//cuerpo del jquery, aqí se llaman todas las funciones y procedimientos
$(document).ready(function(){
ver_clientes();
//alert("HOLA");
});
