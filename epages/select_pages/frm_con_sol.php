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
                <th align="center">Limite</th>
                <!-- <th align="center">Estado</th> -->
                <th align="center">Asignar</th>
                <th align="center">Programado</th>
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
                  cliente,
                  ubicaciones.nombre,
                  usuario,
                  usuario_detalle.nombres,
                  usuario_detalle.apellidos,
                  fecha,
                  tipo_servicio.tiempo,
                  ssoporte.descripcion as descrip,
                  tipo_servicio.nombre as tservicio,
                  tipo_servicio.id,
                  ssoporte.asignado
                from ssoporte
                left join tipo_servicio
                on tipo_servicio.id=ssoporte.tipo_servicio
                left join ubicaciones
                on ubicaciones.codigo=ssoporte.ciudad
                left join usuario_detalle
                on usuario_detalle.cedula=ssoporte.usuario
                where asignado=0 and
                fecha_solicitud>='$fecha'");
                $datos_usuario =  $crud->seleccionar($con->getConnection());
                $con->desconectar();
                 while($i<sizeof($datos_usuario))
               {
    ?>
                <tr>
                    <?php 
        $bol=$datos_usuario[$i]['asignado'];
        if ($bol==0){
        $fecha=date_create($datos_usuario[$i]['fecha']);
        $tiempo=$datos_usuario[$i]['tiempo']/24;
        $hoy=date('Y-m-d');
        $hoy=date_create($hoy);
        $limite=date_add($fecha,date_interval_create_from_date_string("+".$tiempo." days"));
      ?>
                        <td align="center">
                            <?php echo "N° ".$datos_usuario[$i]['sop'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['cliente'] ?>
                            <input type="hidden" name="cliente<?php echo $datos_usuario[$i]['sop'] ?>" id="cliente<?php echo $datos_usuario[$i]['sop'] ?>" value="<?php echo $datos_usuario[$i]['cliente'] ?>">
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['nombre'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['nombres']." ".$datos_usuario[$i]['apellidos'] ?>
                          <input type="hidden" name="comen<?php echo $datos_usuario[$i]['sop'] ?>" id="comen<?php echo $datos_usuario[$i]['sop'] ?>" value="<?php echo $datos_usuario[$i]['descrip'] ?>">
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['fecha'] ?>
                        </td>
                                
                        <?php
      $soli=$datos_usuario[$i]['nombres']." ".$datos_usuario[$i]['apellidos'];                  
      $diff=date_diff($hoy,$limite);
      $diff=$diff->format("%R%a");
      $diff=intval($diff);
      
      if($diff<=1 and $diff>=0){

      ?>
                            <td align="center">
                                <label style="background-color:red;color:white">
                                    <?php echo date_format($limite,"Y-m-d") ?>
                                </label>
                            </td>
                            <?php

      } else if ($diff==2) {
      ?>

                                <td align="center">
                                    <label style="background-color:yellow;color:black">
                                        <?php echo date_format($limite,"Y-m-d") ?>
                                    </label>
                                </td>
                                <?php

      } else if ($diff>=3) {
      ?>

                                    <td align="center">
                                        <label style="background-color:green;color:white">
                                            <?php echo date_format($limite,"Y-m-d") ?>
                                        </label>
                                    </td>
                                    <?php

        }  else if ($diff<0) {

          ?>
                                        <td align="center">
                                            <label style="background-color:black;color:white">
                                                <?php echo date_format($limite,"Y-m-d") ?>
                                            </label>
                                        </td>

                                        <?php

        }
        $fecha_limite=$datos_usuario[$i]['fecha']." / ".date_format($limite,"Y-m-d");
      ?>

                                            <!-- <td align="center"><?php echo $datos_usuario[$i]['estado'] ?></td> -->
                                            <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:#b2a817;" onclick="javascript:formulario2(this.id,'<?php echo $datos_usuario[$i]['nombre'] ?>',' <?php echo $soli ?>','<?php echo $fecha_limite ?>','<?php echo $datos_usuario[$i]['tservicio'] ?>')"><i class="fa fa-pencil-square-o fa-lg" align="center" aria-hidden="true"></a></td>
                                              
                                            

                                            <?php
                                            if ($bol==1){


                                            ?>
                                            <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:green;" ><i  class="fa fa-check fa-lg " align="center" aria-hidden="true"></i></a></td>

                                            <?php
                                          }
                                          else
                                          {

                                            ?>

                                            <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:red;" ><i  class="fa fa-times fa-lg " align="center" aria-hidden="true"></i></a></td>

                                            <?php


                                          }

                                            ?>

                                            <!-- fa-minus-circle -->
                </tr>
                <?php
              }else
              {/*
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
      $diff=date_diff($hoy,$fecha);
      $diff=$diff->format("%R%a");
      $diff=intval($diff);
      
      if($diff<=1 and $diff>=0){

      ?>
                            <td align="center">
                                <label style="background-color:red;color:white">
                                    <?php echo $datos_usuario[$i]['fecha_asignado'] ?>
                                </label>
                            </td>
                            <?php

      } else if ($diff==2) {
      ?>

                                <td align="center">
                                    <label style="background-color:yellow;color:black">
                                        <?php echo $datos_usuario[$i]['fecha_asignado']  ?>
                                    </label>
                                </td>
                                <?php

      } else if ($diff>=3) {
      ?>

                                    <td align="center">
                                        <label style="background-color:green;color:white">
                                            <?php echo $datos_usuario[$i]['fecha_asignado']  ?>
                                        </label>
                                    </td>
                                    <?php

        }  else if ($diff<0) {

          ?>
                                        <td align="center">
                                            <label style="background-color:black;color:white">
                                               <?php echo $datos_usuario[$i]['fecha_asignado']  ?>
                                            </label>
                                        </td>

                                        <?php

        }
        $fecha_limite=$datos_usuario[$i]['fecha']." / ".date_format($fecha,"Y-m-d");
      ?>

                                            <!-- <td align="center"><?php echo $datos_usuario[$i]['estado'] ?></td> -->
                                            <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:#b2a817;" onclick="javascript:formulario2(this.id,'<?php echo $datos_usuario[$i]['nombre'] ?>','<?php echo $datos_usuario[$i]['cliente'] ?>',' <?php echo $soli ?>','<?php echo $fecha_limite ?>','<?php echo $datos_usuario[$i]['descripcion'] ?>','<?php echo $datos_usuario[$i]['tservicio'] ?>')"><i class="fa fa-pencil-square-o fa-lg" align="center" aria-hidden="true"><?php   ?> </a></td>
                                            

                                            <?php
                                            if ($bol==1){


                                            ?>
                                            <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:green;" ><i  class="fa fa-check fa-lg " align="center" aria-hidden="true"></i></a></td>

                                            <?php
                                          }
                                          else
                                          {

                                            ?>

                                            <td align="center"><a id="<?php echo $datos_usuario[$i]['sop'] ?>" name="<?php echo $datos_usuario[$i]['sop'] ?>" href="#" style="color:red;" ><i  class="fa fa-times fa-lg " align="center" aria-hidden="true"></i></a></td>

                                            <?php


                                          }

             */ }
          $i++;
            }
    ?>
    </table>
  </div>