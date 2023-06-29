<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
$vced=$_SESSION['documento'];
$vced= str_replace(".", "", $vced); 
$vced= str_replace("€", "", $vced);
$vced= str_replace(" ", "", $vced);
$vced= str_replace(",00", "", $vced);
$rols=$_SESSION['rol_num'];//rol sesion
?>
<div class="table-responsive">
    <table id="table_cot" class="display">
        <thead>
            <br>
            <tr>
                <th align="center">Número</th>
                <th align="center">Cliente</th>
                <th align="center">Ciudad</th>
                <th align="center">Descripción</th>
                <!--<th align="center">Fecha</th>-->
                <th align="center">Limite</th>
                <th align="center">Atender</th>
                <th align="center">Ejecutado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $fecha=date('Y-m-d', strtotime('-1 month'));
                $i=0;
                $con = new Connection($server,$user,$password,$dbname);
                $con->conectar();
                $crud = new Crud();
                $crud->setconsulta("select 
                  ssoporte.id as sop,
                  solicitud_detalle.id as sdid,
                  cliente,
                  ubicaciones.nombre,
                  ssoporte.usuario,
                  usuario_detalle.nombres,
                  usuario_detalle.apellidos,
                  ssoporte.fecha,
                  tipo_servicio.tiempo,
                  ssoporte.descripcion,
                  tipo_servicio.nombre as tservicio,
                  tipo_servicio.id,
                  ssoporte.asignado as asig,
                  convert(solicitud_detalle.fecha_hora_registro,date) registro,
                  solicitud_detalle.fecha_asignado as fechs,
                  solicitud_detalle.atendido,
                  c_usuario.rol as rolu
                  from ssoporte
                  left join tipo_servicio
                  on tipo_servicio.id=ssoporte.tipo_servicio
                  left join ubicaciones
                  on ubicaciones.codigo=ssoporte.ciudad
                  left join solicitud_detalle
                  on solicitud_detalle.solicitud=ssoporte.id
                  left join usuario_detalle
                  on usuario_detalle.cedula=solicitud_detalle.asignante 
                  left join usuario_detalle as usuario_detalle_2
                  on usuario_detalle_2.cedula='$vced'
                  left join c_usuario
                  on c_usuario.id=usuario_detalle_2.usuario_log
                  where (solicitud_detalle.asignado='$vced' 
                  or c_usuario.rol=1)
                  and solicitud_detalle.atendido=0
                  and ssoporte.fecha_solicitud>='$fecha'
                  order by fechs desc");
                $datos_usuario =  $crud->seleccionar($con->getConnection());
                $con->desconectar();
                $idconteo=0;
                $renglones=0;
                 while($i<sizeof($datos_usuario))
               {
                    if($datos_usuario[$i]['sop']==$idconteo){
                    $renglones=$renglones+1;
                    $idconteo=$datos_usuario[$i]['sop'];
                  }else{
                    $renglones=1;
                    $idconteo=$datos_usuario[$i]['sop'];
                  }
            ?>
                <tr>
                    <?php 
        $fecha=date_create($datos_usuario[$i]['fechs']);
        $tiempo=$datos_usuario[$i]['tiempo']/24;
        $hoy=date('Y-m-d');
        $hoy=date_create($hoy);
        $hoy2=$hoy->format("%R%a");





        //$limite=date_add($fecha,date_interval_create_from_date_string("+".$tiempo." days"));
        $bol=$datos_usuario[$i]['asig'];
        if ($bol==1){
      ?>
                        <td align="center">
                            <?php echo $renglones." - N° ".$datos_usuario[$i]['sop'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['cliente'] ?> 
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['nombre'] ?>
                        </td>
                       <!--<td align="center">
                            <?php echo $datos_usuario[$i]['nombres']." ".$datos_usuario[$i]['apellidos'] ?>
                        </td>-->
                        <td align="center">
                            <?php echo $datos_usuario[$i]['descripcion'] ?>
                            <input type="hidden" name="deschid<?php echo $datos_usuario[$i]['sop'] ?>" id="deschid<?php echo $datos_usuario[$i]['sop'] ?>" value=<?php echo $datos_usuario[$i]['descripcion'] ;?> >
                        </td>
                      <!-- <td align="center">
                            <?php echo date('Y-m-d')  ?>
                        </td>-->
                                
                        <?php
      $soli=$datos_usuario[$i]['nombres']." ".$datos_usuario[$i]['apellidos'];                  
      $diff=date_diff($hoy,$fecha);
      $diff=$diff->format("%R%a");
      $diff=intval($diff);
      $pru=strval($diff);
      
      if($diff<=1 and $diff>=0){

      ?>
                            <td align="center">
                                <label style="background-color:red;color:white">
                                    <?php echo date_format($fecha,"Y-m-d") ?>
                                </label>
                            </td>
                            <?php

      } else if ($diff==2) {
      ?>

                                <td align="center">
                                    <label style="background-color:yellow;color:black">
                                        <?php echo date_format($fecha,"Y-m-d") ?>
                                    </label>
                                </td>
                                <?php

      } else if ($diff>=3) {
      ?>

                                    <td align="center">
                                        <label style="background-color:green;color:white">
                                            <?php echo date_format($fecha,"Y-m-d") ?>
                                        </label>
                                    </td>
                                     <?php

        }  else if ($diff<=0) {

          ?>
                                        <td align="center">
                                            <label style="background-color:black;color:white">
                                                <?php echo date_format($fecha,"Y-m-d") ?>
                                            </label>
                                        </td>

                                        <?php

        }
        //$fecha_limite=$datos_usuario[$i]['fecha']." / ".date_format($limite,"Y-m-d");
      ?>
        
       
        <?php
        if($datos_usuario[$i]['atendido']==1){
        ?>
         <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" 
          name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:#b2a817;" 
          onclick="javascript:atendido()"><i class="fa fa-pencil-square-o fa-lg" align="center" aria-hidden="true"></a></td>
        <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:green;" ><i  class="fa fa-check fa-lg " align="center" aria-hidden="true"></i></a></td>
        <?php
        }
        else{
          ?>
         <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" 
          name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:#b2a817;" 
          onclick="javascript:formulario3(this.id,'<?php echo $datos_usuario[$i]['nombre'] ?>','<?php echo $datos_usuario[$i]['cliente'] ?>',' <?php echo $soli ?>','<?php echo $datos_usuario[$i]['fechs'] ?>','<?php echo $datos_usuario[$i]['tservicio'] ?>')"><i class="fa fa-pencil-square-o fa-lg" align="center" aria-hidden="true"></a></td>
          <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:red;" ><i  class="fa fa-times fa-lg " align="center" aria-hidden="true"></i></a></td>

        <?php
        }
        }  
          $i++;
            }
    ?>
    </table>
  </div>