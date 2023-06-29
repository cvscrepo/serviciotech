 <?php
//session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$vced=$_SESSION['documento'];
$vced= str_replace(".", "", $vced); 
$vced= str_replace("€", "", $vced);
$vced= str_replace(" ", "", $vced);
$vced= str_replace(",00", "", $vced);
$con_1 = new Connection($server,$user,$password,$dbname);
$con_1->conectar();
$crud10 = new Crud();
$crud10->setconsulta("select c_usuario.id,
usuario_detalle.nombres,
usuario_detalle.apellidos,
c_usuario.contrasena,
usuario_detalle.cedula,
usuario_detalle.nacimiento
from c_usuario
inner join usuario_detalle
on usuario_detalle.usuario_log=c_usuario.id
where usuario_detalle.cedula='$vced'");
$datos_usuario_10 =  $crud10->seleccionar($con_1->getConnection());
?>
 <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Perfil
        <small>Editar Perfil</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i>Perfil</a></li>
        <li class="active">Editar Perfil</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
    <div class="col-md-6 col-md-offset-3">
    <div class="panel-group">
    <div class="panel panel-primary">
    <div class="panel-heading" align="center"><b>Editar Perfil</b></div>
    <div class="body bg-gray">
     <div class="form-box" style="overflow:auto;">
      <form id="camar" name="camar"  enctype="multipart/form-data" method="post">      
            Nombre:
           <input type="text" name="nom" id="nom" class="form-control" placeholder="Ingresa Nombre" required   value=<?php echo $datos_usuario_10[0]['nombres'] ?>>
           Apellido
           <input type="text" name="ape" id="ape" class="form-control" placeholder="Ingresa Apellido" required  
           value=<?php echo $datos_usuario_10[0]['apellidos'] ?> >
           Documento
           <input type="text" name="doc" id="doc" class="form-control" placeholder="Ingresa Documento" value=<?php echo $datos_usuario_10[0]['cedula'] ?> required  >
           Sede
           <select name="und" id="und" class="form-control" ><option>Escoja Sede</option>
           <option value="1" selected="true">Barranquilla</option>
           <option value="2">Cartagena</option>
           <option value="3">Santa Marta</option>
           <option value="4">Valledupar</option>
           <option value="5">Riohacha</option>
           <option value="6">Sincelejo</option>
           <option value="7">Monteria</option>
           <option value="8">Bucaramanga</option>
           <option value="9">Bogotá</option>
          </select> 
            Fecha Nacimiento:
            <input type="text" id="nac" name="nac" placeholder="Fecha Nacimiento" class="form-control" value=<?php echo $datos_usuario_10[0]['nacimiento'] ?>>
           Contraseña
           <input type="password" name="pass" id="pass" class="form-control" placeholder="Ingresa Contraseña" required  value=<?php echo $datos_usuario_10[0]['contrasena'] ?> >
          Confirmar Contraseña
           <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Confirma Contraseña" required value=<?php echo $datos_usuario_10[0]['contrasena'] ?>>
            <br>
          <div id="gbut" align="center">
          <input type="button" onclick="javascript:ingresar_datos_articulo()" class="btn bg-blue " value="Registrar">
          <input type="button" class="btn bg-blue " value="Limpiar">
          </div>
   </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  </div>