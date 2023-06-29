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

<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Servicios Seguridad Electronica.
        <small>Formato S. F3</small>
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calculator"></i> Cotizaciones</a></li>
            <li class="active">C. Cotización</li>
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
                                </br>
                                <input type="button" class="btn btn-primary btn-bg" value="Ir" onclick="javascript:buscar_cue_por_fecha()">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12" style="margin-left: 0px;margin-top: 15px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Información General - Servicios PROGRAMADOS</div>
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
                        <div class="col-md-3 col-xs-5">
                        <label class="linealabel" style="color:#58ACFA">CIUDAD</label><input id="ciud" name="ciud" type="text" style="text-align:center" class="form-control sinborde" value="Barranquilla">
                        </div>
                        <div class="col-md-3 col-xs-7" style="color:#58ACFA">
                        <label class="linealabel">CLIENTE</label><input id="clie" name="clie" type="text" style="text-align:center" class="form-control sinborde" value="Colviseg">
                        </div>
                        <div class="col-md-3 col-xs-5" style="color:#58ACFA">
                        <label class="linealabel">SOLICITANTE</label><input id="soli" name="soli" type="text" style="text-align:center" class="form-control sinborde" value="Danilo">
                        </div>
                        <div class="col-md-3 col-xs-7" style="color:#58ACFA">
                        <label class="linealabel">FECHA ASIGNADA</label><input id="fecha" name="fecha" type="text" style="text-align:center" class="form-control sinborde" value="01/27/2020">
                        </div>
                        <div class="col-md-12 col-xs-12" style="color:#58ACFA">
                        <label class="linealabel">DESCRIPCIÓN</label><textarea id="desc" name="desc" class="form-control"></textarea>
                        </div>
                         <div class="col-md-12 col-xs-12" align="center" style="color:#58ACFA">
                        <input type="button" onclick="javascript:formulario3()" class="btn btn-primary btn-sm " value="Registrar Servicio">
                        <input type="reset" onclick="javascript:volver1()" class="btn btn-primary btn-sm " value="Volver">
                        </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>




 <div id="cas3" name="cas3" style="display:none">
         <div class="col-md-12" style="margin-left: 0px;margin-top: 15px;">
            <div class="panel panel-primary">
                <div class="panel-heading"><label id="csol" name="csol">SOLICITUD N° - </label></div>
                  <div class="panel-body">
                      <div class="sinpadding">
                        <div class="row">
                  <div class="col-xs-12 col-md-12 sinpadding" align="center">
                  <h4><label style="color:#367fa9">Registrar Servicio</label></h4>
                  </div>
                  <form id="csoli" name="csoli" enctype="multipart/form-data" method="post">
                                <div class="sinpadding">
                                <div class="col-xs-12 col-md-4" align="center">
                                <label>Area</label>
                                <input type="text" id="area" name="area" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" value="<?php echo $_SESSION['area']  ?>" readonly required>
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
                                <div class="col-xs-12 col-md-4" align="center">
                                <label align="center">Tipo:</label>
                                <select class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" disabled="true"></select>
                                </div>
                                <div class="col-xs-12 col-md-4" align="center">
                                <label>Falla</label>
                                <select class="form-control" id="falla" name="falla" style="width:100%;background:white;border:#367fa9 1px solid">
                                <option selected>Seleccione Falla</option>
                                <?php
                                  $con_1 = new Connection($server,$user,$password,$dbname);
                                  $con_1->conectar();
                                  $crud10 = new Crud();
                                  $crud10->setconsulta("SELECT id, nombre
                                  FROM falla order by nombre");
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
                                <div class="col-xs-12 col-md-4" align="center">
                                <label align="center">Fecha de Asistencia</label>
                                <input type="date" id="fech" name="fech" class="form-control" style="width:100%;background:white;border:#367fa9 1px solid" align="center" required>
                                </div>
                                </div>
                                <!--    -->
                                <div class="sinpadding">
                                <div class="col-xs-12 col-md-4" align="center">
                                    <label>Servicio Terminado</label>
                                   <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="form-check">
                                        <div class="col-xs-6 col-md-6" align="center">
                                        <input class="form-check-input" type="radio" id="terminado" name="terminado1" value="1" onclick="javascript:reprogramacion(this.value)" >
                                        <label class="form-check-label" for="terminado">Sí</label>
                                        </div>
                                        <div class="col-xs-6 col-md-6" align="center">
                                        <input class="form-check-input" type="radio" id="terminado" name="terminado1" value="0"  onclick="javascript:reprogramacion(this.value)" >
                                        <label class="form-check-label" for="terminado">No</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-xs-12 col-md-4" align="center">
                                    <label>Reprogramar</label>
                                   <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="form-check">
                                        <div class="col-xs-6 col-md-6" align="center">
                                        <input class="form-check-input" type="radio" name="programar" id="programar1" value="1" disabled>
                                        <label class="form-check-label" for="exampleRadios1">Sí</label>
                                        </div>
                                        <div class="col-xs-6 col-md-6" align="center">
                                        <input class="form-check-input" type="radio" name="programar" id="programar2" value="0" disabled>
                                        <label class="form-check-label" for="exampleRadios1">No</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-xs-12 col-md-4" align="center">
                                    <label>Requiere Cotización</label>
                                   <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="form-check">
                                        <div class="col-xs-6 col-md-6" align="center">
                                        <input class="form-check-input" type="radio" name="cotizar" id="cotizar1" value="1" >
                                        <label class="form-check-label" for="exampleRadios1">Sí</label>
                                        </div>
                                        <div class="col-xs-6 col-md-6" align="center">
                                        <input class="form-check-input" type="radio" name="cotizar" id="cotizar1" value="0" >
                                        <label class="form-check-label" for="exampleRadios1">No</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <!--  -->
                                <div class="col-md-12 col-xs-12" style="color:#58ACFA">
                                <label class="linealabel">Observaciones</label><textarea id="come" name="come" class="form-control"></textarea>
                                </div>
                                 <div class="col-md-12 col-xs-12" style="color:#58ACFA">
                                <div align="center" style="margin-top:">
                                    <input type="hidden" id="idsol" name="idsol" value="0">
                                    <input type="button" onclick="javascript:ingresar_datos_servicio_3()" class="btn btn-primary btn-sm " value="Registrar">
                                    <input type="reset" class="btn btn-primary btn-sm " value="Limpiar">
                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>





        <!-- AQUI TERMINA EL FORMULARIO 2 -->

    </section>
</div>