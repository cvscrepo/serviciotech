<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
?>
<table id="table_cot" class="display" >
<thead >   
<br>     
    <tr>       
      <th align="center">Numero de Cotizacion</th>        
      <th align="center">Tercero</th>
      <th align="center">Concepto</th>
      <th align="center">Vendedor</th>
      <th align="center">Fecha</th>
      <th align="center">Estado</th>
      <th align="center">Aprobar</th>
      <th align="center">Rechazar</th>
      <th align="center">Editar</th>
      <th align="center">Descargar</th>
    </tr>
  </thead>  
  <tbody> 
      <?php
                $i=0;
                $con = new Connection($server,$user,$password,$dbname);
                $con->conectar();
                $crud = new Crud();
                $crud->setconsulta("select 
                cotizacion_maestro.id as idcot,
                id_tercero,
                c_cliente.nombres as clinom,
                c_cliente.apellidos as cliape,
                id_vendedor,
                usuario_detalle.nombres as usunom,
                usuario_detalle.apellidos as usuape,
                concepto_detalle,
                fecha_cotizacion,
                estados.nombre as estado,
                c_cliente.prospecto as clipro,
                c_cliente.email as cliema,
                c_cliente.ciudad as cliciu,
                c_cliente.telefono as clitel,
                c_cliente.celular as clicel,
                c_cliente.direccion as clidir,
                c_cliente.razon_social as clirso
                from cotizacion_maestro
                inner join c_cliente
                on c_cliente.nit_cedula=cotizacion_maestro.id_tercero
                inner join usuario_detalle
                on usuario_detalle.cedula=cotizacion_maestro.id_vendedor
                inner join estados
                on estados.id=cotizacion_maestro.estado
                where cotizacion_maestro.estado=11");
                $datos_usuario =  $crud->seleccionar($con->getConnection());
                $con->desconectar();
               while($i<sizeof($datos_usuario))
               {
                // if($datos_usuario[$i]['estado']==1)
                // {
                //   $est="Activo";
                // }else if ($datos_usuario[$i]['estado']==2){
                //   $est="Autorizado";
                // }else if($datos_usuario[$i]['estado']==3){
                //   $est="Negado";
                // }
                  $vendedor= $datos_usuario[$i]['id_vendedor'];
                  $vendedor= str_replace(".", "", $vendedor);
                  $vendedor= str_replace("€", "", $vendedor);
                  $vendedor= str_replace(",00", "", $vendedor);
                  if($datos_usuario[$i]['clipro']=='t'){
                    $auxcpr=$datos_usuario[$i]['cliema'];
                    $contact=$datos_usuario[$i]['clitel'];
                    $nomaux=$datos_usuario[$i]['clirso'];
                  }
                  else
                  {
                   $auxcpr=$datos_usuario[$i]['clidir']; 
                   $contact=$datos_usuario[$i]['clitel']." - ".$datos_usuario[$i]['clicel'] ; 
                   $nomaux=$datos_usuario[$i]['clinom'].' '.$datos_usuario[$i]['cliape'];
                  }
                  
                ?>
                
    <tr>      
      <input type="hidden" id="tauxnum<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxnum<?php echo $datos_usuario[$i]['idcot']; ?>" value="<?php echo 'BQ-'.'COT-'.$datos_usuario[$i]['idcot'] ?>">
      <input type="hidden" id="tauxterid<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxterid<?php echo $datos_usuario[$i]['idcot']; ?>" value="<?php echo $datos_usuario[$i]['id_tercero'] ?>">
      <input type="hidden" id="tauxterno<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxterno<?php echo $datos_usuario[$i]['idcot']; ?>" value="<?php echo $nomaux ?>">
      <input type="hidden" id="tauxconc<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxconc<?php echo $datos_usuario[$i]['idcot']; ?>" value="<?php echo $datos_usuario[$i]['concepto_detalle'] ?>">
      <input type="hidden" id="tauxvenid<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxvenid<?php echo $datos_usuario[$i]['idcot']; ?>" value="<?php echo $vendedor ?>">
      <input type="hidden" id="tauxvenno<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxvenno<?php echo $datos_usuario[$i]['idcot']; ?>" value="<?php echo $datos_usuario[$i]['usunom'].' '.$datos_usuario[$i]['usuape'] ?>">
      <input type="hidden" id="tauxclp<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxclp<?php echo $datos_usuario[$i]['idcot']; ?>" value="<?php echo $auxcpr ?>">
      <input type="hidden" id="tauxcont<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxcont<?php echo $datos_usuario[$i]['idcot']; ?>" value="<?php echo $contact ?>">
      <!-- <input type="hidden" id="tauxciud<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxciud<?php echo $datos_usuario[$i]['idcot']; ?>" value="<?php echo $datos_usuario[$i]['cliciu'] ?>"> -->
      <input type="hidden" id="tauxciud<?php echo $datos_usuario[$i]['idcot']; ?>" name="tauxciud<?php echo $datos_usuario[$i]['idcot']; ?>" value="BARRANQUILLA">
      <td align="center"><?php echo "BQ-"."COT-".$datos_usuario[$i]['idcot'] ?></td>
      <td align="center"><?php echo $datos_usuario[$i]['id_tercero']." - ".$datos_usuario[$i]['clinom'] ?></td>
      <td align="center"><?php echo $datos_usuario[$i]['concepto_detalle'] ?></td>
      <td align="center"><?php echo $vendedor." - ".$datos_usuario[$i]['usunom'] ?></td>
      <td align="center"><?php echo $datos_usuario[$i]['fecha_cotizacion'] ?></td>
      <td align="center"><?php echo $datos_usuario[$i]['estado'] ?></td>
      <td align="center"><a id="<?php echo $datos_usuario[$i]['idcot'] ?>" name="<?php echo $datos_usuario[$i]['idcot'] ?>" href="#" style="color:green;" onclick="javascript:aprueba_cotizacion(this.id)"><i class="fa fa-check fa-lg" aria-hidden="true"></a></td>
      <td align="center"><a id="<?php echo $datos_usuario[$i]['idcot'] ?>" name="<?php echo $datos_usuario[$i]['idcot'] ?>" href="#" style="color:red;"   onclick="javascript:rechaza_cotizacion(this.id)"><i  class="fa fa-ban fa-lg" aria-hidden="true"></i></a></td>
      <td align="center"><a id="<?php echo $datos_usuario[$i]['idcot'] ?>" name="<?php echo $datos_usuario[$i]['idcot'] ?>" href="#" style="color:#b2a817;"   onclick="javascript:mostrar_editar(this.id)"><i  class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
      <td align="center"><a id="<?php echo "BQ-"."COT-".$datos_usuario[$i]['idcot'] ?>" name="<?php echo "BQ-"."COT-".$datos_usuario[$i]['idcot'] ?>" href='../includes/generarpdf.php?var="<?php echo $datos_usuario[$i]['idcot'] ?>"'><img src="../dist/img/pdf.png" value="0" ></a></td>
    </tr>
              <?php
          $i++;
            }
    ?>
</table>
  
