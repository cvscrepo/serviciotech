<?php
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
?>

    <style>
      .sinpadding [class*="col-"] {
    padding: 0;
}
   </style>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
        Solictud
        <small>Crear Solicitud</small>
      </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-users"></i> Servicios</a></li>
                <li class="active">Solicitud F1</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading" align="center"><b>Registro Solicitud N° - 1</b></div>
                    <div class="form-box" style="overflow:auto;">
                        <form id="csoli" name="csoli" enctype="multipart/form-data" method="post">
                            <div class="body bg-gray">
                                <div class="sinpadding">
                                <div class="col-xs-12 col-md-4" align="center">
                                <label>Area</label>
                                <input type="text" id="area" name="area" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" value="<?php echo $_SESSION['area']  ?>" readonly required>
                                <input type="hidden" name="areaid" id="areaid" value="<?php echo $_SESSION['areaid']  ?>">
                                </div>
                                <div class="col-xs-12 col-md-4" align="center">
                                <label align="center">Usuario</label>
                                <input type="text" name="user" id="user" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" value="<?php echo $_SESSION['nombre_completo']  ?>" readonly required >
                                </div>
                                <div class="col-xs-12 col-md-4" align="center">
                                <label align="center">Documento</label>
                                <input type="text" id="ced" name="ced" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" value="<?php echo $vced  ?>" readonly required >
                                </div>
                                </div>
                                <br>
                                <!-- -->
                                <div class="sinpadding">
                                <div class="col-xs-12 col-md-6" align="center">
                                <label align="center">Cliente</label>
                                <input type="text" name="clie" id="clie" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" required >
                                </div>
                                <div class="col-xs-6 col-md-3" align="center">
                                <label>NIT / # ABONADO</label>
                                <input type="text" id="nit" name="nit" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" required>
                                </div>
                                <div class="col-xs-6 col-md-3" align="center">
                                <label align="center">Ciudad</label>
                                <select id="ciud" name="ciud" class="form-control" data-actions-box="true" style="width:100%;background:white;border:#367fa9 1px solid" required>
                                  <option value="0" selected>Seleccione Ciudad</option>
                                <?php
                                  $con_1 = new Connection($server,$user,$password,$dbname);
                                  $con_1->conectar();
                                  $crud10 = new Crud();
                                  $crud10->setconsulta("SELECT padre, nombre,codigo
                                  FROM ubicaciones where activo=1 order by nombre");
                                  $datos_usuario_10 =  $crud10->seleccionar($con_1->getConnection());
                                  $i=0;
                                  while($i<sizeof($datos_usuario_10))
                                  {
                                    ?>
                                    <option  value="<?php echo $datos_usuario_10[$i]['codigo'] ?>"><?php echo $datos_usuario_10[$i]['nombre']?></option>
                                    <?php

                                    $i++;
                                  }
                                 
                                  $con_1->desconectar();
                                  ?> 
                                </select>
                                </div>
                                </div>
                                <br>
                                <!-- -->
                                <div class="sinpadding">
                                <div class="col-xs-4 col-md-3" align="center">
                                <label>Fecha</label>
                                <input type="input" id="fech" name="fech" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" value="<?php echo date('d/m/Y') ?>" align="center" readonly required>
                                </div> 
                                <div class="col-xs-8 col-md-9" >
                                <label align="center">Cod. Kronos</label>
                                <input type="text" name="codk" id="codk" class="form-control" style="width:60%;background:white;border:#367fa9 1px solid" required >
                                </div>
                                </div>
                                <!--  -->
                                <div class="sinpadding">
                                 <div class="col-xs-6 col-md-6" align="center">
                                <label align="center">Tipo Servicio</label>
                                <select id="tser" name="tser" class="form-control" data-actions-box="true" style="width:70%;background:white;border:#367fa9 1px solid" required>
                                  <option value="0" selected>Seleccione T. Servicio</option>
                                <?php
                                  $con_1 = new Connection($server,$user,$password,$dbname);
                                  $con_1->conectar();
                                  $crud10 = new Crud();
                                  $crud10->setconsulta("SELECT id, nombre
                                  FROM tipo_servicio order by nombre");
                                  $datos_usuario_10 =  $crud10->seleccionar($con_1->getConnection());
                                  $i=0;
                                  while($i<sizeof($datos_usuario_10))
                                  {
                                    ?>
                                    <option  value="<?php echo $datos_usuario_10[$i]['id'] ?>"><?php echo $datos_usuario_10[$i]['nombre']?></option>
                                    <?php

                                    $i++;
                                  }
                                 
                                  $con_1->desconectar();
                                  ?> 
                                </select>
                                </div>
                                <div class="col-xs-6 col-md-6" align="center">
                                <label align="center">Unidad Negocio</label>
                                <select id="uneg" name="uneg" class="form-control" data-actions-box="true" style="width:70%;background:white;border:#367fa9 1px solid" required>
                                  <option value="0" selected>Seleccione U. Negocio</option>
                                <?php
                                  $con_1 = new Connection($server,$user,$password,$dbname);
                                  $con_1->conectar();
                                  $crud10 = new Crud();
                                  $crud10->setconsulta("SELECT id, nombre
                                  FROM unidad_negocio order by nombre");
                                  $datos_usuario_10 =  $crud10->seleccionar($con_1->getConnection());
                                  $i=0;
                                  while($i<sizeof($datos_usuario_10))
                                  {
                                    ?>
                                    <option  value="<?php echo $datos_usuario_10[$i]['id'] ?>"><?php echo $datos_usuario_10[$i]['nombre']?></option>
                                    <?php
                                    $i++;
                                  }
                                
                                  $con_1->desconectar();
                                  ?> 
                                </select>
                                </div>
                                </div>
                                <div class="sinpadding">
                                <div class="col-xs-12 col-md-12" align="center">
                                  <label>Descripción</label><br>
                                <textarea id="desc" name="desc" rows="2" class="form-control" cols="50" placeholder="Describa la solicitud a detalle" required></textarea>
                                </div>
                                </div>
                                <!--  -->
                                <div align="center" style="margin-top:">
                                    <input type="hidden" name="swRegistro" id="swRegistro" value="0">
                                    <input type="button" onclick="javascript:ingresar_datos_servicio()" class="btn btn-primary btn-sm " value="Registrar">
                                    <input type="reset"  onclick="javascript:activar_ingreso_datos()" class="btn btn-primary btn-sm " value="Limpiar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>