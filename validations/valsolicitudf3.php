<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$vced=$_SESSION['documento'];
$vced= str_replace(".", "", $vced); 
$vced= str_replace("€", "", $vced);
$vced= str_replace(" ", "", $vced);
$vced= str_replace(",00", "", $vced);
$fech=$_POST['fech'];
$fecha=date('Y-m-d');
$hora=date('h:i');
$fecha=$fecha." ".$hora;
$falla=$_POST['falla'];
$comen=$_POST['come'];
$terminado=$_POST['terminado1'];

if($terminado==1){
	$programar=0;
	?>
           <?php
}
else
{
	$programar=$_POST['programar1'];
	if($programar!=1){
		$programar=0;
	}
	?>
	           <?php
	           
}
$idsol=$_POST['idsol'];
$desc=$_POST['come'];
$cotizar=$_POST['cotizar'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
$array = "'$idsol','$fech','$fecha','$falla','$terminado','$programar','$cotizar','$desc'";
$campos="id_solicitud,fecha_atencion,fecha,falla,atendido,reprogramar,cotizar,observaciones";
$tabla="reporte_tecnico";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'');
$crud->update("update solicitud_detalle set atendido=1,reprogramar='$programar' 
	           where solicitud_detalle.solicitud='$idsol'","Reporte Ingresado Exitosamente. ",$con->getConnection());
$con->desconectar();



?>