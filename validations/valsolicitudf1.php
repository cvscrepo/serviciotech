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
$clie=$_POST['clie'];
$nit=$_POST['nit'];
$ciud=$_POST['ciud'];
$fech=$_POST['fech'];
$codk=$_POST['codk'];
$tser=$_POST['tser'];
$uneg=$_POST['uneg'];
$desc=$_POST['desc'];
$fecha=date('Y-m-d');
$hora=date('h:i');
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
//$array[0] = "'$vced','$clie','$nit','$ciud','$fecha','$hora','$fecha','$codk','$tser','$uneg','$desc'";
$valores=$vced.','."'$clie'".','."'$nit'".','.$ciud.','."'$fecha'".','."'$hora'".','."'$fecha'".','."'$codk'".','.$tser.','.$uneg.','."'$desc'";
$campos='usuario,cliente,nit,ciudad,fecha_solicitud,hora_solicitud,fecha,cod_kronos,tipo_servicio,unidad_negocio,descripcion';
//`usuario`,`cliente`,`nit`,`ciudad`,`fecha_solicitud`,`hora_solicitud`,`fecha`,`cod_kronos`,`tipo_servicio`,`unidad_negocio`,`descripcion`
$tabla="ssoporte";
$crud->insertar($valores,$campos,$tabla,$con->getConnection(),'Solicitud Ingresada Exitosamente.');
$con->desconectar();
?>