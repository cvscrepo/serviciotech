<?php
session_start();
include('../../includes/config.php');
include('../../classes/conectar.php');
include('../../classes/crud.php');
?>
<table id="tunidad_table" name="tunidad_table" class="display">
    <thead>  
    <!-- <input type="button" id="cumed" name="cumed" value="Crear U.M" onclick="javascript:unime_form()"> -->
    <tr>            
      <th>Unidad</th>
      <th>Descripcion</th>
      <th align="center">Editar</th>
      <th align="center">Eliminar</th>
    </tr>
  </thead> 
  <tbody>
<?php
$con = new Connection($server,$user,$password,$dbname);
$con->conectar();
$crud = new Crud();
$crud->setconsulta("select * from unidad_negocio");
$datos_usuario =  $crud->seleccionar($con->getConnection());
$con->desconectar();
$i=0;
while($i<sizeof($datos_usuario))
{
  if($datos_usuario[$i]['id']>0){
  ?> 
    <tr>       
      <td><?php 
      echo $datos_usuario[$i]['nombre'];
      ?></td> 
      <td><?php 
      echo $datos_usuario[$i]['descripcion'];
      ?></td> 
      <td class="text-center"><a onclick="javascript:editar_producto(<?php echo $datos_usuario_t[$i]['id'] ?>)"><img src="../dist/img/edit.png" height="17" width="17"></a></td>
      <td class="text-center"><a><img src="../images/icons/delete1.png" height="17" width="17"></a></td>
    </tr>      

  <?php
}
  $i++;
}
?>
  </tbody>
  </table>
    </section>
