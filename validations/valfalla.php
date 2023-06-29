<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$serv=$_POST['serv'];
$desc=$_POST['desc'];
//Condicion para validar que contraseña y confirmar contraseña del formulario sean iguales
$array[0] = "'$serv','$desc'";
$campos="nombre,descripcion";
$tabla="falla";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Falla Ingresado Exitosamente.');
$con->desconectar();
?>