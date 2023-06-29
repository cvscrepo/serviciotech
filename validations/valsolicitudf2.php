<?php
include ("../epages/validate.php"); 
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
$sol=$_POST['solici'];
$asig=$_POST['nit'];
$fech=$_POST['fech'];
$fecha=date('Y-m-d');
$hora=date('h:i');
$fecha=$fecha." ".$hora;
$comen=$_POST['come'];
$stipo=$_POST['stipo'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
$array = "'$vced','$sol','$asig','$fecha','$fech','$comen','$stipo'";
$campos="asignante,solicitud,asignado,fecha_hora_registro,fecha_asignado,comentarios,sub_tipo";
$tabla="solicitud_detalle";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'');
$crud->update("update ssoporte set asignado=1 where ssoporte.id='$sol'","Asignación Ingresada Exitosamente. ",$con->getConnection());
$con->desconectar();
?>