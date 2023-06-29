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
                <th align="center">Fecha Solicitud</th>
                <th align="center">Programado</th>
                <th align="center">Fecha Programado</th>
                <th align="center">Tecnico Asignado</th>
                <th align="center">S. Atendido</th>
                <th align="center">Fecha Atendido</th>
                <th align="center">S. Terminado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $con = new Connection($server, $user, $password, $dbname);
            $con->conectar();
            $crud = new Crud();
            //$crud->setconsulta("SET SQL_BIG_SELECTS=1");
            $crud->setconsulta("select s.id numerosolicitud,
            s.cliente,
            ub.nombre ubicacion,
            s.fecha fechasolicitud,
            s.asignado servicioasignado,
            sd.atendido servicioatendido,
            ud.nombres nombresolicitante,
            ud.apellidos apellidosolicitante,
            uda.nombres nombreasignado,
            uda.apellidos apellidosasignado,
            sd.fecha_asignado fechaasignado,
            rt.fecha_atencion fechaatencion,
            rt.atendido servicioterminado,
            rt.observaciones
            from ssoporte s
            left join ubicaciones ub
            on ub.codigo=s.ciudad
            left join usuario_detalle ud
            on ud.cedula=s.usuario
            left join solicitud_detalle sd
            on sd.solicitud=s.id
            left join usuario_detalle uda
            on uda.cedula=sd.asignado
            left join reporte_tecnico rt
            on rt.id_solicitud=s.id
            order by s.id desc
            ");
            $datos_usuario =  $crud->seleccionar($con->getConnection());
            $con->desconectar();
            while ($i < sizeof($datos_usuario)) {
            ?>
                <tr>
                    <?php
                    $bol = $datos_usuario[$i]['servicioasignado'];
                    $bol2 = $datos_usuario[$i]['servicioatendido'];
                   
                    if($datos_usuario[$i]['servicioterminado']==1){
                        $datos_usuario[$i]['servicioterminado']='SÍ';
                    }else{
                        $datos_usuario[$i]['servicioterminado']='NO';
                    }

                    if ($bol == 0) {
                        $fecha = date_create($datos_usuario[$i]['fechasolicitud']);
                    ?>
                        <td align="center">
                            <?php echo "N° " . $datos_usuario[$i]['numerosolicitud'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['cliente'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['ubicacion'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['nombresolicitante'] . " " . $datos_usuario[$i]['apellidosolicitante'] ?>
                        </td>
                        <td align="center">
                            <?php echo $datos_usuario[$i]['fechasolicitud'] ?>
                        </td>
                        
                        <?php
                        $soli = $datos_usuario[$i]['nombresolicitante'] . " " . $datos_usuario[$i]['apellidosolicitante'];

                        if ($bol == 1) {


                        ?>
                            <td align="center"><a id="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" name="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" href="#" style="color:green;"><i class="fa fa-check fa-lg " align="center" aria-hidden="true"></i></a></td>
                            <td align="center">
                            <?php echo $datos_usuario[$i]['fechaasignado'] ?>
                            </td>
                            <td align="center">
                            <?php echo $datos_usuario[$i]['nombreasignado'] . " " . $datos_usuario[$i]['apellidosasignado'] ?>
                            </td>
                            

                        <?php
                        } else {

                        ?>

                            <td align="center"><a id="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" name="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" href="#" style="color:red;"><i class="fa fa-times fa-lg " align="center" aria-hidden="true"></i></a></td>
                            <td align="center">
                                <?php echo "-" ?>
                            </td>
                            <td align="center">
                                <?php echo "-" ?>
                            </td>

                        <?php


                        }

                        if ($bol2 == 1) {


                        ?>
                            <td align="center"><a id="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" name="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" href="#" style="color:green;"><i class="fa fa-check fa-lg " align="center" aria-hidden="true"></i></a></td>
                            <td align="center">
                                <?php echo $datos_usuario[$i]['fechaatencion'] ?>
                            </td>
                            <td align="center">
                                <?php echo $datos_usuario[$i]['servicioterminado'] ?>
                            </td>
                        <?php
                        } else {

                        ?>

                            <td align="center"><a id="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" name="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" href="#" style="color:red;"><i class="fa fa-times fa-lg " align="center" aria-hidden="true"></i></a></td>
                            <td align="center">
                                <?php echo "-" ?>
                            </td>
                            <td align="center">
                                <?php echo "-" ?>
                            </td>
                        <?php
                        }
                        ?>
                </tr>
            <?php
                    } else {
            ?>
                <td align="center">
                    <?php echo "N° " . $datos_usuario[$i]['numerosolicitud'] ?>
                </td>
                <td align="center">
                    <?php echo $datos_usuario[$i]['cliente'] ?>
                </td>
                <td align="center">
                    <?php echo $datos_usuario[$i]['ubicacion'] ?>
                </td>
                <td align="center">
                    <?php echo $datos_usuario[$i]['nombresolicitante'] . " " . $datos_usuario[$i]['apellidosolicitante'] ?>
                </td>
                <td style="width:auto" align="center">
                    <?php echo $datos_usuario[$i]['fechasolicitud'] ?>
                </td>

                <?php
                        $soli = $datos_usuario[$i]['nombresolicitante'] . " " . $datos_usuario[$i]['apellidosolicitante'];

                        if ($bol == 1) {


                ?>
                    <td align="center"><a id="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" name="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" href="#" style="color:green;"><i class="fa fa-check fa-lg " align="center" aria-hidden="true"></i></a></td>
                    <td align="center">
                    <?php echo $datos_usuario[$i]['fechaasignado'] ?>
                    </td>
                    <td align="center">
                    <?php echo $datos_usuario[$i]['nombreasignado'] . " " . $datos_usuario[$i]['apellidosasignado'] ?>
                    </td>
                <?php
                        } else {

                ?>

                    <td align="center"><a id="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" name="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" href="#" style="color:red;"><i class="fa fa-times fa-lg " align="center" aria-hidden="true"></i></a></td>
                    <td align="center">
                    <?php echo "-" ?>
                    </td>
                    <td align="center">
                        <?php echo "-" ?>
                    </td>
                <?php


                        }

                        if ($bol2 == 1) {


                ?>
                    <td align="center"><a id="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" name="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" href="#" style="color:green;"><i class="fa fa-check fa-lg " align="center" aria-hidden="true"></i></a></td>
                    <td align="center">
                    <?php echo $datos_usuario[$i]['fechaatencion'] ?>
                    </td>
                    <td align="center">
                    <?php echo $datos_usuario[$i]['servicioterminado'] ?>
                    </td>
                <?php
                        } else {

                ?>

                    <td align="center"><a id="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" name="<?php echo $datos_usuario[$i]['numerosolicitud'] ?>" href="#" style="color:red;"><i class="fa fa-times fa-lg " align="center" aria-hidden="true"></i></a></td>
                    <td align="center">
                        <?php echo "-" ?>
                    </td>
                    <td align="center">
                        <?php echo "-" ?>
                    </td>
        <?php

                        }
                    }
                    $i++;
                }
        ?>
    </table>
</div>