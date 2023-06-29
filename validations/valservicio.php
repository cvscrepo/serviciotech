<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$serv=$_POST['serv'];
$tiempo=$_POST['tiem'];
$desc=$_POST['desc'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
$array[0] = "'$serv','$tiempo','$desc'";
$campos="nombre,tiempo, descripcion";
$tabla="tipo_servicio";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Tipo Servicio Ingresado Exitosamente.');
$con->desconectar();
?>