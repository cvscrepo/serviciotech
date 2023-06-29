<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
?>
<div class="table-responsive">
    <table id="table_cot" class="display">
        <thead>
            <br>
            <tr>
                <th align="center">Número</th>
                <th align="center">Cliente</th>
                <th align="center">Ciudad</th>
                <th align="center">Técnico</th>
                <th align="center">Fecha</th>
                <!-- <th align="center">Estado</th> -->
                <th align="center">Revisar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=0;
                $con = new Connection($server,$user,$password,$dbname);
                $con->conectar();
                $crud = new Crud();
                $crud->setconsulta("SELECT distinct solicitud_detalle.id as idsop,ssoporte.id as sop ,fecha_solicitud as fecsol,solicitante.nombres as nomusu  ,solicitante.apellidos as apusu,area_laboral.nombre as arealab 
                  ,tipo_servicio.nombre as tserv, ssoporte.cliente as sclie
                  ,ubicaciones.nombre as cinom, asignante.nombres as asinom
                  ,asignante.apellidos as asiape, solicitud_detalle.fecha_asignado as fecasi
                  ,unidad_negocio.nombre as uninom, tasignado.nombres as tecnom
                  ,tasignado.apellidos as tecape, reporte_tecnico.fecha_atencion as fecate
                  ,falla.nombre as fanom, reporte_tecnico.atendido
                  ,reporte_tecnico.reprogramar, reporte_tecnico.cotizar
                  ,ssoporte.descripcion as obs1, solicitud_detalle.comentarios as obs2
                  ,reporte_tecnico.observaciones as obs3
                  FROM `ssoporte` 
                  inner join usuario_detalle as solicitante 
                  on ssoporte.usuario=solicitante.cedula 
                  inner join area_laboral 
                  on solicitante.area_lab=area_laboral.id 
                  inner join tipo_servicio 
                  on ssoporte.tipo_servicio=tipo_servicio.id
                  inner join ubicaciones
                  on ssoporte.ciudad=ubicaciones.codigo
                  inner join solicitud_detalle
                  on ssoporte.id = solicitud_detalle.solicitud
                  inner join usuario_detalle as asignante
                  on solicitud_detalle.asignante=asignante.cedula
                  inner join usuario_detalle as tasignado
                  on solicitud_detalle.asignado=tasignado.cedula
                  inner join unidad_negocio
                  on ssoporte.unidad_negocio=unidad_negocio.id
                  inner join reporte_tecnico
                  on ssoporte.id=reporte_tecnico.id_solicitud
                  inner join falla
                  on reporte_tecnico.falla=falla.id
");
                $datos_usuario =  $crud->seleccionar($con->getConnection());
                $con->desconectar();
                 while($i<sizeof($datos_usuario))
               {
    ?>
                <tr>
                    <?php 
        /*$bol=$datos_usuario[$i]['asignado'];
        if ($bol==0){
        $fecha=date_create($datos_usuario[$i]['fecha']);
        $tiempo=$datos_usuario[$i]['tiempo']/24;
        $hoy=date('Y-m-d');
        $hoy=date_create($hoy);
        $limite=date_add($fecha,date_interval_create_from_date_string("+".$tiempo." days"));*/
      ?>
                        <td align="center">
                            <?php echo "N° ".$datos_usuario[$i]['sop'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['sclie'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['cinom'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['tecnom']." ".$datos_usuario[$i]['tecape'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['fecate'] ?>
                        </td>
                                
                        <?php
     /* $soli=$datos_usuario[$i]['nombres']." ".$datos_usuario[$i]['apellidos'];                  
      $diff=date_diff($hoy,$limite);
      $diff=$diff->format("%R%a");
      $diff=intval($diff);*/
      ?>

                                            <!-- <td align="center"><?php echo $datos_usuario[$i]['estado'] ?></td> -->
                                            <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:#b2a817;" onclick="javascript:formulario2(  '<?php echo $datos_usuario[$i]['sop'] ?>',
  '<?php echo $datos_usuario[$i]['fecsol'] ?>',
  '<?php echo $datos_usuario[$i]['nomusu'] ?>',
  '<?php echo $datos_usuario[$i]['apusu'] ?>',
  '<?php echo $datos_usuario[$i]['arealab'] ?>',
  '<?php echo $datos_usuario[$i]['tserv'] ?>',
  '<?php echo $datos_usuario[$i]['sclie'] ?>',
  '<?php echo $datos_usuario[$i]['cinom'] ?>',
  '<?php echo $datos_usuario[$i]['asinom'] ?>',
  '<?php echo $datos_usuario[$i]['asiape'] ?>',
  '<?php echo $datos_usuario[$i]['fecasi'] ?>',
  '<?php echo $datos_usuario[$i]['uninom'] ?>',
  '<?php echo $datos_usuario[$i]['tecnom'] ?>',
  '<?php echo $datos_usuario[$i]['tecape'] ?>',
  '<?php echo $datos_usuario[$i]['fecate'] ?>',
  '<?php echo $datos_usuario[$i]['fanom'] ?>',
  '<?php echo $datos_usuario[$i]['atendido'] ?>',
  '<?php echo $datos_usuario[$i]['reprogramar'] ?>',
  '<?php echo $datos_usuario[$i]['cotizar'] ?>',
  '<?php echo $datos_usuario[$i]['obs1'] ?>',
  '<?php echo $datos_usuario[$i]['obs2'] ?>',
    '<?php echo $datos_usuario[$i]['obs3'] ?>')"><i class="fa fa-pencil-square-o fa-lg" align="center" aria-hidden="true"></a></td>
                                            


                                            <!-- fa-minus-circle -->
                </tr>
                <?php
              /*}else
              {
        $fecha=date_create($datos_usuario[$i]['fecha_asignado']);
        $hoy=date('Y-m-d');
        $hoy=date_create($hoy);
       

                ?>
                        <td align="center">
                            <?php echo "N° ".$datos_usuario[$i]['sop'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['cliente'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['ciudad'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['nombretec']." ".$datos_usuario[$i]['apetec'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['fecha'] ?>
                        </td>
                                
                        <?php
      $soli=$datos_usuario[$i]['nombres']." ".$datos_usuario[$i]['apellidos'];                  
      $diff=date_diff($hoy,$fecha);
      $diff=$diff->format("%R%a");
      $diff=intval($diff);
      ?>

                                            <!-- <td align="center"><?php echo $datos_usuario[$i]['estado'] ?></td> -->
                                            <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:#b2a817;" onclick=""><i class="fa fa-pencil-square-o fa-lg" align="center" aria-hidden="true"></a></td>
                                            <?php


              }*/
          $i++;
            }
    ?>
    </table>
  </div>