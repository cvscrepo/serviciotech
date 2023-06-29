   <?php
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$vced=$_SESSION['documento'];
$vced= str_replace(".", "", $vced); 
$vced= str_replace("€", "", $vced);
$vced= str_replace(" ", "", $vced);
$vced= str_replace(",00", "", $vced);
   ?>
    <style>
      .sinpadding [class*="col-"] {
    padding: 0;
    }

    .sinborde {
    border: 0;
    }

    .linealabel {
    display: block;
    text-align: center;
    line-height: 150%;
}
    </style>
    <script type="text/javascript">
      function cerrar_servicio(){
if(confirm("Desea cerrar el servicio?")){
    alert("Servicio cerrado, no se podrán hacer cambios a menos que el cliente final lo solicite.");
    location.reload();
   }
}
    </script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Servicios Seguridad Electronica.
        <small>Reporte Técnico</small>
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calculator"></i> Servicios</a></li>
            <li class="active">R. Técnico</li>
        </ol>
    </section>
    <section class="content">
<div id='cargando' style='display:none' class="col-md-12" align="center" >
  <img src="../images/ajax-loader.gif" ><h4>Cargando página ...</h4>
</div>
      <!-- AQUI COMIENZA LA TABLA -->
        <div id="cas1" name="cas1" style="">
            <div class="row">
                <div class="col-md-12" style="margin-left: 15px;margin-top: 15px;">
                    <form id="buscar" name="buscar">
                        <div class="row">
                            <div class="col-lg-2 col-xs-6">
                                <label style="color:#1c5a99"> Cliente: </label>
                                <input type="text" class="form-control" id="cue" name="cue" style="background:#FFFFFF;">
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <label> Filtrar Desde:</label>
                                <input type="text" class="form-control" id="fds" name="fds" style="background:#FFFFFF;" readonly>

                            </div>

                            <div class="col-lg-2 col-xs-6">
                                <label> Hasta:</label>
                                <input type="text" class="form-control" id="fhs" name="fhs" style="background:#FFFFFF;" required readonly>

                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <input type="button" class="btn btn-primary btn-bg" value="Ir" onclick="javascript:buscar_cue_por_fecha()">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12" style="margin-left: 0px;margin-top: 15px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Información General - Reporte Tecnico </div>
                        <div class="panel-body">
                            <div id="tabla_reporte">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- AQUI TERMINA LA TABLA -->

        <!-- AQUI COMIENZA EL FORMULARIO 2 -->
        <div id="cas2" name="cas2" style="display:none">
         <div class="col-md-12" style="margin-left: 0px;margin-top: 15px;">
            <div class="panel panel-primary">
                <div class="panel-heading"><label id="csol" name="csol">SOLICITUD N° - </label></div>
                  <div class="panel-body">
                      <div class="sinpadding">
                        <div class="row">
                        <div class="col-md-4 col-xs-5">
                        <label class="linealabel" style="color:#58ACFA">F. SOLICITUD</label><input id="fsol" name="fsol" type="text" style="text-align:center" class="form-control sinborde" value="30/03/2020" >
                        </div>
                        <div class="col-md-4 col-xs-7" style="color:#58ACFA">
                        <label class="linealabel">ÁREA</label><input id="area" name="area" type="text" style="text-align:center" class="form-control sinborde" value='Seguridad Electronica'>
                        </div>
                        <div class="col-md-4 col-xs-5" style="color:#58ACFA">
                        <label class="linealabel">SOLICITANTE</label><input id="soli" name="soli" type="text" style="text-align:center" class="form-control sinborde" value="Domingo Madera">
                        </div>
                        <div class="col-md-4 col-xs-7" style="color:#58ACFA">
                        <label class="linealabel">T. SERVICIO</label><input id="tip" name="tip" type="text" style="text-align:center" class="form-control sinborde" value="Reparación">
                        </div>
                        <div class="col-md-4 col-xs-5">
                        <label class="linealabel" style="color:#58ACFA">CLIENTE</label><input id="clie" name="clie" type="text" style="text-align:center" class="form-control sinborde" value="SEMPERTEX" >
                        </div>
                        <div class="col-md-4 col-xs-7" style="color:#58ACFA">
                        <label class="linealabel">CIUDAD</label><input id="ciu" name="ciu" type="text" style="text-align:center" class="form-control sinborde" value="Barranquilla">
                        </div>
                        <div class="col-md-4 col-xs-5" style="color:#58ACFA">
                        <label class="linealabel">ASIGNANTE</label><input id="asig" name="asig" type="text" style="text-align:center" class="form-control sinborde" value="Edgardo Arteta Palacin">
                        </div>
                        <div class="col-md-4 col-xs-7" style="color:#58ACFA">
                        <label class="linealabel">FECHA ASIGNADA</label><input id="fasi" name="fasi" type="text" style="text-align:center" class="form-control sinborde" value="31/03/2020" >
                        </div>
                         <div class="col-md-4 col-xs-12" style="color:#58ACFA">
                        <label class="linealabel">U. NEGOCIO</label><input id="uneg" name="uneg" type="text" style="text-align:center" class="form-control sinborde" value="Monitoreo y Alarmas">
                        </div>
                        <br>

                      <div class="col-md-4 col-xs-5">
                        <label class="linealabel" style="color:#58ACFA">TÉCNICO</label><input id="tecn" name="tecn" type="text" style="text-align:center" class="form-control sinborde" value="Ismael Díaz Peralta" >
                        </div>
                        <div class="col-md-4 col-xs-7" style="color:#58ACFA">
                        <label class="linealabel">F. ASISTENCIA</label><input id="ffas" name="ffas" type="text" style="text-align:center" class="form-control sinborde" value="31/03/2020">
                        </div>
                        <div class="col-md-4 col-xs-5" style="color:#58ACFA">
                        <label class="linealabel">FALLO</label><input id="fallo" name="fallo" type="text" style="text-align:center" class="form-control sinborde" value="Corto Circuito">
                        </div>
                        <div class="col-md-4 col-xs-7" style="color:#58ACFA">
                        <label class="linealabel">SOLUCIONADO</label><input id="solu" name="solu" type="text" style="text-align:center" class="form-control sinborde" value="NO" >
                        </div>
                         <div class="col-md-4 col-xs-5" style="color:#58ACFA">
                        <label class="linealabel">REPROGRAMAR</label><input id="repr" name="repr" type="text" style="text-align:center" class="form-control sinborde" value="SÍ">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-7" style="color:#58ACFA">
                        <label class="linealabel">COTIZAR</label><input id="coti" name="coti" type="text" style="text-align:center" class="form-control sinborde" value="SÍ">
                        </div>
                        <div class="col-md-12 col-xs-12" style="color:#58ACFA">
                        <label class="linealabel">DESCRIPCIÓN</label><textarea id="desc" name="desc" class="form-control"
                        placeholder=""></textarea>
                        <input type="hidden" name="idrep" id="idrep" value="0">
                        </div>
                      </div>

                      </div>  
                  </div>
                                <div align="center" style="margin-top:">
                                    <input type="button" onclick="javascript:cerrar_servicio()" class="btn btn-primary btn-sm " value="Cerrar Servicio">
                                    <input type="button" onclick="javascript:formulario3()" class="btn btn-primary btn-sm " value="Reprogramar">
                                    <input type="button" class="btn btn-primary btn-sm " value="Cotizar" disabled>
                                </div>

                </div>
            </div>
          </div>
      

        <!-- AQUI TERMINA EL FORMULARIO 2 -->


