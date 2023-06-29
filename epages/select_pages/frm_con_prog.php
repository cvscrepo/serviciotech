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
                <th align="center">Solicitante</th>
                <th align="center">Fecha</th>
                <th align="center">Fecha Programada</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=0;
                $con = new Connection($server,$user,$password,$dbname);
                $con->conectar();
                $crud = new Crud();
                $crud->setconsulta("select        
                  ssoporte.id as sop,
                  cliente,
                  ubicaciones.nombre,
                  usuario,
                  usuario_detalle.nombres,
                  usuario_detalle.apellidos,
                  fecha,
                  solicitud_detalle.fecha_hora_registro,
                  ssoporte.descripcion,
                  ssoporte.asignado
                from ssoporte
                left join ubicaciones
                on ubicaciones.codigo=ssoporte.ciudad
                left join usuario_detalle
                on usuario_detalle.cedula=ssoporte.usuario
                left join solicitud_detalle
                on solicitud_detalle.solicitud=ssoporte.id
                where ssoporte.asignado=1
                ");
                $datos_usuario =  $crud->seleccionar($con->getConnection());
                $con->desconectar();
                 while($i<sizeof($datos_usuario))
               {
    ?>
                <tr>
                    <?php 
        $bol=$datos_usuario[$i]['asignado'];
        if ($bol==1){
        $fecha=date_create($datos_usuario[$i]['fecha']);
        $tiempo=3;
        $hoy=date('Y-m-d');
        $hoy=date_create($hoy);
        $fasingado=date_create($datos_usuario[$i]['fecha_hora_registro']);
        $limite=date_add($fecha,date_interval_create_from_date_string("+".$tiempo." days"));
      ?>
                        <td align="center">
                            <?php echo "N° ".$datos_usuario[$i]['sop'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['cliente'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['nombre'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['nombres']." ".$datos_usuario[$i]['apellidos'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['fecha'] ?>
                        </td>
                                
                        <?php
      $soli=$datos_usuario[$i]['nombres']." ".$datos_usuario[$i]['apellidos'];                  
      $diff=date_diff($hoy,$limite);
      $diff=$diff->format("%R%a");
      $diff=intval($diff);
    
      if($fasingado==$limite){

      ?>
                            <td align="center">
                                <label style="background-color:red;color:white">
                                    <?php echo date_format($fasingado,"Y-m-d") ?>
                                </label>
                            </td>
                            <?php

      } else if ($fasingado>$limite) {
      ?>

                                    <td align="center">
                                        <label style="background-color:green;color:white">
                                            <?php echo date_format($fasingado,"Y-m-d") ?>
                                        </label>
                                    </td>
                                    <?php

        }  else if ($fasingado<$limite) {

          ?>
                                        <td align="center">
                                            <label style="background-color:black;color:white">
                                          <?php echo date_format($fasingado,"Y-m-d") ?>
                                            </label>
                                        </td>

                                        <?php

        }
        $fecha_limite=$datos_usuario[$i]['fecha']." / ".date_format($limite,"Y-m-d");
      ?>
                                        <?php

             }
          $i++;
            }
    ?>
    </table>
  </div>