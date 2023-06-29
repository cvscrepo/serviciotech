<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$ced=$_POST['ced'];
$user=$_POST['usu'];
$pass=$_POST['pass'];
$cpass=$_POST['pass2'];
$nom=$_POST['nom'];
$ape=$_POST['ape'];
$tel=$_POST['tel'];
$ema=$_POST['ema'];
$nac=$_POST['nac'];
$area=$_POST['area'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
if($pass==$cpass){
$array[0] = "'$user','$pass',true,'i',2";
$campos="usuario, contrasena, estado, login, rol";
$tabla="c_usuario";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'');
$crud->setConsulta(
"SELECT c_usuario.id from c_usuario
  where usuario= '$user' and estado = 1 ");
  $datos1= $crud->seleccionar($con->getConnection());
//VERIFICA QUE LA INSERCIÓN FUE EXITOSA
        if($crud->getTuplas()>0)
        {
        	$login=$datos1[0]['id'];
        	//SE HACE LA SEGUNDA INSERCIÓN CON EL DETALLE DE LOS USUARIOS
        	$array[0] = "'$ape','$nom','$ced','$nac','1900-01-01','$login','$tel','$area','$ema'";
			$campos="apellidos, nombres, cedula, nacimiento, registro, usuario_log, 
       telefono, area_lab, email";
			$tabla="usuario_detalle";
			$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Usuario Ingresado Exitosamente.');

        }
       else
        {
         ?>
           <script type="text/javascript">
           alert('Error al insertar Usuario detalle');
           </script>
          <?php
}
$con->desconectar();
}
else
{
	echo "LAS CONTRASEÑAS NO COINCIDEN";
}
?>