<!-- AQUI COMIENZA EL FORMULARIO 3 -->
<div id="cas3" name="cas3" style="display:none">
         <div class="col-md-12" style="margin-left: 0px;margin-top: 15px;">
            <div class="panel panel-primary">
                <div class="panel-heading"><label id="csol" name="csol">SOLICITUD N° - </label></div>
                  <div class="panel-body">
                  <div class="col-xs-12 col-md-12 sinpadding" align="center">
                  <h4><label style="color:#367fa9">Registrar Técnico</label></h4>
                  </div>
                  <form id="casig" name="casig" enctype="multipart/form-data" method="post">
                                <div class="sinpadding">
                                <div class="col-xs-12 col-md-4" align="center">
                                <label>Area</label>
                                <input type="text" id="arear" name="arear" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" value="<?php echo $_SESSION['area']  ?>" readonly required>
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
                                <label align="center">Técnico</label>
                                <select id="tser" name="tser" onchange="javascript:asignartec(this.value)" class="form-control" data-actions-box="true" style="width:100%;background:white;border:#367fa9 1px solid" required>
                                  <option selected>Seleccione Técnico</option>
                                  <?php
                                   $con_1 = new Connection($server,$user,$password,$dbname);
                                  $con_1->conectar();
                                  $crud10 = new Crud();
                                  $crud10->setconsulta("SELECT usuario.id,nombres,apellidos,cedula
                                  FROM usuario_detalle 
                                  inner join 
                                  usuario on usuario.id = usuario_detalle.usuario_log
                                  where usuario.rol=3 order by nombres");
                                  $datos_usuario_10 =  $crud10->seleccionar($con_1->getConnection());
                                  $i=0;
                                  while($i<sizeof($datos_usuario_10))
                                  {
                                    ?>
                                    <option  value="<?php echo $datos_usuario_10[$i]['cedula'] ?>"><?php echo $datos_usuario_10[$i]['apellidos'].' '.$datos_usuario_10[$i]['nombres'] ?></option>
                                    <?php

                                    $i++;
                                  }
                                 
                                  $con_1->desconectar();

                                  ?>
                                </select>
                                </div>
                                <div class="col-xs-6 col-md-3" align="center">
                                <label>Doc. Técnico</label>
                                <input type="text" id="nit" name="nit" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" required>
                                </div>
                                <div class="col-xs-6 col-md-3" align="center">
                                <label align="center">Fecha de Asignación</label>
                                <input type="date" id="fech" name="fech" class="form-control" min="<?php echo date('Y-m-d')?>" style="width:100%;background:white;border:#367fa9 1px solid" align="center" required>
                                </div>
                                </div>
                                <!--  -->
                                <div class="sinpadding">
                                 <div class="col-xs-6 col-md-6" align="center">
                                <label align="center">Tipo Servicio</label>
                                <select id="tsers" name="tsers" class="form-control" data-actions-box="true" style="width:70%;background:white;border:#367fa9 1px solid" disabled>
                                <option selected>Seleccione Tipo Servicio</option>
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
                                    <option  value="<?php echo $datos_usuario_10[$i]['id'] ?>" onclick="javascript:asignartec(this.value)"><?php echo $datos_usuario_10[$i]['nombre']?></option>
                                    <?php

                                    $i++;
                                  }
                                 
                                  $con_1->desconectar();

                                ?>
                                </select>
                                </div>
                                <div class="col-xs-6 col-md-6" align="center">
                                <label align="center">Unidad Negocio</label>
                                <select id="uneg" name="uneg" class="form-control" data-actions-box="true" style="width:70%;background:white;border:#367fa9 1px solid" disabled>
                                  <option selected>Seleccione U. Negocio</option>
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
                                <input type="hidden" id="selumed" name="selumed" value="">
                                <input type="hidden" id="solici" name="solici" value="">
                                </div>
                                </div>
                                <!--  -->
                                <div class="col-md-12 col-xs-12" style="color:#58ACFA">
                                <label class="linealabel"></label><textarea id="come" name="come" class="form-control"></textarea>
                                </div>
                                <div align="center" style="margin-top:">
                                    <input type="button" onclick="javascript:reprogramar_servicio()" class="btn btn-primary btn-sm " value="Registrar">
                                    <input type="reset" class="btn btn-primary btn-sm " value="Limpiar">
                                </div>
                        </form>
                </div>
            </div>
          </div>
        </div>
<!-- AQUI TERMINA EL FORMULARIO 3 -->




    </section>
</div>