 <?php
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
?>
  <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Usuarios
        <small>Crear Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
        <li class="active">R. Usuario</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="panel-group">
    <div class="panel panel-primary">
    <div class="panel-heading" align="center"><b>Registro Usuario</b></div>
     <div class="form-box" style="overflow:auto;">
      <form id="cuser" name="cuser"  enctype="multipart/form-data" method="post">       
        <div class="body bg-gray">
          Nombre(s):
          <input type="text" id="nom" name="nom" class="form-control" placeholder="(Nombres)" required autofocus required>
          Apellidos:
          <input type="text" name="ape" id="ape" class="form-control" placeholder="(Apellidos)" required autofocus required >
          Cedula:
          <input type="text" id="ced" name="ced" class="form-control" placeholder="(C. Identidad)" required autofocus required >
          Telefono:
          <input type="text" name="tel" id="tel" class="form-control" placeholder="(Telefono)" required autofocus required >
          Correo Electronico:
          <input type="text" name="ema" id="ema" class="form-control" placeholder="(Email)" required autofocus required >
          Fecha Nacimiento:
          <input type="text" name="nac" id="nac" class="form-control" placeholder="(dd/mm/aaaa)" required autofocus required >
          Usuario (Ingreso):
          <input type="text" name="usu" id="usu" class="form-control" placeholder="(Usuario)" required autofocus required >
          Contraseña(Ingreso):
          <input type="password" name="pass" id="pass" class="form-control" placeholder="(Contraseña)" required autofocus required >
          Confirmar Contraseña:
          <input type="password" name="pass2" id="pass2" class="form-control" placeholder="" required autofocus required >
          Área Usuario:<br>
          <select id="area" name="area" class="form-control" data-actions-box="true">
            <option selected>Seleccione Área Usuario</option>
          <?php
            $con_1 = new Connection($server,$user,$password,$dbname);
            $con_1->conectar();
            $crud10 = new Crud();
            $crud10->setconsulta("SELECT id, nombre
            FROM area_laboral;");
            $datos_usuario_10 =  $crud10->seleccionar($con_1->getConnection());
            $i=0;
            while($i<sizeof($datos_usuario_10))
            {
              ?>
              <option  value="<?php echo $datos_usuario_10[$i]['id'] ?>"><?php echo $datos_usuario_10[$i]['nombre']?></option>
              <?php

              $i++;
            }
                                  // $cod_dpto=$datos_usuario_10[$i]['departamento_id'];
            $con_1->desconectar();
            ?> 
          </select>
          <!--Tipo Usuario:<br>
          <select class="form-control" data-actions-box="true">
          <option selected>Seleccione Tipo Usuario</option>
          <option value="1">Administrador</option>
          <option value="2">Cotizaciones</option>
          <option value="3">Tecnico</option>
          </select>-->
          <br>
          <div align="center">
          <input type="button" onclick="javascript:ingresar_datos()" class="btn bg-blue " value="Registrar">
          <input type="button" class="btn bg-blue " value="Limpiar">
          <div>
        </div>
       </form>
      </div>
     </div>
   </div>
  </section>
  </div>