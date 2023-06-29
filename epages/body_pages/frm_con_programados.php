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
        <small>Registro Servicios Programados</small>
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calculator"></i> Servicios</a></li>
            <li class="active">P. Servicio</li>
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
                            <div class="col-lg-2 col-xs-4">
                                <label style="color:#1c5a99"> Cliente: </label>
                                <input type="text" class="form-control" id="cue" name="cue" style="background:#FFFFFF;">
                            </div>
                            <div class="col-lg-2 col-xs-3">
                                <label> Filtrar Desde:</label>
                                <input type="text" class="form-control" id="fds" name="fds" style="background:#FFFFFF;" readonly>

                            </div>

                            <div class="col-lg-2 col-xs-3">
                                <label> Hasta:</label>
                                <input type="text" class="form-control" id="fhs" name="fhs" style="background:#FFFFFF;" required readonly>

                            </div>
                            <div class="col-lg-2 col-xs-2">
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
    </section>
</div>