<?php
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
$vced=$_SESSION['documento'];
$vced= str_replace(".", "", $vced); 
$vced= str_replace("€", "", $vced);
$vced= str_replace(" ", "", $vced);
$vced= str_replace(",00", "", $vced);
$rolu=$_SESSION['rol_num']; 
$con = new Connection($server,$user,$password,$dbname);
                $stot=0;
                $fecha=date('Y-m-d', strtotime('-1 month'));
                $con->conectar();
                $crud = new Crud();
                $crud->setconsulta("select count(id) as cot from cotizacion_maestro where fecha_cotizacion >= '$fecha'");
                $datos_usuario =  $crud->seleccionar($con->getConnection());
                $tcot=$datos_usuario[0]['cot'];
                if ($tcot==0){
                  $tcot=1;
                  $stot=1;
                }
                $crud2 = new Crud();
                $crud2->setconsulta("select count(mc.id) as cot from cotizacion_maestro mc
                                    inner join estados es
                                    on es.id=mc.estado
                                    where estado=9 and fecha_cotizacion >= '$fecha'");
                $datos_usuario =  $crud2->seleccionar($con->getConnection());
                $acot=$datos_usuario[0]['cot'];
                if ($acot==null or $acot==''){
                  $acot=0;
                }

                $crud3 = new Crud();
                $crud3->setconsulta("select count(mc.id) as cot from cotizacion_maestro mc
                                    inner join estados es
                                    on es.id=mc.estado
                                    where estado=10 and fecha_cotizacion >= '$fecha'");
                $datos_usuario =  $crud3->seleccionar($con->getConnection());
                $rcot=$datos_usuario[0]['cot'];

                $crud4 = new Crud();
                $crud4->setconsulta("select count(id) as cot from usuario_detalle where registro >= '$fecha'");
                $datos_usuario =  $crud4->seleccionar($con->getConnection());
                $usun=$datos_usuario[0]['cot'];

                $crud5 = new Crud();
                $crud5->setconsulta("select count(id) as sso from ssoporte where fecha_solicitud >= '$fecha'");
                $datos_usuario =  $crud5->seleccionar($con->getConnection());
                $soli=$datos_usuario[0]['sso'];

                if($rolu!=3){
                $crud6 = new Crud();
                $crud6->setconsulta("select count(id) as pro from ssoporte where fecha_solicitud >= '$fecha' and asignado=1");
                $datos_usuario =  $crud6->seleccionar($con->getConnection());
                $prog=$datos_usuario[0]['pro'];
                }else{
                $crud10 = new Crud();
                $crud10->setconsulta("select count(ssoporte.id) as pro from ssoporte 
                                      inner join solicitud_detalle
                                      on solicitud_detalle.solicitud=ssoporte.id
                                      where fecha_solicitud >= '$fecha' and ssoporte.asignado=1 and solicitud_detalle.asignado='$vced'");
                $datos_usuario =  $crud10->seleccionar($con->getConnection());
                $prog=$datos_usuario[0]['pro'];
                }


                $crud7 = new Crud();
                $crud7->setconsulta("select count(id) as npro from ssoporte where fecha_solicitud>= '$fecha' and asignado=0");
                $datos_usuario =  $crud7->seleccionar($con->getConnection());
                $nprog=$datos_usuario[0]['npro'];

                $crud8 = new Crud();
                $crud8->setconsulta("select count(solicitud_detalle.id) as ate
                                      from technical_service.solicitud_detalle
                                      inner join ssoporte
                                      on solicitud_detalle.solicitud=ssoporte.id
                                      where ssoporte.fecha_solicitud >='$fecha' 
                                      and ssoporte.asignado=1
                                      and atendido=1");
                $datos_usuario =  $crud8->seleccionar($con->getConnection());
                $aten=$datos_usuario[0]['ate'];

                $crud9 = new Crud();
                $crud9->setconsulta("select count(solicitud_detalle.id) as aten
                                      from technical_service.solicitud_detalle
                                      inner join ssoporte
                                      on solicitud_detalle.solicitud=ssoporte.id
                                      where ssoporte.fecha_solicitud >='2020-11-16' 
                                      and ssoporte.asignado=1
                                      and solicitud_detalle.asignado=$vced
                                      and atendido=1");
                $datos_usuario =  $crud9->seleccionar($con->getConnection());
                $aten2=$datos_usuario[0]['aten'];



                $con->desconectar();

                $pora=round(($acot/$tcot)*100);
                $porr=round(($rcot/$tcot)*100);
                if($stot==1){
                  $tcot=0;
                }

?>
<!-- VENTA
      SOSTENIMIENTO DEL CLIENTE
      VISITA COMERCIAL
    -->
  <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="container">
      <span class="label label-warning"><b>Nota:</b> Tenga en cuenta que la información aquí mostrada corresponde al útimo mes desde la fecha de hoy.</span>
      </div>
      <div class="row" style="padding: 15px">
       <!-- <div class="col-md-4 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $tcot ;?></h3>
              <p>Cotizaciones Mes</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-4 col-xs-12">
          <div class="small-box bg-green">
            <div class="inner">
              <?php $acot=$acot.'('.$pora.'<sup style="font-size: 20px">%</sup>)' ?>
              <?php echo '<h3>'.$acot.'</h3>' ;?>

              <p>Cotizaciones Aprobadas (Mes)</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        -->
        <!-- ./col -->
        <div class="col-md-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php $acot=$acot.'('.$pora.'<sup style="font-size: 20px">%</sup>)' ?>
              <?php echo '<h3>'.$soli.'</h3>' ;?>

              <p>Servicios Tecnicos Solicitados</p>
            </div>
            <div class="icon">
              <i class="fa fa-area-chart"></i>
            </div>
            <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      <div class="col-md-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <?php $acot=$acot.'('.$pora.'<sup style="font-size: 20px">%</sup>)' ?>
              <?php echo '<h3>'.$prog.'</h3>' ;?>
              <p>Servicios Programados</p>
            </div>
            <div class="icon">
              <i class="fa fa-pie-chart"></i>
            </div>
            <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php $acot=$acot.'('.$pora.'<sup style="font-size: 20px">%</sup>)' ?>
              <?php echo '<h3>'.$nprog.'</h3>' ;?>
              <p>Servicios Sin Programar</p>
            </div>
            <div class="icon">
              <i class="fa fa-line-chart"></i>
            </div>
            <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <?php $acot=$acot.'('.$pora.'<sup style="font-size: 20px">%</sup>)' ?>
              <?php 
              if ($rolu==3) {
                echo '<h3>'.$aten2.'</h3>' ;
              } else {
                echo '<h3>'.$aten.'</h3>' ;
              }
              
              ?>
              <p>Servicios Tecnicos Atendidos</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-square-o"></i>
            </div>
            <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
    </section>
  </div>