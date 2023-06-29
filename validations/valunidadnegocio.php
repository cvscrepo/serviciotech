<?php
session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$unid=$_POST['unid'];
$desc=$_POST['desc'];
$array[0] = "'$unid','$desc'";
$campos="nombre,descripcion";
$tabla="unidad_negocio";
$crud->insertar($array,$campos,$tabla,$con->getConnection(),'Unidad de Negocio Ingresado Exitosamente.');
$con->desconectar();
?>