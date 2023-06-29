 <?php
//session_start();
include('../includes/config.php');
include('../classes/conectar.php');
include('../classes/crud.php');
?>
 <div class="content-wrapper">
       <section class="content-header">
      <h1>
        Parametros
        <small>Crear Parametros</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cogs"></i> Parametros</a></li>
        <li class="active">R. Parametros</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
    <div class="col-md-6 col-md-offset-3">
    <div class="panel-group">
    <div class="panel panel-primary">
    <div class="panel-heading" align="center"><b>Registro Parametros</b></div>
    <div class="body bg-gray">
     <div class="form-box" style="overflow:auto;">
      <form id="camar" name="camar"  enctype="multipart/form-data" method="post">      
           Art. Nombre:
           <input type="text" name="nom" id="nom" class="form-control" placeholder="Ingresa Nombre" required autofocus required>
           Art. Referencia:
           <input type="text" name="ref" id="ref" class="form-control" placeholder="Ingresa Referencia" required autofocus required>
           Art. Descripcion:
           <input type="text" name="des" id="des" class="form-control" placeholder="Ingresa Descripcion" required autofocus required>
           Unidad de Medida:
           <select name="und" id="und" class="form-control" ><option>Escoja Und. Medida</option>
           <?php
            $con_3 = new Connection($server,$user,$password,$dbname);
            $con_3->conectar();
            $crud10 = new Crud();
            $crud10->setconsulta("SELECT id, nombre, descripcion
            FROM unidad_medida;");
            $datos_usuario_10 =  $crud10->seleccionar($con_3->getConnection());
            $i=0;
            while($i<sizeof($datos_usuario_10))
            {
              ?>
              <option  value="<?php echo $datos_usuario_10[$i]['id'] ?>"><?php echo $datos_usuario_10[$i]['nombre']?></option>
              <?php

              $i++;
            }
                                  // $cod_dpto=$datos_usuario_10[$i]['departamento_id'];
            $con_3->desconectar();
            ?> 

          </select> 
            Marca:
           <select name="mar" id="mar" class="form-control" ><option>Escoja Marca</option>
                        <?php
            $con_3 = new Connection($server,$user,$password,$dbname);
            $con_3->conectar();
            $crud10 = new Crud();
            $crud10->setconsulta("SELECT id, nombre, descripcion
            FROM marca_Parametros;");
            $datos_usuario_10 =  $crud10->seleccionar($con_3->getConnection());
            $i=0;
            while($i<sizeof($datos_usuario_10))
            {
              ?>
              <option  value="<?php echo $datos_usuario_10[$i]['id'] ?>"><?php echo $datos_usuario_10[$i]['nombre']?></option>
              <?php

              $i++;
            }
                                  // $cod_dpto=$datos_usuario_10[$i]['departamento_id'];
            $con_3->desconectar();
            ?>
            </select> 
            Categoria:
            <select name="cat" id="cat" class="form-control" ><option>Escoja Categoria</option>
            <?php
            $con_3 = new Connection($server,$user,$password,$dbname);
            $con_3->conectar();
            $crud10 = new Crud();
            $crud10->setconsulta("SELECT id, nombre, descripcion
            FROM categoria_Parametros");
            $datos_usuario_10 =  $crud10->seleccionar($con_3->getConnection());
            $i=0;
            while($i<sizeof($datos_usuario_10))
            {
              ?>
              <option  value="<?php echo $datos_usuario_10[$i]['id'] ?>"><?php echo $datos_usuario_10[$i]['nombre']?></option>
              <?php

              $i++;
            }
                                  // $cod_dpto=$datos_usuario_10[$i]['departamento_id'];
            $con_3->desconectar();
            ?>
            </select> 
            Precio (Estimado):
            <input type="text" id="pre" name="pre" placeholder="Precio Estimado" class="form-control">
            <br>
          <div id="gbut" align="center">
          <input type="button" onclick="javascript:ingresar_datos_Parametros()" class="btn bg-blue " value="Registrar">
          <input type="button" class="btn bg-blue " value="Limpiar">
          </div>
   </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  </div>